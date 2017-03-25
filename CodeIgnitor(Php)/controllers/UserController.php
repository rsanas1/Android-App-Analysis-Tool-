<?php
class UserController extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->database ();
		$this->load->helper ( 'url' );
		$this->load->model ( 'user_model' );
		$this->load->file ( 'application/classes/mailer/PHPMailerAutoload.php' );
	}
	function index() {
		session_start ();
		$this->load->view ( 'header' );
		$this->load->view ( 'changepass' );
		$this->load->view ( 'footer' );
	}
	function changep() {
		session_start ();
		$data = $this->user_model->updatePass ( $_POST );
		
		if ($data) {
			
			$this->sendMail ( $data->email );
			redirect ( 'UserController?success' );
		} else
			
			redirect ( 'UserController?fail' );
	}
	function forgotpass() {
		session_start ();
		$data = $this->user_model->forgotPass ( $_POST );
		if ($data) {
			$this->sendMail ( $data->email );
			redirect ( 'logincontroller' );
		}
	}
	function sendMail($toEmail) {
		$mail = new PHPMailer ();
		
		$mail->isSMTP (); // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com'; // Specify main and backup server
		$mail->Port = 465;
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = 'gunday123@gmail.com'; // SMTP username
		$mail->Password = 'rishisanas'; // SMTP password
		$mail->SMTPSecure = 'ssl'; // Enable encryption, 'ssl' also accepted
		
		$mail->From = 'gunday123@gmail.com';
		$mail->FromName = 'AndroidAnalysis';
		$mail->addAddress ( $toEmail, "Developer" ); // Add a recipient
		$mail->addReplyTo ( 'gunday123@gmail.com', 'AndroidAnalysis' );
		
		$mail->WordWrap = 50; // Set word wrap to 50 characters
		$mail->isHTML ( true ); // Set email format to HTML
		
		$mail->Subject = 'Password Change';
		
		$mail->Body = 'Hello. your password has been changed.';
		/* $mail->Body .= 'To Check the message, please click <a href="'.$link.'">here</a>.'; */
		
		$mail->send ();
	}
}
