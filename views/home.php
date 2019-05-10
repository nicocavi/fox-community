<?php

$postController = new PostController();
$userController = new UserController();
$comentController = new ComentController();

$post = $postController->get();
$users = $userController->userDestacados();

$arregloPost = '';
$userDesta = '';

for ($n=count($post)-1; $n >= 0; $n--) { 
	$arregloPost .= '
	<div class="cont-mid">
		<article class="arti-home">
			<div >
				<header>
					<a href="'.$post[$n]['url'].'"><h3 class="titulo-art">'.$post[$n]['titulo'].'</h3></a>
				</header>
				<footer class="footer-art">			
				</footer>
			</div>
			<div id="stats">
				<p>Me gusta</p>
				<p>Favoritos</p>
				<p>Compartir</p>
			</div>
		</article>
	</div>
	';
}

for ($n=0; $n < count($users); $n++) { 
	$userDesta .= '
	<li><a href="user/'.$users[$n]['name_user'].'">'.$users[$n]['name_user'].'</a></li>';
}

printf('
	
			<section id="cont-arti">
				'.$arregloPost.'
			</section>
			<div class="sec-sec">
				<section class="solo-list">
					<header>
						<h4>Estadisticas</h4>
					</header>
					<main>
						<h4>Usuario Registrados: '.$userController->userCount().'</h4>
						<h4>Post creados: '.$postController->postCount().'</h4>
						<h4>Comentarios creados: '.$comentController->comentCount().'</h4>
					</main>
				</section>
				<section class="solo-list">
					<header>
						<h4>Tendencias</h4>
					</header>
					<p style="padding:5px"> Forma parte de esta nueva comunidad! </p>
				</section>
			</div>
			<div class="sec-sec">
				<section class="solo-list">
					<header>
						<h4>Ultimos usuarios</h4>
					</header>
					<ul>
						'.$userDesta.'
					</ul>
				</section>
				<section class="solo-list">
					<header>
						<h4>Usuarios destacados</h4>
					</header>
					<ul>
						<li><a href="">Cavi</a></li>
						<li><a href="">Cavi</a></li>
						<li><a href="">Cavi</a></li>
						<li><a href="">Cavi</a></li>
						<li><a href="">Cavi</a></li>
						<li><a href="">Cavi</a></li>
						<li><a href="">Cavi</a></li>
						<li><a href="">Cavi</a></li>
						<li><a href="">Cavi</a></li>
					</ul>
				</section>
			</div>


');

