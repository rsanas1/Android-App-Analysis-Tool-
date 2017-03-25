<?php
class Login_model extends CI_Model {
	function authenticate($data) {
		$this->db->where ( 'userId', $data ['username'] );
		$this->db->where ( 'pass', md5 ( $data ['pass'] ) );
		$query = $this->db->get ( 'user' );
		$rows = $query->num_rows ();
		if ($rows == 0) {
			return false;
		} else {
			
			$temp = $query->result ();
			$user = $temp [0];
			
			return $user;
		}
	}
	function forgotpass($data) {
		$this->db->where ( 'email', $data ['email'] );
		$query = $this->db->get ( 'user' );
		$rows = $query->num_rows ();
		if ($rows == 0) {
			return false;
		} else {
			
			$temp = $query->result ();
			$user = $temp [0];
			$new_pass = $this->generateRandomString ( 8 );
			$data1 = array (
					'email' => $data ['email'],
					'pass' => md5 ( $new_pass ) 
			);
			$this->db->update ( 'user', $data1 );
			
			$data2 = array (
					'email' => $data ['email'],
					'password' => $new_pass 
			);
			return $data2;
		}
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
