<?php
	require_once('db.class.php');

	$nome = $_POST['nome'];
	$username = $_POST['username'];
	$pais = $_POST['pais'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];
	$bairro = $_POST['bairro'];
	$rua = $_POST['rua'];
	$numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$email = $_POST['email_name'];
	$senha = md5($_POST['senha']);

	$objDB = new db();
	$link = $objDB -> conecta_mysql();

	$username_existe = false;
	$email_existe = false;

	//verificar se o usuario existe
	$sql_username = "SELECT * FROM usuario WHERE username = '$username'";

	if($resultado_username = mysqli_query($link, $sql_username)){
		$dados_username = mysqli_fetch_array($resultado_username);

		if(isset($dados_username['username'])){
			$username_existe = true;
		}
	} else{
		echo 'Erro ao tentar localizar o registro de usuário';
	}

	//verificar se o email ja existe	
	$sql_email = "SELECT * FROM usuario WHERE email = '$email'";

	if($resultado_email = mysqli_query($link, $sql_email)){
		$dados_email = mysqli_fetch_array($resultado_email);

		if(isset($dados_email['email'])){
			$email_existe = true;
		}
	} else{
		echo 'Erro ao tentar localizar o registro de e-mail';
	}

	if($username_existe || $email_existe){
		$retorno_get = '';

		if($username_existe){
			$retorno_get .= "erro_username=1&";
		}

		if($email_existe){
			$retorno_get .= "erro_email=1&";
		}
	
		header('Location: forum-form-cadastro.php?'. $retorno_get);
		die();
	}

	$sql = "INSERT INTO usuario (nome, username, pais, estado, cidade, bairro, rua, numero, complemento, email, senha) VALUES ('$nome', '$username','$pais','$estado','$cidade','$bairro','$rua', '$numero', '$complemento', '$email', '$senha')";

	//executar query
	if(mysqli_query($link, $sql)){
		header('Location: index.php');
	} else{
		echo 'Erro ao registrar usuário';
	}

?>