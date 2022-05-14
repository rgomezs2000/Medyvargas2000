<?php
	function obtenerFechaActual(){
		$fecha=time();
		$dia=date("w",$fecha);
		switch($dia){
			case 0:
				$dia="Domingo";
				break;
			case 1:
				$dia="Lunes";
				break;
			case 2:
				$dia="Martes";
				break;
			case 3:
				$dia="Miercoles";
				break;
			case 4:
				$dia="Jueves";
				break;
			case 5:
				$dia="Viernes";
				break;
			case 6:
				$dia="Sabado";
				break;
			default:
				$dia="Invalido";
				break;
		}
		$mes = date("m",$fecha);
		switch($mes)
		{
			case 1:
				$mes = "Enero";
				break;
			case 2:
				$mes = "Febrero";
				break;
			case 3:
				$mes = "Marzo";
				break;
			case 4:
				$mes = "Abril";
				break;
			case 5:
				$mes = "Mayo";
				break;
			case 6:
				$mes = "Junio";
				break;
			case 7:
				$mes = "Julio";
				break;
			case 8:
				$mes = "Agosto";
				break;
			case 9:
				$mes = "Septiembre";
				break;
			case 10:
				$mes = "Octubre";
				break;
			case 11:
				$mes = "Noviembre";
				break;
			case 12:
				$mes = "Diciembre";
				break;
			default:
				$mes = "Invalido";
				break;
		}
		
		$fecha = $dia.', '.date("d",$fecha).' de '.$mes.' de '.date("Y",$fecha)." ".date("H:i:s A",$fecha);
		return $fecha;
	}

	function obtenerFechaPlanilla(){
		$fecha=time();
		$fecha = date ( "d/m/Y" , $fecha);
		return $fecha;
	}

	function obtenerFecha(){
		$fecha=time();
		$fecha = date ( "Y-m-d" , $fecha);
		return $fecha;
	}

	function obtenerFechaVencimiento($modo,$valor,$fecha_inicio=false){
	   if($fecha_inicio!=false)
	   {
			  $fecha_base = strtotime($fecha_inicio);
	   }
	   else
	   {
			  $time=time();
			  $fecha_actual=date("d/m/Y",$time);
			  $fecha_base=strtotime($fecha_actual);
	   }
	 $calculo = strtotime("$valor $modo","$fecha_base");
	 return date("d/m/Y", $calculo);
	}
	
	function obtenerFechaReporte(){
		$fecha=time();
		$fecha = date("dmyHis",$fecha);
		return $fecha;
	}

	function obtenerRangoSemana()
	{
		$anio=date('Y',time());
		$mes=date('m',time());
		$dia=date('d',time());
		 		 
		$diaSemana=date("w",mktime(0,0,0,$mes,$dia,$anio));
		 
		if($diaSemana==0)
		{
			$diaSemana=7;
		}
		
		$primerDia=date("d-m-Y",mktime(0,0,0,$mes,$dia-$diaSemana+1,$anio));
		$ultimoDia=date("d-m-Y",mktime(0,0,0,$mes,$dia+(7-$diaSemana),$anio));
		$rangoSemana = "del ".$primerDia." al ".$ultimoDia; 
		
		return $rangoSemana;
	}
	
	function obtenerMes()
	{
		$fecha = time();
		$mes = date("m",$fecha);
		switch($mes)
		{
			case 1:
				$mes = "Enero";
				break;
			case 2:
				$mes = "Febrero";
				break;
			case 3:
				$mes = "Marzo";
				break;
			case 4:
				$mes = "Abril";
				break;
			case 5:
				$mes = "Mayo";
				break;
			case 6:
				$mes = "Junio";
				break;
			case 7:
				$mes = "Julio";
				break;
			case 8:
				$mes = "Agosto";
				break;
			case 9:
				$mes = "Septiembre";
				break;
			case 10:
				$mes = "Octubre";
				break;
			case 11:
				$mes = "Noviembre";
				break;
			case 12:
				$mes = "Diciembre";
				break;
			default:
				$mes = "Invalido";
				break;
		}		
		return $mes;		
	}
	
	function obtenerAnio()
	{
		$fecha = time();
		$anio = date("Y",$fecha);
		return $anio;
	}
?>