<?php
	session_start();

	if(!isset($_SESSION['username'])){
        header('Location: cadastro_evento_erro.php?erro=1');
    }

	require_once('db.class.php');

	$titulo = $_POST['nome'];
	$texto = $_POST['comment'];
	$nome = $_SESSION['username'];
	

	$objDB = new db();
	$link = $objDB -> conecta_mysql();

	$username = $_SESSION['username'];	

	$sql = "INSERT INTO _post VALUES (default,'$titulo','$texto',CURRENT_DATE,'$nome')";

	//executar query
	if(mysqli_query($link, $sql)){
		header('Location: forum-coment.php');
	} else{
		header('Location: forum-coment.php');
	}
?>
