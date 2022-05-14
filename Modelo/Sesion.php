<?php
	require_once 'Funciones.php';
	session_start();
	if(!isset($_SESSION['Usuario']['Login']))
	{
		session_unset();
		session_destroy();
		header('Location: ../vista/Login.php');
		exit();		
	}
	if((isset($_SESSION['hora']) && ((time() - $_SESSION['hora']) > 900)))
	{
		session_unset();
		session_destroy();
		header('Location: ../vista/Login.php?error=100');
		exit();		
	}
	$_SESSION['hora'] = time();
?>