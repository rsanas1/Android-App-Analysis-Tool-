<?php
class Stat_model extends CI_Model {
	function getEvents($appId, $userId) {

		$this->db->select('*');
		$this->db->from('app');
		$this->db->where('userId', $userId);
		$this->db->where('id', $appId);
		$res = $this->db->get ();
		if(0 == $res->num_rows()) {
			return false;
		} else {
			$this->db->select ( '*' );
			$this->db->from ( 'events' );
			$this->db->where ( 'app_id', $appId );		
			$res = $this->db->get ();
			$events = $res->result_array ();
			$final = array ();
			foreach ( $events as $event ) {
				$eventName = $event ['event_name'];
				if (isset ( $final [$eventName] )) {
					$final [$eventName] += 1;
				} else {
					$final [$eventName] = 1;
				}
			}	
			return $final;
		}
		return false;
	}

	function getInstalls($appId, $userId) {

		$this->db->select('*');
		$this->db->from('app');
		$this->db->where('userId', $userId);
		$this->db->where('id', $appId);
		$res = $this->db->get ();
		if(0 == $res->num_rows()) {
			return false;
		} else {
			$this->db->select ( '*' );
			$this->db->from ( 'deviceInfo' );
			$this->db->where ( 'appId', $appId );		
			$res = $this->db->get ();
			$installs = $res->result_array ();
			$final = array ();
			foreach ( $installs as $install ) {
				$countryName = $install ['country'];
				if (isset ( $final [$countryName] )) {
					$final [$countryName] += 1;
				} else {
					$final [$countryName] = 1;
				}
			}	
			return $final;
		}
		return false;
	}
	
	function getActivities($appId, $userId) {

		$this->db->select('*');
		$this->db->from('app');
		$this->db->where('userId', $userId);
		$this->db->where('id', $appId);
		$res = $this->db->get ();
		if(0 == $res->num_rows()) {
			return false;
		} else {
			$this->db->select ( '*' );
			$this->db->from ( 'activities' );
			$this->db->where ( 'app_id', $appId );		
			$res = $this->db->get ();
			$activities = $res->result_array ();
			$final = array ();
			foreach ( $activities as $activity ) {
				$actName = $activity['activity_name'];
				if (isset ( $final [$actName] )) {
					$final [$actName] += 1;
				} else {
					$final [$actName] = 1;
				}
			}	
			return $final;
		}
		return false;
	}
}

