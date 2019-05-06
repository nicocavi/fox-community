<?php
	class Router{

		public $router;

		public function __construct($router){

			if( !isset($_SESSION) )  session_start();
			if( !isset($_SESSION['ok']) )  $_SESSION['ok'] = false;

			$login_home = new ViewController();
		
			$router = explode("/", $router);
			
			if( isset($_POST['user']) && isset($_POST['pass']) ) {
					$user_session = new SessionController();
					$session = $user_session->login($_POST['user'], $_POST['pass']);
					if( empty($session) ) {
						//echo 'El usuario y el password son incorrectos';
						
					} else {
						//echo 'El usuario y el password son correctos';
						//var_dump($session);
						
						$_SESSION['ok'] = true;
						foreach ($session as $row) {
							$_SESSION['user'] = $row['name_user'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['name'] = $row['nombre'];
							$_SESSION['pass'] = $row['pass'];
						}
						
						$direccion = empty($_GET['r'])?'home':$_GET['r'];
						header ( 'Location: '.$direccion.'');
						
					}

				}

			switch ($router[0]) {
				case 'home':
					$login_home->load_view('home');
					break;
				case 'user':
					$login_home->load_view('perfil');
					break;
				case 'logout':
					$login_home->load_view('logout');
					break;
				case 'crear_post':
					$login_home->load_view('crearpost');
					break;
				default:
					$login_home->load_view('post');
					break;
			}
				

		}
	}
