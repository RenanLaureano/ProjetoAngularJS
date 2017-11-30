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
		</header>
		<h2 style="text-align: center;">O que deseja fazer?</h2>
		<a href="#" class="btn btn-primary btn_carrega_conteudo" id="pagina_1">Cadastrar uma conta</a>
		<a href="#" class="btn btn-primary" onclick="fazerRequisicao('pagina_2_conteudo.php','div_conteudo')">Login</a>
		<div class="col-md-10" id="div_conteudo">
            <img id="loader" src='loader.gif' style="display: none">
        </div>
		<!--<section>
			<div class="container">
      			<div class="row">
        			<div class="col-sm-8">
          				<h3>Cadastre-se</h3>
          				<form action="valida-cadastro.php" method="post">
			            	<div class="form-group">
			              		<label for="nome">Nome<a class="a">*</a></label>
			              		<input type="text" name="nome" class="form-control" id="nome" placeholder="Digite seu nome completo">
			            	</div>
			            	<div class="form-group">
			              		<label for="username">Username<a class="a">*</a></label>
			              		<input type="text" name="username" class="form-control" id="username" placeholder="Digite o username que desejar">
			              		<?php
	                                /*if($erro_username){
	                                    echo '<font color="#FF0000">Usuário já existe</font>';
	                                }*/
	                            ?>
			            	</div>
			            	<div class="form-group">
			              		<label for="pais">País<a class="a">*</a></label>
			              		<input type="text" name="pais" class="form-control" id="pais" placeholder="Digite o nome do seu país, ex: Brasil">
			            	</div>			            	
			            	<div class="form-group">
			              		<label for="estado">Estado<a class="a">*</a></label>
			              		<input type="text" name="estado" class="form-control" id="estado" placeholder="Digite o seu estado, ex: Paraná">
			            	</div>
			            	<div class="form-group">
			              		<label for="cidade">Cidade<a class="a">*</a></label>
			              		<input type="text" name="cidade" class="form-control" id="cidade" placeholder="Digite o nome da sua cidade, ex: Cornélio Procópio">
			            	</div>
			            	<div class="form-group">
			              		<label for="bairro">Bairro<a class="a">*</a></label>
			              		<input type="text" name="bairro" class="form-control" id="bairro" placeholder="Digite o nome do seu bairro, ex: Centro">
			            	</div>
			            	<div class="form-group">
			              		<label for="rua">Rua<a class="a">*</a></label>
			              		<input type="text" name="rua" class="form-control" id="rua" placeholder="Digite o nome da sua rua/avenida/viela, ex: Av. Ayrton Senna">
			            	</div>
			            	<div class="form-group">
			              		<label for="numero">Número<a class="a">*</a></label>
			              		<input type="text" name="numero" class="form-control" id="numero" placeholder="Digite o número da sua residência, ex: 456">
			            	</div>
			            	<div class="form-group">
			              		<label for="complemento">Complemento</label>
			              		<input type="text" name="complemento" class="form-control" id="complemento" placeholder="Digite o complemento da sua residência, ex: casa dos fundos">
			            	</div>		

				            <div class="form-group">
				              	<label>Digite um e-mail válido<a class="a">*</a></label>
		                        <div class="input-group">
		                            <span class="input-group-addon">@</span>
		                            <input type="e-mail" class="form-control" name="email_name" placeholder="Digite seu email" required="requiored">
		                        </div>
		                        <?php
		                            /*if($erro_email){
		                                echo '<font color="#FF0000">E-mail já existe</font>';
		                            }*/
		                        ?>
				            </div>
				            
				            <div class="form-group">
				              	<label for="senha">Senha<a class="a">*</a></label>
				              	<input type="password" name="senha" class="form-control" id="senha" placeholder="Digite uma senha">
				            </div>    
	                        <div class="form-group">
	                            <label for="exampleInputFile">Insira uma foto de perfil</label>
	                            <input type="file" id="exampleInputFile">
	                            <p class="help-block">Arquivos .PNG, .JPEG, .JPG de no máximo 2Mb.</p>
	                        </div>
       						<p class="help-block">(<a class="a">*</a>) Itens obrigatórios</p>
				            <button type="submit" class="btn btn-info"  name="cadastrar" value="Cadastrar">Cadastrar Usuário</button>
          				</form>
        			</div>
        			
			        <div class="col-sm-4 <?= $erro/* == 1 ? 'open' : ''*/?>">
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
			            	<?php
								/*if($erro == 1){
									echo '<font color="#FF0000">Usuário e/ou senha incorreto(s)</font>';
								}*/
							?>
							<div class="form-group">
			              		<div class="input-group">
			            			<button type="submit" class="btn btn-primary">Logar</button>
					            </div>
					        </div>
			          	</form>
			        </div>
      			</div>
    		</div>
		</section>-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	</body>
</html>