<?php
class User_model extends CI_Model {
	function updatePass($data) {
		$id = $_SESSION ['id'];
		
		// Get old password
		$this->db->where ( 'index', $id );
		$this->db->where ( 'pass', md5 ( $data ['old_pass'] ) );
		$query = $this->db->get ( 'user' );
		
		if ($query->num_rows ()) {
			$new = array (
					'pass' => md5 ( $data ['new_pass'] ) 
			);
			$this->db->where ( 'index', $id );
			$this->db->update ( 'user', $new );
			
			return $query->row ();
		} else {
			return false;
		}
	}
}
		
	




