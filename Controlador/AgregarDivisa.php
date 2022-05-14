<?php
	require_once '../Modelo/Sesion.php';
	require_once '../Modelo/Funciones.php';
	require_once '../Modelo/Querys.php';
	require_once '../Modelo/Dias.php';
	require_once '../Modelo/Conexion.php';
	
	if(isset($_POST['divisa']))
	{
		$divisa = $_POST['divisa'];
	}
	else
	{
		$divisa = '';
	}
	
	if(isset($_POST['abrDivisa']))
	{
		$abrDivisa = $_POST['abrDivisa'];
	}
	else
	{
		$abrDivisa = '';
	}

	if(!$dbc)
	{
		MostrarAlerta('Error BD', 'Error al conectar con el servidor de BD.','times-circle');
		exti();
	}
	else
	{
		$agrDivisa = AgregarDivisa($divisa, $abrDivisa);
		
		if($agrDivisa > 0)
		{
			MostrarAlerta('Agregar Divisa', 'Se ha agregado exitosamente la divisa a operar.', 'check-circle');
			exit();
		}
		else
		{
			MostrarAlerta('Agregar Divisa', 'Error al agregar la divisa.', 'times-circle');
			exit();
		}
	}
?>