<?php
	session_start();
    
    session_unset(); 
    
	$erro = isset($_GET['erro']) ? $_GET['erro']: 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<title>Forum do AngularJS</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="icon" href="imagens/favicon.ico" type="image/x-icon">

		<!-- Bootstrap -->
	    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="css/estilo.css">
	   	<link rel="stylesheet" type="text/css" href="css/estilo-coment.css">

	</head>
	<body id="teste">
		<header class="menu menuH">
			<h1 class="ang-header">
				<a href="index.html">
					<img width="117" height="30" src="https://angularjs.org/img/angularjs-for-header-only.svg">
				</a>
			</h1>
			<ul class="menu">
				<li class="dropdown classe-discuss menu">
					<a href="forum-form-cadastro.php">FORUM</a>
				</li>
				<li class="dropdown menu">
					<a href="#">DISCUSS</a>
				</li>
				<li class="dropdown menu">
					<a href="#">DEVELOP</a>						
				</li>
				<li class="dropdown menu">
					<a href="#">LEARN</a>						
				</li>
			</ul>
		</header>
		<section>
			<div class="container">
		      	<div class="jumbotron">
		        	<h1>Esperamos que você volte :)</h1>
	                <br>
		        	<p class="sucesso">
	                    <a href="index.php">Clique aqui</a> para ir para a página inicial do AngularJS
	                </p>
		      	</div>
		       <div class="clearfix"></div>
			</div>

		</section>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>