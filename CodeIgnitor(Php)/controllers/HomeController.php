<?php
class HomeController extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->database ();
		$this->load->helper ( 'url' );
	}
	function check_session() {
		session_start ();
		if (! isset ( $_SESSION ['loggedIn'] )) {
			
			redirect ( 'logincontroller' );
		}
	}
	function index() {
		$this->check_session ();
		$this->load->model ( 'appmodel', 'app' );
		$apps = $this->app->getAll ();
		$this->load->view ( 'header' );
		$this->load->view ( 'home', array (
				'apps' => $apps
		) );
		$this->load->view ( 'footer' );
	}
	
	
	function help(){
		$this->check_session();
		$this->load->view ( 'header' );
		$this->load->view ( 'helpPage' );
		$this->load->view ( 'footer' );
	}
	
	function temp(){
		$this->check_session();
		$this->load->view ( 'header' );
		$this->load->view ( 'statistics/selectchart' );
		$this->load->view ( 'footer' );
		
	}
	
	function appcount(){
		$this->check_session();
		$this->load->view ( 'header' );
		$this->load->view ( 'appcount' );
		$this->load->view ( 'footer' );
		
	}
}
?>

