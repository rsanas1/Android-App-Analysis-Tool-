<?php
class bookmarkModel extends CI_Model {
	function add($data) {
		$id = $_SESSION ['id']; // We get the user Id through the session id
		
		$data1 = array (
				'title' => $data ['title'],
				'website' => $data ['website'],
				'userId' => $id 
		);
		
		$this->db->insert ( 'bookmark', $data1 );
	}
	function getAll() {
		$id = $_SESSION ['id'];
		$this->db->where ( 'userId', $id );
		$res = $this->db->get ( 'bookmark' );
		
		return $res->result_array ();
	}
	function getbookmark($data) {
		$this->db->where ( 'id', $data );
		
		$query = $this->db->get ( 'bookmark' );
		return $query->result_array ();
	}
	function updatebookmark($data) {
		$this->db->where ( 'id', $data ['id'] );
		$this->db->update ( 'bookmark', $data );
	}
	function deletebookmark($id) {
		$this->db->where ( 'id', $id );
		$this->db->delete ( 'bookmark' );
	}
	
}
?>
