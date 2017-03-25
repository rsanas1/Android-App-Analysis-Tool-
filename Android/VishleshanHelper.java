package com.sudosaints.vishleshan;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.sql.Timestamp;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Map;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONObject;

import android.app.Activity;
import android.app.Application;
import android.content.Context;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.content.res.Resources;
import android.os.AsyncTask;
import android.os.Build;
import android.telephony.TelephonyManager;
import android.util.Log;

import com.sudosaints.vishleshan.exception.ActivityInfoNotFoundException;
import com.sudosaints.vishleshan.model.ActivityInfo;
import com.sudosaints.vishleshan.model.Event;

public class VishleshanHelper {

	private static Application application;
	private static List<ActivityInfo> activities;
	private static Date sessionStartDate, sessionEndDate;
	private static VishleshanHelper vishleshanHelper;
	SharedPreferences prefs;

	private VishleshanHelper() {

	}

	public static VishleshanHelper getInstance() {
		if (null == vishleshanHelper) {
			vishleshanHelper = new VishleshanHelper();
		}
		vishleshanHelper = new VishleshanHelper();

		return vishleshanHelper;
	}

	public void logEvent(String eventName, Activity activity) {
		logEvent(eventName, null, activity);
	}

	public void logEvent(String eventName, Map<String, Object> extraData, Activity activity) {

		if (!isActivitiesInitialized() || activities.isEmpty()) {
			return;
		}
		int activityIndex = 0;
		try {
			activityIndex = getActivityIndex(activity);
		} catch (ActivityInfoNotFoundException e) {
			e.printStackTrace();
			return;
		}
		activities.get(activityIndex).addEvent(new Event(eventName));
	}

	public void onStart(Activity activity) {

		if (null == application) {
			application = activity.getApplication();
		}
		if (!isActivitiesInitialized()) {
			sessionStartDate = new Date();
			activities = new ArrayList<ActivityInfo>();
		}
		activities.add(new ActivityInfo(activity));

		prefs = application.getSharedPreferences("MyPref", Context.MODE_PRIVATE);
		
		
		if (!prefs.getBoolean("isDeviceRegistered", false)) {
			new Thread(new RegisterDevice()).start();
		}
	}

	public void onStop(Activity activity) {

		Log.i("Vishleshan", "Recvd. on stop");
		int activityIndex = 0;
		try {
			activityIndex = getActivityIndex(activity);
		} catch (ActivityInfoNotFoundException e) {
			e.printStackTrace();
			return;
		}
		final ActivityInfo activityInfo = activities.get(activityIndex);
		// TODO : Send Events to Server
		Thread networkThread = new Thread(new Runnable() {

			@Override
			public void run() {
				// TODO Auto-generated method stub
				Log.i("Vishleshan", "Thread Started");
				SendRequest req = new SendRequest(activityInfo);
				req.execute(new String[] { "http://192.168.43.8/Android/TempController/register_activity" });
			}
		});
		Log.i("Vishleshan", "Thread Starting");
		activity.runOnUiThread(networkThread);
		activities.remove(activityIndex);
	}

	private static int getActivityIndex(Activity activity) throws ActivityInfoNotFoundException {
		String activityName = activity.getLocalClassName();
		for (int i = 0; i < activities.size(); i++) {
			ActivityInfo activityInfo = activities.get(i);
			if (activityInfo.getActivityName().equals(activityName)) {
				return i;
			}
		}
		throw new ActivityInfoNotFoundException("Activity not found");
	}

	private static boolean isActivitiesInitialized() {

		if (null == activities) {
			return false;
		}
		return true;
	}

	private class SendRequest extends AsyncTask<String, Void, String> {

		private ActivityInfo activityInfo;

		public SendRequest(ActivityInfo activityInfo) {
			this.activityInfo = activityInfo;
		}

		protected String doInBackground(String... urls) {
			// TODO Auto-generated method stub

			Log.i("VishleshanHelper", "from doInBackground()");
			JSONArray ja = new JSONArray();
			List<Event> events = activityInfo.getEvents();
//			Log.i("Vishleshan-events", RegisterDeviceEvents.toString());
			if (null != events) {

				try {

					for (int i = 0; i < events.size(); i++) {

						JSONObject jo = new JSONObject();
						jo.put("eventName", events.get(i).getEvent());
						jo.put("timestamp", new Timestamp( events.get(i).getTimeStamp().getTime())).toString();
						jo.put("extraData", events.get(i).getExtraData());

						Log.i("VishleshanHelper", jo.toString());
						ja.put(jo);
					}

					/*
					 * JSONObject mainObj = new JSONObject();
					 * mainObj.put("events", ja);
					 */

				} catch (Exception e) {
					e.printStackTrace();
				}
			}

			Resources r = application.getResources();
			int keyId = r.getIdentifier("apikey", "string", application.getPackageName());
			String appkey = r.getString(keyId);

			String response = "";

			DefaultHttpClient client = new DefaultHttpClient();
			HttpPost httpPost = new HttpPost(urls[0]);
			try {
				List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>(2);
				nameValuePairs.add(new BasicNameValuePair("activity_name", activityInfo.getActivityName()));
				nameValuePairs.add(new BasicNameValuePair("api_key", appkey));
				
				Timestamp startTimeStamp = new Timestamp(activityInfo.getStartTime().getTime());	
				Timestamp endTimeStamp = new Timestamp(new Date().getTime());
				
				nameValuePairs.add(new BasicNameValuePair("start_time", startTimeStamp.toString()));
				
				nameValuePairs.add(new BasicNameValuePair("end_time", endTimeStamp.toString()));
				nameValuePairs.add(new BasicNameValuePair("events", ja.toString()));
				
				httpPost.setEntity(new UrlEncodedFormEntity(nameValuePairs));

				HttpResponse resp = client.execute(httpPost);

				InputStream content = resp.getEntity().getContent();

				BufferedReader buffer = new BufferedReader(new InputStreamReader(content));
				String s = "";
				while ((s = buffer.readLine()) != null) {
					response += s;

				}
				Log.i("VishleshanHelper", "Response is - " + response);
				
			} catch (Exception e) {
				e.printStackTrace();
			}

			return response;
		}
		
		@Override
		protected void onPostExecute(String result) {
			super.onPostExecute(result);
			Log.d("Vishleshan", result);
		}
	}

	class RegisterDevice implements Runnable {
		@Override
		public void run() {
			DefaultHttpClient client = new DefaultHttpClient();
			HttpPost httpPost = new HttpPost("http://192.168.43.8/Android/TempController/register_device");
			
			Resources r = application.getResources();
			int keyId = r.getIdentifier("apikey", "string", application.getPackageName());
			String appkey = r.getString(keyId);
			
		
			TelephonyManager telephonyManager = (TelephonyManager)application.getSystemService(Context.TELEPHONY_SERVICE);
			
			String response = "";
			
			try {
				List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
				nameValuePairs.add(new BasicNameValuePair("api_key", appkey));
				nameValuePairs.add(new BasicNameValuePair("imei", telephonyManager.getDeviceId()));
				nameValuePairs.add(new BasicNameValuePair("carrier", telephonyManager.getSimOperatorName()));
				String codename = android.os.Build.VERSION.CODENAME;
				nameValuePairs.add(new BasicNameValuePair("versionCodename", codename));
				nameValuePairs.add(new BasicNameValuePair("country", telephonyManager.getSimCountryIso().toUpperCase()));
				nameValuePairs.add(new BasicNameValuePair("deviceModel", Build.MODEL));
				nameValuePairs.add(new BasicNameValuePair("manufacturer", Build.MANUFACTURER));
				
				
				httpPost.setEntity(new UrlEncodedFormEntity(nameValuePairs));

				HttpResponse resp = client.execute(httpPost);

				InputStream content = resp.getEntity().getContent();	

				BufferedReader buffer = new BufferedReader(new InputStreamReader(content));
				String s = "";
				while ((s = buffer.readLine()) != null) {
					response += s;

				}
				
				
				if( null != response){
					Integer integer = new Integer(Integer.parseInt(response));
					
					if( integer instanceof Integer){
						Editor editor = prefs.edit();
						editor.putString("deviceId", response);
						editor.putBoolean("isDeviceRegistered", true);
						editor.commit();
						Log.i("VishleshanHelper", "Response is - " + response);
					}
				}

				
			} catch (Exception e) {
				e.printStackTrace();
			}

		}
	}
}
