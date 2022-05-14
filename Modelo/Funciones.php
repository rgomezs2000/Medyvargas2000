<?php
	function MostrarAlerta($titulo, $msj, $tipo)
	{
		$mensaje = "<script language='javascript'>Alerta('".$titulo."', '".$msj."', '".$tipo."');</script>";
		echo $mensaje;
	}
	function Direccionar($pagina)
	{
		$mensaje = "<script language='javascript'>$(location).attr('href','".$pagina."');</script>";
		echo $mensaje;
	}
	function ObtenerXVEUSD()
	{
		$url = 'https://api.bitcoinvenezuela.com';
		$json = file_get_contents($url);
		$data = json_decode($json, true);
		$valor = $data['exchange_rates']['XVE_USD'];
		$valor = ($valor / 100000);
		$valor = round($valor,2);
		$valor = sprintf('%0.2f', $valor);
		return $valor;		
	}
?>