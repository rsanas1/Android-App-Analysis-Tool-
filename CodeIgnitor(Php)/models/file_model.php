<?php
class File_model extends CI_Model {
	function getFiles(){
		
		$this->db->select('*');
		$this->db->from('files');
		$res = $this->db->get();
		return $res->result_array();
	}
}