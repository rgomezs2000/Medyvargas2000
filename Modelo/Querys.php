<?php
	require_once 'Conexion.php';
	require_once 'Dias.php';

	function ObtenerIcono()
	{
		$ser="localhost";
		$log="root";
		$pass="";
		$bd="medyvargas2000";
		$char = "utf8";	
		$dbc = mysqli_connect($ser,$log,$pass,$bd);
		$dbch = mysqli_set_charset($dbc,$char);	
			
		$strQuery = "SELECT urlIcono FROM imagenes WHERE idImagenes = 1";

		$result = mysqli_query($dbc,$strQuery);
		$results = mysqli_fetch_row($result);
		return $results[0];
	}

	function ObtenerImagenCabecera()
	{
		$ser="localhost";
		$log="root";
		$pass="";
		$bd="medyvargas2000";
		$char = "utf8";	
		$dbc = mysqli_connect($ser,$log,$pass,$bd);
		$dbch = mysqli_set_charset($dbc,$char);	
			
		$strQuery = "SELECT urlImagen FROM imagenes WHERE idImagenes = 1";

		$result = mysqli_query($dbc,$strQuery);
		$results = mysqli_fetch_row($result);
		return $results[0];
	}	

	function ObtenerLogo()
	{
		$ser="localhost";
		$log="root";
		$pass="";
		$bd="medyvargas2000";
		$char = "utf8";	
		$dbc = mysqli_connect($ser,$log,$pass,$bd);
		$dbch = mysqli_set_charset($dbc,$char);	
			
		$strQuery = "SELECT urlLogo FROM imagenes WHERE idImagenes = 1";

		$result = mysqli_query($dbc,$strQuery);
		$results = mysqli_fetch_row($result);
		return $results[0];
	}

	function ObtenerFondoMarcaAgua()
	{
		$ser="localhost";
		$log="root";
		$pass="";
		$bd="medyvargas2000";
		$char = "utf8";	
		$dbc = mysqli_connect($ser,$log,$pass,$bd);
		$dbch = mysqli_set_charset($dbc,$char);	
			
		$strQuery = "SELECT urlFondoMarcaAgua FROM imagenes WHERE idImagenes = 1";

		$result = mysqli_query($dbc,$strQuery);
		$results = mysqli_fetch_row($result);
		return $results[0];
	}

	function ContarUsuario($login)
	{
		$ser="localhost";
		$log="root";
		$pass="";
		$bd="medyvargas2000";
		$char = "utf8";
		$dbc = mysqli_connect($ser,$log,$pass,$bd);
		$dbch = mysqli_set_charset($dbc,$char);
			
		if($login == '')
		{
			$login = 'NULL';
		}
		else
		{
			$login = "'".$login."'";	
		}
		
		$strQuery = "SELECT ";
		$strQuery .= "u.idUsuarios, ";
		$strQuery .= "u.cedulaUsuario, ";
		$strQuery .= "u.loginUsuario, ";
		$strQuery .= "u.nombreUsuario, ";
		$strQuery .= "u.apellidoUsuario, ";
		$strQuery .= "u.direccionUsuario, ";
		$strQuery .= "u.telefonoUsuario, ";
		$strQuery .= "u.correoUsuario, ";
		$strQuery .= "t.tipoUsuario, ";
		$strQuery .= "n.abrNacionalidad ";
		$strQuery .= "FROM ";
		$strQuery .= "usuarios u ";
		$strQuery .= "INNER JOIN ";
		$strQuery .= "tipoUsuario t ";
		$strQuery .= "ON ";
		$strQuery .= "t.idTipoUsuario = u.idTipoUsuario ";
		$strQuery .= "INNER JOIN ";
		$strQuery .= "nacionalidad n ";
		$strQuery .= "ON ";
		$strQuery .= "n.idNacionalidad = u.idNacionalidad ";
		$strQuery .= "WHERE ";
		$strQuery .= "u.loginUsuario = ".$login." ";
		$strQuery .= "AND u.fechaFin IS NULL;";		
		
		$result = mysqli_query($dbc,$strQuery);
		$numRows = mysqli_num_rows($result);
		return $numRows;	
	}

	function ConsultarUsuario($login)
	{
		$ser="localhost";
		$log="root";
		$pass="";
		$bd="medyvargas2000";
		$char = "utf8";
		$dbc = mysqli_connect($ser,$log,$pass,$bd);
		$dbch = mysqli_set_charset($dbc,$char);
			
		if($login == '')
		{
			$login = 'NULL';
		}
		else
		{
			$login = "'".$login."'";	
		}
		
		$strQuery = "SELECT ";
		$strQuery .= "u.idUsuarios, ";
		$strQuery .= "u.cedulaUsuario, ";
		$strQuery .= "u.loginUsuario, ";
		$strQuery .= "u.nombreUsuario, ";
		$strQuery .= "u.apellidoUsuario, ";
		$strQuery .= "u.direccionUsuario, ";
		$strQuery .= "u.telefonoUsuario, ";
		$strQuery .= "u.correoUsuario, ";
		$strQuery .= "t.tipoUsuario, ";
		$strQuery .= "n.abrNacionalidad, ";
		$strQuery .= "c.idClave, ";
		$strQuery .= "c.clave, ";
		$strQuery .= "c.habilitado ";
		$strQuery .= "FROM ";
		$strQuery .= "usuarios u ";
		$strQuery .= "INNER JOIN ";
		$strQuery .= "tipoUsuario t ";
		$strQuery .= "ON ";
		$strQuery .= "t.idTipoUsuario = u.idTipoUsuario ";
		$strQuery .= "INNER JOIN ";
		$strQuery .= "nacionalidad n ";
		$strQuery .= "ON ";
		$strQuery .= "n.idNacionalidad = u.idNacionalidad ";
		$strQuery .= "INNER JOIN ";
		$strQuery .= "clave c ";
		$strQuery .= "ON ";
		$strQuery .= "c.idUsuarios = u.idUsuarios ";		
		$strQuery .= "WHERE ";
		$strQuery .= "u.loginUsuario = ".$login." ";
		$strQuery .= "AND u.fechaFin IS NULL ";
		$strQuery .= "AND c.fechaFin IS NULL;";
		
		$result = mysqli_query($dbc,$strQuery);
		$results = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $results;		
	}

	function InsertarIntentos($idClave, $idUsuario)
	{
		$ser="localhost";
		$log="root";
		$pass="";
		$bd="medyvargas2000";
		$char = "utf8";
		$dbc = mysqli_connect($ser,$log,$pass,$bd);
		$dbch = mysqli_set_charset($dbc,$char);	
		
		$strQuery = "INSERT INTO contadorinitentos ";
		$strQuery .= "(fechaIntento, ";
		$strQuery .= "idClave, ";
		$strQuery .= "idUsuario) ";
		$strQuery .= "VALUES ";
		$strQuery .= "(NOW(), ";
		$strQuery .= $idClave.", ";
		$strQuery .= $idUsuario.");";
		
		$result = mysqli_query($dbc,$strQuery);
		$results = mysqli_affected_rows($dbc);
		return $results;
	}

	function ContarIntentos($idClave, $idUsuario)
	{
		$ser="localhost";
		$log="root";
		$pass="";
		$bd="medyvargas2000";
		$char = "utf8";
		$dbc = mysqli_connect($ser,$log,$pass,$bd);
		$dbch = mysqli_set_charset($dbc,$char);	
		
		$strQuery = "SELECT * FROM contadorinitentos ";
		$strQuery .= "WHERE idClave = ".$idClave." ";
		$strQuery .= "AND idUsuario = ".$idUsuario." ";
		$strQuery .= "AND fechaIntento >= (TIMESTAMP(NOW() - 1000));";
		
		$result = mysqli_query($dbc,$strQuery);
		$numRows = mysqli_num_rows($result);
		return $numRows;		
	}

	function DeshabilitarClave($idClave, $idUsuario)
	{
		$ser="localhost";
		$log="root";
		$pass="";
		$bd="medyvargas2000";
		$char = "utf8";
		$dbc = mysqli_connect($ser,$log,$pass,$bd);
		$dbch = mysqli_set_charset($dbc,$char);
		
		$strQuery = "UPDATE clave ";
		$strQuery .= "SET habilitado = FALSE ";
		$strQuery .= "WHERE idClave = ".$idClave." ";
		$strQuery .= "AND idUsuarios = ".$idUsuario." ";
		$strQuery .= "AND fechaFin IS NULL;";
		
//		echo $strQuery;
//		exit();
		
		$result = mysqli_query($dbc,$strQuery);
		$results = mysqli_affected_rows($dbc);
		return $results;		
	}

	function BorrarIntentos($idClave, $idUsuario)
	{
		$ser="localhost";
		$log="root";
		$pass="";
		$bd="medyvargas2000";
		$char = "utf8";
		$dbc = mysqli_connect($ser,$log,$pass,$bd);
		$dbch = mysqli_set_charset($dbc,$char);
		
		$strQuery = "DELETE FROM contadorinitentos ";
		$strQuery .= "WHERE idClave = ".$idClave." ";
		$strQuery .= "AND idUsuario = ".$idUsuario.";";		
		
		$result = mysqli_query($dbc,$strQuery);
		$results = mysqli_affected_rows($dbc);		
		return $results;		
	}

	function AgregarDivisa($divisa, $abrDivisa)
	{
		$ser="localhost";
		$log="root";
		$pass="";
		$bd="medyvargas2000";
		$char = "utf8";
		$dbc = mysqli_connect($ser,$log,$pass,$bd);
		$dbch = mysqli_set_charset($dbc,$char);

		if($divisa == '')
		{
			$divisa = 'NULL';
		}
		else
		{
			$divisa = "'".$divisa."'";	
		}		
		
		if($abrDivisa == '')
		{
			$abrDivisa = 'NULL';
		}
		else
		{
			$abrDivisa = "'".$abrDivisa."'";	
		}		
		
		$strQuery = "INSERT INTO divisa ";
		$strQuery .= "(divisa, ";
		$strQuery .= "abrDivisa) ";
		$strQuery .= "VALUES ";
		$strQuery .= "(".$divisa.", ";
		$strQuery .= $abrDivisa.");";
		
		$result = mysqli_query($dbc,$strQuery);
		$results = mysqli_affected_rows($dbc);		
		return $results;		
	}

?>