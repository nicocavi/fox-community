<?php
class SessionController {
	private $session;
	public function __construct() {
		$this->session = new UserModel();
	}
	public function login($user, $pass) {
		return $this->session->validate_user($user, $pass);
	}
	public function logout() {
		session_start();
		session_destroy();
		header('Location: ./');
	}

}