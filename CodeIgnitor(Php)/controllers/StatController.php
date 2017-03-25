<?php
class StatController extends CI_Controller {
	function pie() {
		$this->check_session ();
		
		$this->load->model ( 'stat_model' );
		$events = $this->stat_model->getEvents ();
		$this->load->view ( 'header' );
		$this->load->view ( 'statistics/piechart', array (
				'events' => $events 
		) );
		$this->load->view ( 'footer' );
	}
	function column() {
		$this->check_session ();
	
		$this->load->model ( 'stat_model' );
		$events = $this->stat_model->getEvents ();
		$this->load->view ( 'header' );
		$this->load->view ( 'statistics/columnchart');
		$this->load->view ( 'footer' );
	}
	
	function geo() {
		$this->check_session ();
	
		$this->load->model ( 'stat_model' );
		$installs = $this->stat_model->getInstalls ();
		$this->load->view ( 'header' );
		$this->load->view ( 'statistics/geochart',array (
				'installs' => $installs
		)	);
		$this->load->view ( 'footer' );
	}
	function check_session() {
		session_start ();
		if (! isset ( $_SESSION ['loggedIn'] )) {
			
			redirect ( 'logincontroller' );
		}
	}
}
	
	