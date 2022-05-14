<?php
	session_start();
    require_once '../Modelo/SesionInicial.php';
    require_once '../Modelo/Funciones.php';
	require_once '../Modelo/Querys.php';

    if(isset($_REQUEST['error']))
    {
        $error = $_REQUEST['error'];
    }
    else
    {
        $error = '';
    }

    if(isset($_REQUEST['msj']))
    {
        $msj = $_REQUEST['msj'];
    }
    else
    {
        $msj = '';
    }
?>
<!doctype html>
<html lang="es">
	<head>
		<?php include("Tags.php"); ?>
		<script src="../js/Login.js" language="javascript"></script>
	</head>
	<body>
		<div class="container-fluid">
			<header>
				<div class="row">
					<div class="col text-center">
						<img class="img-fluid" alt="MEDYVARGAS 2000, C.A." src="../img/<?=ObtenerImagenCabecera()?>" />
					</div>
				</div>
			</header>
			<main class="marca_agua principal_2">
				<div class="row">
					<div class="offset-3 col-6 offset-3">
						<div class="row">
							<div class="col text-center">
								<h3 class="">ACCESO AL SISTEMA</h3>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label for="loginUsuario">Usuario:</label>
									<input type="text" class="form-control" name="loginUsuario" id="loginUsuario" placeholder="Usuario" />
									<label for="clave">Contraseña:</label>
									<input type="password" class="form-control" name="clave" id="clave" placeholder="Clave" maxlength="16" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col text-center">
								<div class="row">
									<div class="col-6">
										<button type="button" class="btn btn-success btn-block" name="ingresar" id="ingresar"><i class="fa fa-key"></i> Ingresar</button>
									</div>
									<div class="col-6">
										<button type="button" class="btn btn-danger btn-block" name="salir" id="salir" onClick="cerrar();"><i class="fa fa-times"></i> Salir</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col text-center">
						<div id="resultado"></div>
					</div>
				</div>
				<?php
					if($error == 100)
					{
						MostrarAlerta('Acceso al sistema', 'Su sesión fue expirada. Favor, ingresar nuevamente.', 'info-circle');
					}
				?>								
			</main>
			<?php include("Footer.php"); ?>		
		</div>
	</body>
</html>