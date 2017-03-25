<?php
class AppController extends CI_Controller {
	function index() {
		$this->check_session ();
		
		$this->load->model ( 'appmodel', 'app' );
		$apps = $this->app->getAll ();
		$this->load->view ( 'header' );
		$this->load->view ( 'apptable', array (
				'apps' => $apps 
		) );
		$this->load->view ( 'footer' );
	}
	function add() {
		$this->check_session ();
		
		$this->load->view ( 'header' );
		$this->load->view ( 'addapp' );
		$this->load->view ( 'footer' );
	}
	function save() {
		$this->check_session ();
		
		$this->load->model ( 'appmodel' );
		$this->appmodel->add ( $_POST );
		redirect ( 'home' );
	}
	function check_session() {
		session_start ();
		if (! isset ( $_SESSION ['loggedIn'] )) {
			
			redirect ( 'logincontroller' );
		}
	}
	function edit() {
		$this->check_session ();
		$this->load->model ( 'appmodel', 'app' );
		$app = $this->app->getApp ( $_GET ['id'] );
		$this->load->view ( 'header' );
		$this->load->view ( 'appedit', array (
				'app' => $app [0] 
		) );
		$this->load->view ( 'footer' );
	}
	function update() {
		$this->check_session ();
		$this->load->model ( 'appmodel' );
		$this->appmodel->updateApp ( $_POST );
		
		redirect ( 'AppController' );
	}
	function delete() {
		$this->check_session ();
		$this->load->model ( 'appmodel' );
		$this->appmodel->deleteApp ( $_GET ['id'] );
		redirect ( 'AppController' );
	}
}
?>
