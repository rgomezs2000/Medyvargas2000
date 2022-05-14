<?php
	require_once '../Modelo/Sesion.php';
	require_once '../Modelo/Funciones.php';
	require_once '../Modelo/Querys.php';
	require_once '../Modelo/Dias.php';
	require_once '../Modelo/Conexion.php';
?>
<header>
	<div class="row">
		<div class="col">
			<div class="row">
				<div class="col text-center">
					<img class="img-fluid" alt="MEDYVARGAS 2000, C.A." src="../img/<?=ObtenerImagenCabecera()?>" />
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="row">
						<div class="col text-center">
							<h1>SISTEMA ADMINISTRATIVO MEDYVARGAS 2000, C.A.</h1>
						</div>
					</div>
					<div class="row">
						<div class="col-6 text-left">
							<span class="label label-primary">Bienvenido: <?=$_SESSION['Usuario']['Nombre']?> <?=$_SESSION['Usuario']['Apellido']?> (<?=$_SESSION['Usuario']['Login']?>)</span>
						</div>
						<div class="col-6 text-right">
							<span class="label label-primary"><?=obtenerFechaActual()?></?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php include("BarraMenu.php"); ?>
		</div>
	</div>
</header>