<?php
	session_start();

	require_once('db.class.php');

	$username = $_POST['username_login'];
    $senha = md5($_POST['senha_login']);

    $sql = "SELECT id_usuario, username, email FROM usuario WHERE username = '$username' AND senha = '$senha'";

	$objDB = new db();
	$link = $objDB -> conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
		$dados_username = mysqli_fetch_array($resultado_id);
		if(isset($dados_username['username'])){
			/*
			$_SESSION['id_usuario'] = $dados_username['id'];
		 	$_SESSION['username'] = $dados_username['username'];
		 	$_SESSION['email'] = $dados_username['email'];
			*/	
			header('Location: forum-coment.php');
		} else{
			header('Location: forum-form-cadastro.php?erro=1');
		}
	} else{
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
	}
?>