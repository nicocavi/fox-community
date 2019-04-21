<?php
	class Router{

		public $router;

		public function __construct($router){

		/**
			if(!isset($_SESSION))
				session_start();

			if(!isset($_SESSION['ok']))
				$_SESSION['ok'] = false;**/
			$login_home = new ViewController();
		
			$router = explode("/", $router);
			
			switch ($router[0]) {
				case 'home':
					$login_home->load_view('home');
					break;
				default:
					$login_home->load_view('post');
					break;

			}
/**
			if($router = 'home'){
				if($_SESSION['ok']){

				}else{
					if(!isset($_POST['uset'])&& !isset($_POST['pass'])){
						$login_form = new ViewController();
						$login_form->load_view('login');
					}else{
						$user_session = new SessionController();
						$session = $user_session->login($_POST['user'],$_POST['pass']);

						if(empty($session)){
							echo'El usuario y el password son incorrectos';
						}else{
							echo 'usuario correcto';
						}
					}
				}
			}
**/

		}
	}
?>