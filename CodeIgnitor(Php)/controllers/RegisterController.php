<?php
class RegisterController extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->database ();
		$this->load->helper ( 'url' );
		$this->load->model ( 'register_model' );
		$this->load->file ( 'application/classes/mailer/PHPMailerAutoload.php' );
	}
	function index() {
		$this->load->view ( 'register' );
	}
	function registerUser() {
		$data = $this->register_model->addUser ( $_POST );
		$this->load->view ( 'login' );
		$this->sendMail ( $data ['email'] );
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
		
		$mail->Body = 'Hello. You Have been registered.';
		/* $mail->Body .= 'To Check the message, please click <a href="'.$link.'">here</a>.'; */
		
		$mail->send ();
	}
}
