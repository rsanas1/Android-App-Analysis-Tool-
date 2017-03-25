<?php
class TempController extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->database ();
		$this->load->helper ( 'url' );
		$this->load->model ( 'temp_model' );
		$this->load->file ( 'application/classes/mailer/PHPMailerAutoload.php' );
		
	}
	function index() {
		$this->check_session ();
		$this->load->model ( 'appmodel', 'app' );
		$apps = $this->app->getAll ();
		$this->load->view ( 'header' );
		$this->load->view ( 'statistics/selectchart', array (
				'apps' => $apps 
		) );
		$this->load->view ( 'footer' );
	}
	function load_view1() {
		$this->load->view ( 'activities_regis' );
	}
	function register_activity() {
		file_put_contents('data.txt',print_r($_POST,true));
		$data = $this->temp_model->activityr ( $_POST );
	}
	function register_event() {
		$data = $this->temp_model->eventr ( $_POST );
	}
	function register_device() {
		file_put_contents('data1.txt',print_r($_POST,true));
		$data = $this->temp_model->devicer ( $_POST );
		
		
	}
	function load_view() {
		$this->load->view ( 'events_reg' );
	}
	function check_session() {
		session_start ();
		if (! isset ( $_SESSION ['loggedIn'] )) {
				
			redirect ( 'logincontroller' );
		}
	}
	
	
	
}