<?php
class logincontroller extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->database ();
		$this->load->helper ( 'url' );
		$this->load->model ( 'login_model' );
		$this->load->file ( 'application/classes/mailer/PHPMailerAutoload.php' );
	}
	function check_session() {
		session_start ();
		if (isset ( $_SESSION ['loggedIn'] )) {
			redirect ( 'HomeController' );
		}
	}
	function index() {
		$this->check_session ();
		$this->load->view ( 'login' );
	}
	function logout() {	
		session_start ();
		session_destroy ();
		redirect ( 'logincontroller' );
	}
	function authenticateUser() {
		$user = $this->login_model->authenticate ( $_POST );
		$id=$user->index;
		
		if ($id) {
			session_start ();
			$_SESSION ['loggedIn'] = true;
			$_SESSION ['id'] = $id;
			$_SESSION ['name'] = $user->first_name.' '.$user->last_name;
			redirect ( 'HomeController' );
		} else {
			redirect ( 'logincontroller?incorrect=true' );
		}
	}
	function forgotPasswordView() {
		$this->load->view ( 'forgetpass' );
	}
	function forgotPassword() {
		$data = $this->login_model->forgotPass ( $_POST );
		
		if ($data) {
			$this->sendMail ( $data ['email'], $data ['password'] );
			
			redirect ( 'logincontroller' );
		}
	}
	function sendMail($toEmail, $password) {
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
		
		$mail->Subject = 'Forgot Password';
		
		$mail->Body = 'Hello. your password is <b>' . $password . '</b>';
		/* $mail->Body .= 'To Check the message, please click <a href="'.$link.'">here</a>.'; */
		
		$mail->send ();
	}
}
?>

