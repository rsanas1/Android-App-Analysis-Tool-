package com.sudosaints.vishleshan.model;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import android.app.Activity;

/**
 * @author Vishal
 *
 */
public class ActivityInfo implements Serializable{

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	private String activityName;
	private Date startTime, endTime;
	private List<Event> events;
	
	public ActivityInfo(Activity activity) {
		this.activityName = activity.getLocalClassName();
		this.startTime = new Date();
	}
	
	public String getActivityName() {
		return activityName;
	}
	
	public void setActivityName(String activityName) {
		this.activityName = activityName;
	}
	
	public Date getStartTime() {
		return startTime;
	}
	
	public void setStartTime(Date startTime) {
		this.startTime = startTime;
	}
	
	public Date getEndTime() {
		return endTime;
	}
	
	public void setEndTime(Date endTime) {
		this.endTime = endTime;
	}
	
	public List<Event> getEvents() {
		return events;
	}
	
	public void setEvents(List<Event> events) {
		this.events = events;
	}
	
	public void addEvent(Event event) {
		if(null == this.events) {
			events = new ArrayList<Event>();
		}
		events.add(event);
	}
}
