<?php
	
$postController = new PostController();
$post = $postController->get($_GET['r']);
$comentController = new ComentController();

if(!empty($_POST) && $_POST['crud'] == 'set' && $_POST['r'] == 'comentario-set'){
	$coment =  array(
							'url' => $_GET['r'], 
							'user' => $_SESSION['user'], 
							'contenido' => $_POST['contenido']
						);
	$comentController->set($coment);
}

if(empty($post)){
	$error = new ViewController();
	$error->load_view('error404');
}else{

	$com = $comentController->get($post[0]['url']);

	$comentarios = '';

	$userController = new UserController();
	$user = $userController->get($post[0]['user']);

	for ($n=count($com)-1; $n >= 0; $n--) { 
		$comentarios .= '
						<div class="coment">
							<header>
								<h4><a href="http://localhost/fox-community/user/'.$com[$n]['user'].'">@'.$com[$n]['user'].'</a></h4><small><time>'.$com[$n]['fecha'].'</time></small>
							</header>
							<p>'.$com[$n]['contenido'].'</p>
						</div>
						';

	}

	$num_comentarios = $userController->num_comentarios($user[0]['name_user']);
	$num_post = $userController->num_post($user[0]['name_user']);

	printf('
			<div class="post_container">
				<section class="perfil_post" style="background-image: url('.$user[0]['img_portada'].');">
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
				</section>
				<div class="sub_container">
					<section class="post">
						<header>
							<h1>'.$post[0]['titulo'].'</h1>
						</header>
						<p>'.$post[0]['cuerpo'].'</p>
					</section>
					<section class="comentarios">
						<header>
							<h4>Comentarios: ('.count($com).')</h4>

							<h4>Comenta:</h4>
							<form method = "POST" class="crear-comentario" >
								<div class = "p_25">
									<textarea name="contenido" required></textarea>
								</div>
								<div class = "p_25">
									<input type="submit" value="Comentar">
									<input type="hidden" name="r" value="comentario-set">
									<input type="hidden" name="crud" value="set">
								</div>
							</form>
						</header>
						<div class="cont">'.
							$comentarios
						.'</div>
					</section>
				</div>
			</div>
		');
}