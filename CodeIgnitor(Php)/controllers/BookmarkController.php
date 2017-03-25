<?php
class BookmarkController extends CI_Controller {
	function index() {
		$this->check_session ();
		
		$this->load->model ( 'bookmarkmodel', 'bookmark' );
		$bookmarks = $this->bookmark->getAll ();
		$this->load->view ( 'header' );
		$this->load->view ( 'bookmarktable', array (
				'bookmarks' => $bookmarks 
		) );
		$this->load->view ( 'footer' );
	}
	function add() {
		$this->check_session ();
		
		$this->load->view ( 'header' );
		$this->load->view ( 'addbookmark' );
		$this->load->view ( 'footer' );
	}
	function save() {
		$this->check_session ();
		
		$this->load->model ( 'bookmarkmodel' );
		$this->bookmarkmodel->add ( $_POST );
		redirect ( 'BookmarkController' );
	}
	function check_session() {
		session_start ();
		if (! isset ( $_SESSION ['loggedIn'] )) {
			
			redirect ( 'logincontroller' );
		}
	}
	function edit() {
		$this->check_session ();
		$this->load->model ( 'bookmarkmodel', 'bookmark' );
		$bookmark = $this->bookmark->getbookmark ( $_GET ['id'] );
		$this->load->view ( 'header' );
		$this->load->view ( 'bookmarkedit', array (
				'bookmark' => $bookmark [0] 
		) );
		$this->load->view ( 'footer' );
	}
	function update() {
		$this->check_session ();
		$this->load->model ( 'bookmarkmodel' );
		$this->bookmarkmodel->updatebookmark ( $_POST );
		
		redirect ( 'BookmarkController' );
	}
	function delete() {
		$this->check_session ();
		$this->load->model ( 'bookmarkmodel' );
		$this->bookmarkmodel->deletebookmark ( $_GET ['id'] );
		redirect ( 'BookmarkController' );
	}
}
?>