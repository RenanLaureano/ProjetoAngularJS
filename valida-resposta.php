<?php
	session_start();

	if(!isset($_SESSION['username'])){
        header('Location: cadastro_evento_erro.php?erro=1');
    }

	require_once('db.class.php');

	$texto = $_POST['resposta-post'];
	$nome = $_SESSION['username'];
	$id = $_SESSION['id-post'];
	

	$objDB = new db();
	$link = $objDB -> conecta_mysql();

	$username = $_SESSION['username'];	

	$sql = "INSERT INTO _coment VALUES (DEFAULT,'$nome','$texto',CURRENT_DATE,'$id')";

	//executar query
	if(mysqli_query($link, $sql)){
		header('Location: forum-coment.php');
	} else{
		header('Location: index.php');
	}
?>
