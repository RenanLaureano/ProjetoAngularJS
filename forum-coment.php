<?php
    session_start();
    require_once('db.class.php');

    if(!isset($_SESSION['username'])){
        header('Location: forum-form-cadastro.php?erro=1');
    }

    $username = $_SESSION['username'];

    $objDB = new db();
    $link = $objDB->conecta_mysql();

    $sqlPost = "SELECT * from _post ORDER BY id_post desc";

    $posts = mysqli_query($link, $sqlPost);
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

	   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/preference.js"></script>
        <script src="js/require.js"></script>
		
	</head>
	<body id="teste">
		<header class="menu menuH">
			<h1 class="ang-header">
				<a href="index.php">
					<img width="117" height="30" src="https://angularjs.org/img/angularjs-for-header-only.svg">
				</a>
			</h1>
			<ul id="menu-color" class="menu">
				<li class="dropdown classe-discuss menu">

					<a href="forum-form-cadastro.php">FORUM</a>

					<a href="forum-form-cadastro.php">FORUM</a>

					<a href="forum-comment.php">FORUM</a>

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

			<div class="col-md-6 menu-cores">
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Trocar cor do Header
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item bt-cor-cinza" href="#" onClick="colorheader('#263238')">Cinza</a>
						<a class="dropdown-item bt-cor-rosa" href="#" onClick="colorheader('#d60045')">Rosa</a>
						<a class="dropdown-item bt-cor-verde" href="#" onClick="colorheader('#3d733f')">Verde</a>
					</div>
				</div>
			</div>

			<div class="col-md-6" style="text-align: center;">
				<h4>Usuario: <?= $_SESSION["username"]?> <a href="valida-log-out.php"><button type="submit" class="btn btn-danger btn-sm">Log-out</button></a></h4>
			</div>
		</header>

		<section>
			<div class="container">
      			<div class="row">
        			<div class="col-sm-8">
          				<h3>O que deseja perguntar <?= $_SESSION["username"]?>?</h3>

          				<form method="post" action="valida-comentario.php">
          					<div class="form-group">
			              		<label for="nome">Título da discussão</label>
			              		<input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o título da postagem">
			            	</div>
			            	<div class="form-group">
							  	<label for="comment">Pergunte</label>
							  	<textarea class="form-control" rows="5" name="comment" id="comment" placeholder="Digite alguma pergunta"></textarea>
							</div>
				            <button type="submit" class="btn btn-primary">Comentar</button>
          				</form>
        			</div>

	    			<div class="col-sm-4">
			          	<h3>Buscar Usuarios</h3>
			          	<form>
				            <div class="form-group">
				              	<input onkeypress="Req('teste')" id="busca-id" type="text" class="form-control" placeholder="Digite um nome...">
				            </div>
				            <button type="submit" class="btn btn-primary">Buscar</button>
			          	</form>
	        		</div>

					<div class="col-sm-12">
						<div class="linha"></div>
					</div>

				<?php
				if($posts != null) {
				while($registro = mysqli_fetch_array($posts, MYSQLI_ASSOC)){
					echo'
					<div class="col-sm-12">          				
	          				<div class="form-group">
				              	<h3>'.$registro['title'].'</h3>
				            </div>
			            	<h6>Nome: '.$registro['username'].', Data: '.$registro['date_post'].'</h6>
			            	<fieldset disabled>
				            	<div class="form-group">
								  	<textarea class="form-control" rows="5" id="comment">
								  	'.$registro['texto'].'
								  	</textarea>
								</div>
							</fieldset>
							';

						// 	$sqlPost = 'SELECT * from _coment WHERE id_post = '.$registro['id_post'].' ORDER BY id_post';
						// 	$coments = mysqli_query($link, $sqlPost);

						// 	while($registro2 = mysqli_fetch_array($coments, MYSQLI_ASSOC)){
						// 	echo'
						//      <div class="form-group comentario borda">
			   //          		<p>
			   //          			'.$registro2['coment'].'
			   //          		</p>
			   //          		<h6>Nome: '.$registro2['username'].', Data: '.$registro2['post_date'].'</h6>
			   //          	</div>
			   //          	';
			   //          	}
			   //          	echo'
				  //           <form method="post" action="valida-resposta.php">
				  //           	<div class="col-sm-6">
					 //            	<div class="form-group">
						// 			  	<textarea name="resposta-post" class="form-control" rows="5" id="comment" placeholder="Responda essa publicação"></textarea>
						// 			</div>
						// 			<div style="display:none"><input type="text" name="id-post" value="'.$registro2['id_post'].'"></div>
						// 		</div>
					 //            <button type="submit" class="btn btn-primary">Comentar esta publicação</button>
	     //      				</form>
      //     				<div class="col-sm-12">
						// 	<div class="linha"></div>
						// </div>	
      //   			</div>
      //   			';
        		}
        	}
        		echo'
        		</div>
        	</div>
		</section>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
';
?>   