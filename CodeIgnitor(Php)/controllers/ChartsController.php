<?php
class ChartsController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->database ();
		$this->load->helper ( 'url' );
		$this->load->model ( 'temp_model' );
		$this->load->model ( 'stat_model' );
		$this->load->file ( 'application/classes/mailer/PHPMailerAutoload.php' );
	}

	function index(){
		$userId = $this->check_session ();
		$this->load->model ( 'appmodel', 'app' );
		$apps = $this->app->getAll ();
		$this->load->view ( 'header' );
		
		
		$this->load->view ( 'statistics/selectchart', array (
				'apps' => $apps 

		) );
		
		
			
		if(isset($_GET['app']) && isset($_GET['variable'])) {
				
			$events = $this->stat_model->getEvents($_GET['app'], $userId);
			$activities = $this->stat_model->getActivities($_GET['app'], $userId);
			$installs = $this->stat_model->getInstalls($_GET['app'], $userId);
			if($events) {
				
				if("events" == $_GET['variable']) {
				
					$this->load->view ( 'statistics/piechart', array (
						'events' => $events 
					) );	
				} elseif ("activities" == $_GET['variable']) {
					
					$this->load->view ( 'statistics/columnchart', array (
						'activities' => $activities
					) );
				} else {
							$this->load->view ( 'statistics/geochart', array (
						'installs' => $installs 
					) );
				}
	
			} 
			else
			{ 
				echo 'No Data';
			}			
		}
		/*$this->load->view ( 'statistics/piechart', array (
				'events' => $events 
			) );*/
		$this->load->view ( 'footer' );
	}


	function check_session() {
		session_start ();
		if (! isset ( $_SESSION ['loggedIn'] )) {
				
			redirect ( 'logincontroller' );
		} else {
			return $_SESSION['id'];
		}
		return false;
	}

}
