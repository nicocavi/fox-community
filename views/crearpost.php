<?php
if($_SESSION['ok'] == true){
	if(!empty($_POST)){
		if( $_POST['r'] == 'post-set' && $_POST['crud'] == 'set' ) {
			$postController = new PostController();
			$post=  array(
				'titulo' => $_POST['titulo'], 
				'cuerpo' => $_POST['cuerpo'], 
				'user' => $_SESSION['user'] 
			);

			$postController->set($post);

			$titulo = $postController->setUrl($_POST['titulo']);
			header ( "Location: $titulo");
			printf($titulo);
		}
	}
	printf('
		<section class="cont-crear-post">
			<form method = "POST" class="crear-post" >
				<h4>Titulo:</h4>
				<div class = "p_25">
					<input type = "text" name = "titulo" required>
				</div>
				<h4>Contenido:</h4>
				<div class = "p_25">
					<textarea name="cuerpo" required></textarea>
				</div>
				<div class = "p_25">
					<input type="submit" value="Publicar">
					<input type="hidden" name="r" value="post-set">
					<input type="hidden" name="crud" value="set">
				</div>
			</form>
		</section>
	');
}else{
	$error = new ViewController();
	$error->load_view('error404');
}