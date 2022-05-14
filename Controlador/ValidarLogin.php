<?php
	session_start();
    require_once '../Modelo/Conexion.php';
    require_once '../Modelo/Funciones.php';
	require_once '../Modelo/Querys.php';

	if(isset($_POST['loginUsuario']))
	{
		$login = $_POST['loginUsuario'];
	}
	else
	{
		$login = '';
	}
	if(isset($_POST['clave']))
	{
		$clave = $_POST['clave'];
	}
	else
	{
		$clave = '';
	}

	if(!$dbc)
	{
		MostrarAlerta('Error BD', 'Error al conectar con el servidor de BD.','times-circle');
		exit();		
	}
	else
	{
		$contU = ContarUsuario($login);
		
		if($contU == 0)
		{
			MostrarAlerta('Acceso al Sistema', 'Login Invalido.','times-circle');
			exit();			
		}
		else
		{
			$consU = ConsultarUsuario($login);
			
			$idUsuarios = $consU['idUsuarios'];
			$nombreUsuario = $consU['nombreUsuario'];
			$apellidoUsuario = $consU['apellidoUsuario'];
			$loginUsuario = $consU['loginUsuario'];
			$cedulaUsuarios = $consU['cedulaUsuario'];
			$correoUsuario = $consU['correoUsuario'];
			$claveU = $consU['clave'];
			$idClave = $consU['idClave'];
			$habilitado = $consU['habilitado'];
			$tipoUsuario = $consU['tipoUsuario'];
			$nacionalidad = $consU['abrNacionalidad'];
			
			if(!$habilitado)
			{
				MostrarAlerta('Acceso al Sistema', 'Su usuario se encuentra inhabilitado.<br>Favor contactar con el Administrador del Sistema.','times-circle');
				exit();				
			}
			else
			{
				if($claveU != $clave)
				{
					InsertarIntentos($idClave, $idUsuarios);
					$contI = ContarIntentos($idClave, $idUsuarios);
					if($contI <= 3)
					{
						MostrarAlerta('Acceso al Sistema', 'Clave inv&aacute;lida. A usted le queda '.(4 - $contI).' intentos.<br>Favor contactar con el Administrador del Sistema.', 'times-circle');
						exit();
					}
					else
					{
						DeshabilitarClave($idClave, $idUsuarios);
						MostrarAlerta('Acceso al Sistema', 'Clave inv&aacute;lida.<br>Su usuario ha sido bloqueado.<br>favor, contactar con el Administrador del Sistema.', 'times-circle');
						exit();
					}
				}
				else
				{
					BorrarIntentos($idClave, $idUsuarios);
					$_SESSION['Usuario']['idUsuarios'] = $idUsuarios;
					$_SESSION['Usuario']['Nombre'] = $nombreUsuario;
					$_SESSION['Usuario']['Apellido'] = $apellidoUsuario;
					$_SESSION['Usuario']['Cedula'] = $cedulaUsuarios;
					$_SESSION['Usuario']['Correo'] = $correoUsuario;
					$_SESSION['Usuario']['Login'] = $login;
					$_SESSION['Usuario']['TipoUsuario'] = $tipoUsuario;
					$_SESSION['Usuario']['nacionalidad'] = $nacionalidad;
					Direccionar('../Vista/Menu.php');
					exit();
				}
			}
			
		}
	}

?>