<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: forum-form-cadastro.php?erro=1');
    }

    $username = $_SESSION['username'];
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
					<a href="forum.html">FORUM</a>
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
			<div style="text-align: center;">
				<h4>Usuario: <?= $_SESSION['username']?> <a href="valida-log-out.php"><button type="submit" class="btn btn-danger btn-sm">Log-out</button></a></h4>
			</div>
		</header>
		<section>
			<div class="container">
      			<div class="row">
        			<div class="col-sm-8">
          				<h3>O que deseja perguntar <?= $_SESSION['username']?>?</h3>
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
			          	<h3>Buscar discussões</h3>
			          	<form>
				            <div class="form-group">
				              	<input type="text" class="form-control" placeholder="Digite algo, ex: Angular 4 JSON for loop error">
				            </div>
				            <button type="submit" class="btn btn-primary">Buscar</button>
			          	</form>
	        		</div>

					<div class="col-sm-12">
						<form>
							<div class="linha"></div>
						</form>
					</div>

					<div class="col-sm-12">
          				<h2>Discuções</h2>
          				<form>
	          				<div class="form-group">
				              	<h3>Título da postagem</h3>
				            </div>
			            	<h6>Nome: Fulano da Silva, Data: 11/11/1111 - 22:34</h6>
			            	<fieldset disabled>
				            	<div class="form-group">
								  	<textarea class="form-control" rows="5" id="comment" placeholder="kajsdhkajshdkjashdkjashkdjahskdjahskjdhaskjdhkasjdka sdkhaskjdh kasjhdkjashdkjashdkjashdk askdhkasjdhkja"></textarea>
								</div>
							</fieldset>
							<div class="form-group comentario borda">
			            		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut urna eu orci dignissim elementum. Mauris molestie tincidunt accumsan. Suspendisse egestas nibh augue, eget condimentum nisl suscipit et. Nunc ullamcorper quam nisi, ut imperdiet est ultrices quis. Donec vitae ex vel turpis dictum blandit ac nec diam.</p>
			            		<h6>Nome: Fulano da Silva, Data: 11/11/1111 - 22:34</h6>
			            	</div>
			            	<div class="form-group comentario borda">
			            		<p>Cras justo lacus, tristique et elit sit amet, posuere viverra nulla. Praesent consequat diam in magna rhoncus condimentum. Sed porttitor est ante, sit amet aliquam enim aliquet sit amet. Fusce vitae arcu magna. Praesent nisi tellus, dignissim quis metus et, accumsan fermentum leo. Nam nibh arcu, congue ac nibh fermentum, ultricies tincidunt lorem. Sed semper ex ut sodales efficitur. Vivamus in dapibus enim.</p>
			            		<h6>Nome: Fulano da Silva, Data: 11/11/1111 - 22:34</h6>
			            	</div>
			            	<div class="col-sm-6">
				            	<div class="form-group">
								  	<textarea class="form-control" rows="5" id="comment" placeholder="Responda essa publicação"></textarea>
								</div>
							</div>
				            <button type="submit" class="btn btn-primary">Comentar esta publicação</button>
          				</form>
        			</div>
        			<div class="col-sm-12">
						<form>
							<div class="linha"></div>
						</form>
					</div>
					<div class="col-sm-12">
          				<form>
	          				<div class="form-group">
				              	<h3>Título da postagem</h3>
				            </div>
			            	<h6>Nome: Fulano da Silva, Data: 11/11/1111 - 22:34</h6>
			            	<fieldset disabled>
				            	<div class="form-group">
								  	<textarea class="form-control" rows="5" id="comment" placeholder="kajsdhkajshdkjashdkjashkdjahskdjahskjdhaskjdhkasjdka sdkhaskjdh kasjhdkjashdkjashdkjashdk askdhkasjdhkja"></textarea>
								</div>
							</fieldset>
							<div class="form-group comentario borda">
			            		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut urna eu orci dignissim elementum. Mauris molestie tincidunt accumsan. Suspendisse egestas nibh augue, eget condimentum nisl suscipit et. Nunc ullamcorper quam nisi, ut imperdiet est ultrices quis. Donec vitae ex vel turpis dictum blandit ac nec diam.</p>
			            		<h6>Nome: Fulano da Silva, Data: 11/11/1111 - 22:34</h6>
			            	</div>
			            	<div class="form-group comentario borda">
			            		<p>Cras justo lacus, tristique et elit sit amet, posuere viverra nulla. Praesent consequat diam in magna rhoncus condimentum. Sed porttitor est ante, sit amet aliquam enim aliquet sit amet. Fusce vitae arcu magna. Praesent nisi tellus, dignissim quis metus et, accumsan fermentum leo. Nam nibh arcu, congue ac nibh fermentum, ultricies tincidunt lorem. Sed semper ex ut sodales efficitur. Vivamus in dapibus enim.</p>
			            		<h6>Nome: Fulano da Silva, Data: 11/11/1111 - 22:34</h6>
			            	</div>
			            	<div class="col-sm-6">
				            	<div class="form-group">
								  	<textarea class="form-control" rows="5" id="comment" placeholder="Responda essa publicação"></textarea>
								</div>
							</div>
				            <button type="submit" class="btn btn-primary">Comentar esta publicação</button>
          				</form>
        			</div>
        		</div>
        	</div>
		</section>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>