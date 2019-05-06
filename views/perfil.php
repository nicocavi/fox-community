<?php

	$url = explode("/", $_GET['r']);
	$userController = new UserController();

	$user = $userController->get($url[1]);

	if(empty($user)){
		$error = new ViewController();
		$error->load_view('error404');
	}else{
		$post = $userController->get_post($url[1]);
		$num_comentarios = $userController->num_comentarios($user[0]['name_user']);
		$num_post = $userController->num_post($user[0]['name_user']);

		$datos_perfil = '<section class="post_in_perfil"><h2 class="h2-perfil">Posts:</h2>';
		for ($n=count($post)-1; $n > 0; $n--) { 
			$datos_perfil .= '
			<article class="arti-home">
					<div >
						<header>
							<a href="http://localhost/fox-community/'.$post[$n]['url'].'">
								<h3>'.$post[$n]['titulo'].'</h3>
							</a>
						</header>
						<footer class="footer-art">			
						</footer>
					</div>
				</article>
			';
		}

		$datos_perfil .= '</section>';

		$datos_perfil .= '
			<section class="perfil_post post_in_perfil margin-10px" style="background-image: url(../'.$user[0]['img_portada'].');">
				<div class="cont-font-post">
					<div class="datos_perfil">
						<img class="img_perfil" src="http://localhost/fox-community/'.$user[0]['img_perfil'].'">
						<h2><a href="http://localhost/fox-community/user/'.$user[0]['name_user'].'">@'.$user[0]['name_user'].'</a></h2>
					</div>
					<div class="info">
						<h4>Comentarios</h4><h3>'.$num_comentarios[0].'</h3>
						<h4>Post</h4><h3>'.$num_post[0].'</h3>
						<h4>Puntos</h4><h3>'.$user[0]['puntos'].'</h3>
						<h4>Rango</h4><h5>'.$user[0]['rango'].'</h5>
					</div>
				</div>
			</section>';

		

		printf($datos_perfil);
}
