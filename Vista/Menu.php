<?php
	require_once '../Modelo/Sesion.php';
	require_once '../Modelo/Funciones.php';
	require_once '../Modelo/Querys.php';
	require_once '../Modelo/Dias.php';
	require_once '../Modelo/Conexion.php';
?>
<!doctype html>
<html>
	<head>
		<?php include("Tags.php"); ?>
	</head>

	<body>		
		<div class="container-fluid">
			<?php include("Header.php"); ?>
			<main class="marca_agua_2 principal">
				<div class="row">
					<div class="col">
						<div class="row">
							<div class="col text-center">
								<h3>MEN&Uacute; PRINCIPAL</h3>
							</div>
						</div>
						<div class="row">
							<div class="col">&nbsp;</div>
						</div>
						<div class="row">
							<div class="col text-center" id="resultado"></div>
						</div>
					</div>
				</div>			
			</main>
			<?php include("Footer.php"); ?>
		</div>	
	</body>
</html>