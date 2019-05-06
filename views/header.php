<?php

if(!empty($_POST)) {
	if( $_POST['r'] == 'user-add' && $_POST['crud'] == 'set') {

		$users_controller = new UserController();
		$ruta = 'public/img/'.$_POST['user'].'-per-'.strtolower($_FILES['img_perfil']['name']);
		$ruta_port = 'public/img/'.$_POST['user'].'-por-'.strtolower($_FILES['img_portada']['name']);
		@move_uploaded_file($_FILES['img_perfil']['tmp_name'], $ruta);
		@move_uploaded_file($_FILES['img_portada']['tmp_name'], $ruta_port);



		$new_user = array(
			'nombre' =>  $_POST['name'], 
			'apellido' =>  $_POST['apellido'],
			'name_user' =>  $_POST['user'], 
			'pass' =>  $_POST['pass'],
			'email' =>  $_POST['mail'],
			'puntos' =>  0,
			'rango' => 	"Novato",
			'estado' => true,
			'img_perfil' => $ruta,
			'img_portada' => $ruta_port
		);

		$user = $users_controller->set($new_user);
		$direccion = empty($_GET['r'])?'home':$_GET['r'];

		header ( 'Location: '.$direccion.'');

	}
}
	$header = '
	<!DOCTYPE html>
	<html>
	<head>
		<title>Fox-Community</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="http://localhost/fox-community/public/css/estilos.css">
	</head>
	<body>
		<section class="cont-max" id="princ">
			<div class="cont-row-min">
				<h1 style="margin-left: 20px; font-weight: normal;">Fox-Community</h1>
				<form class="buscador">
					<input type="search" name="buscar" required>
					<button type="submit" >
					</button>
				</form>
				<nav>
					<ul>
						<li class="list-hor-15"><a href="http://localhost/fox-community" class="a-negrita">Home</a></li>
						<li class="list-hor-15"><a href="" class="a-negrita">Explorar</a></li>';

	if($_SESSION['ok'] == false){
		$header .= '<li class="list-hor-15">
								<ul>
									<li onclick="registro()">Registrate</li>
									<li>
										<form method = "POST" class="registro" id="registro" enctype="multipart/form-data">
											<h4>Nombre:</h4>
											<div class = "p_25">
												<input type = "text" name="name" required>
											</div>
											<h4>Apellido:</h4>
											<div class = "p_25">
												<input type = "text" name="apellido" required>
											</div>
											<h4>Usuario:</h4>
											<div class = "p_25">
												<input type = "text" name="user" required>
											</div>
											<h4>Imagen de Perfil:</h4>
											<div class = "p_25">
												<input type = "file" name="img_perfil" accept=".jpg,.jpeg,.png" required>
											</div>
											<h4>Imagen de Portada:</h4>
											<div class = "p_25">
												<input type = "file" name="img_portada" accept=".jpg,.jpeg,.png" required>
											</div>
											<h4>Password:</h4>
											<div class = "p_25">
												<input type = "password" name="pass" required>
											</div>
											<h4>Email:</h4>
											<div class = "p_25">
												<input type = "mail" name="mail" required>
											</div>
											<div class = "p_25">
												<input type = "submit" value = "Registrar">
												<input type = "hidden" name = "r" value = "user-add">
												<input type = "hidden" name = "crud" value = "set">
											</div>
										</form>
									</li>
								</ul>
							</li>
							<li class="list-hor-15">
								<ul>
									<li onclick="inicio()">Iniciar Sesion</li>
									<li>
										<form method = "POST" class="registro" id="inicio">
											<h4>Usuario:</h4>
											<div class = "p_25">
												<input type = "text" name = "user" required>
											</div>
											<h4>Password:</h4>
											<div class = "p_25">
												<input type = "password" name = "pass" required>
											</div>
											<div class = "p_25">
												<input class="button add" type="submit" value="Entrar">
												<input type="hidden" name="r" value="user-get">
												<input type="hidden" name="crud" value="get">
											</div>
										</form>
									</li>
								</ul>
							</li>';
	}else{
		$header .= '<li class="list-hor-15" onclick="perfil()">@'.$_SESSION['user'].'
						<ul id="menu-perfil" class="registro">
							<li><a href="http://localhost/fox-community/crear_post">Crear Post</a></li>
							<li><a href="/fox-community/user/'.$_SESSION['user'].'">Perfil</a></li>	
							<li><a href="/fox-community/logout">Salir</a></li>
						</ul>
					</li>';
	}	

$header.='</ul></nav></div></section><section class="cont-max" id="prin">';

printf($header);
