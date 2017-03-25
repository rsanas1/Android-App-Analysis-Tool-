<?php
class temp_model extends CI_Model {
	function eventr($data) {
		
		$this->db->insert ( 'events', $data );
		return true;
	}
	function activityr($data) {
		
		$api=$data['api_key'];
		
		$appId=$this->authenticate($api);
		
		$arr=array('activity_name' => $data['activity_name'],
					'start_time' => $data['start_time'],
					'end_time' => $data['end_time'],
					'app_id' => $appId,);
		
		$this->db->insert ( 'activities', $arr );
		
		$activityId=$this->db->insert_id();
		$events=json_decode($data['events']);		
		
		foreach ($events as $event) {			
			
			$arr=array('event_name' => $event->eventName,
					//'start_time' => $event['start_time'],
					'activity_id' => $activityId,
					'timestamp' => $event->timestamp,
					'app_id' => $appId);
			$this->db->insert ( 'events', $arr );
		}	
		
		return true;
	}
	function devicer($data) {
	
		$api=$data['api_key'];
		$appId=$this->authenticate($api);
		
		$this->db->where ( 'code', $data['country'] );
		$query = $this->db->get('country');
		$temp = $query->result_array();
		$country_name = $temp[0]['name'];
		
		$arr=array('appId' => $appId,
					'imei'	=> $data['imei'],
					'carrier'	=> $data['carrier'],
					'versionCodename'	=> $data['versionCodename'],
					'deviceModel'	=> $data['deviceModel'],
					'manufacturer'	=> $data['manufacturer'],
					'country'	=> $country_name,);
					
		$this->db->insert ( 'deviceInfo', $arr );
		$deviceId=$this->db->insert_id();
		echo $deviceId;
	}
	
	function authenticate($api) {
		$this->db->where ( 'api_key', $api );
		$query = $this->db->get ( 'app' );
		$rows = $query->num_rows();
		
		if ($rows == 0) {
			return false;
		} else {
				
			$temp = $query->result_array();
			$appId = $temp[0] ['id'];
			return $appId;
		}
	}
}