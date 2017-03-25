<?php
class AppModel extends CI_Model {
	function add($data) {
		$id = $_SESSION ['id']; // We get the user Id through the session id
		
		$data1 = array (
				'app_name' => $data ['app_name'],
				'app_desc' => $data ['app_desc'],
				'api_key' => $this->generateRandomString ( 15 ),
				'userId' => $id 
		);
		
		$this->db->insert ( 'app', $data1 );
	}
	function getAll() {
		$id = $_SESSION ['id'];
		$this->db->where ( 'userId', $id );
		$res = $this->db->get ( 'app' );
		
		return $res->result_array ();
	}
	function getApp($data) {
		$this->db->where ( 'id', $data );
		
		$query = $this->db->get ( 'app' );
		return $query->result_array ();
	}
	function updateApp($data) {
		$this->db->where ( 'id', $data ['id'] );
		$this->db->update ( 'app', $data );
	}
	function deleteApp($id) {
		$this->db->where ( 'id', $id );
		$this->db->delete ( 'app' );
	}
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for($i = 0; $i < $length; $i ++) {
			$randomString .= $characters [rand ( 0, strlen ( $characters ) - 1 )];
		}
		return $randomString;
	}
}
?>
