<?php
class Register_model extends CI_Model {
	function addUser($data) {
		$data1 = array (
				'first_name' => $data ['first_name'],
				'pass' => md5 ( $data ['pass'] ),
				'last_name' => $data ['last_name'],
				'email' => $data ['email'],
				'phone' => $data ['phone'],
				'userId' => $data ['userId'] 
		)
		;
		
		$this->db->insert ( 'user', $data1 );
		return $data1;
	}
}