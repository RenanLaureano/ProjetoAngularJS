<?php
    session_start();

    $erro_username = isset($_GET['erro_username']) ? $_GET['erro_username'] : 0;
    $erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;

    $erro = isset($_GET['erro']) ? $_GET['erro']: 0;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<title>Forum do AngularJS</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="icon" href="imagens/favicon.ico" type="image/x-icon">
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

		<!-- Bootstrap -->
	    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="css/estilo.css">
	   	
	   	<style type="text/css">
	   		#teste{
	   			margin-top: 100px;
	   		}

	   		.a{
	   			color: red;
	   		}
	   	</style>

	   	<script type="text/javascript">
	   		//XMLHttpRequest POST
			function loadDoc() {
			  var xhttp = new XMLHttpRequest();
			  xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			      document.getElementById("demo").innerHTML = this.responseText;
			    }
			  };
			  xhttp.open("POST", "demo_post.php", true);
			  xhttp.send();
			}

	   		//XMLHttpRequest GET
            $(document).ready(function(){
                $('.btn_carrega_conteudo').click(function(){
                    var carrega_url = this.id;
                    carrega_url = carrega_url + "_conteudo.php";                    
                    
                    $.ajax({
                        url: carrega_url,
                        success: function(data){
                            $('#div_conteudo').html(data);
                        },
                        beforeSend: function(){
                            $('#loader').css({display:"block"});
                        },
                        complete: function(){
                            $('#loader').css({display:"none"});
                        }
                    });
                });
            });

            var httpRequest;

			function fazerRequisicao(url, destino){
				document.getElementById(destino).innerHTML = "<center><img src='loader.gif'></center>";

				if(window.XMLHttpRequest){
					httpRequest = new XMLHttpRequest();
				} else if(window.ActiveXObject){
					try{
						httpRequest = new ActiveXObject("Msxml2.XMLHTTP");	
					} catch(e){
						try{
							httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
						} catch(e){
							alert('Impossivel instanciar o objeto xmlhttprequest para esse navegador/versão');
						}
					}	
				}

				if(!httpRequest){
				alert('Erro ao tentar criar instancia do objeto XMLHttpRequest');
				return false;	
				}

				httpRequest.onreadystatechange = situacaoRequisicao;

				httpRequest.open("GET", url);
				httpRequest.send();
			}						

			function situacaoRequisicao(){
				if(httpRequest.readyState == 4){
					if(httpRequest.status == 200){
						document.getElementById('div_conteudo').innerHTML = httpRequest.responseText;
					}
				}
			}

			
        </script>
	</head>
	<body id="teste">
		<header class="menu menuH">
			<h1 class="ang-header">
				<a href="index.html">
				<img width="117" height="30" src="https://angularjs.org/img/angularjs-for-header-only.svg"></a>
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
		<h2 style="text-align: center;">O que deseja fazer?</h2>
		<div style="text-align: center;">
			<a href="#" class="btn btn-primary btn_carrega_conteudo" id="pagina_1">Cadastrar uma conta</a>
			<a href="#" class="btn btn-primary" onclick="fazerRequisicao('pagina_2_conteudo.php','div_conteudo')">Login</a>
			<a href="#" class="btn btn-primary" onclick="loadDoc()">Ajuda</a>
			<a href="#" class="btn btn-primary btn_carrega_conteudo" id="pagina_3">Imagens do AngularJS</a>	
		</div>
		<div class="col-md-10" id="div_conteudo">
            <img id="loader" src='loader.gif' style="display: none">
        </div>

        <div class="col-md-12" id="demo"></div>

        <?php
        	if($erro_username){
	        	echo '
	        		<script> alert("Username já cadastrado, O cadastro não foi realizado");</script>	        		
	        	';
	    	}

	    	if($erro_email){
	        	echo '
	        		<script> alert("E-mail já cadastrado, O cadastro não foi realizado");</script>
	        	';
	    	}
        ?>    

		<?php
			if($erro == 1){
				echo 
				'<section>
					<div class="container">
					    <div class="row">
					        <div class="col-md-4">
								    <h3>Logar</h3>
								    <form method="post" action="valida-acesso.php" id="formLogin">
								        <div class="form-group">
								            <div class="input-group">
					                            <span class="input-group-addon">@</span>
					                            <input type="e-mail" name="username_login" class="form-control" id="email" placeholder="Digite seu email ou username">
					                        </div>
								        </div>
								        <div class="form-group">
								            <input type="password" name="senha_login" class="form-control" id="senha" placeholder="Digite sua senha">
								        </div>
								        <font color="#FF0000">Usuário e/ou senha incorreto(s)</font>
										<div class="form-group">
								            <div class="input-group">
								            	<button type="submit" class="btn btn-primary">Logar</button>
										    </div>
										</div>
								    </form>
							</div>
						</div>
					</div>
				</section>
				<div class="col-md-8"></div>
				';
			}
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	</body>
</html>