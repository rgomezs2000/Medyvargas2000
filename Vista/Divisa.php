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
		<script src="../js/Divisa.js" language="javascript"></script>
	</head>

	<body>		
		<div class="container-fluid">
			<?php include("Header.php"); ?>
			<main class="marca_agua_2">
				<div class="row">
					<div class="col">
						<div class="row">
							<div class="col text-center">
								<h3>PARAMETRIZACI&Oacute;N</h3>
								<h5>DIVISAS</h5>
							</div>
						</div>
						<div class="row">
							<div class="col text-center">
								<div class="row">
									<div class="col text-center">
								  		<div class="row">
								  			<div class="offset-2 col-8 offset-2">
											<?php
												$strQuery = "SELECT * FROM divisa";
												$result = mysqli_query($dbc, $strQuery);
												$numRows = mysqli_num_rows($result);
											?>
											<input type="hidden" name="total" id="total" value="<?=$numRows?>" />								
											<table class="table table-striped table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0" id="tdivisa">
											  <thead>
												<tr>
													<th>Nº</th>
													<th>Nombre</th>
													<th>C&oacute;digo</th>
													<th>Modificar</th>
													<th>Eliminar</th>
												</tr>
											  </thead>
											  <tbody>
												<?php
													while($results = mysqli_fetch_array($result, MYSQLI_ASSOC)){
												?>
												<tr>
													<td><?=$results['idDivisa']?></td>
													<td><?=$results['divisa']?></td>
													<td><?=$results['abrDivisa']?></td>
													<td><button class="btn btn-primary" name="modificar<?=$results['idDivisa']?>" id="modificar<?=$results['idDivisa']?>" value="<?=$results['idDivisa']?>"><i class="fa fa-pencil-alt"></i></button></td>
													<td><div class="form-check"><input type="checkbox" class="form-check-input" id="EliminarDivisa<?=$results['idDivisa']?>" value="<?=$results['idDivisa']?>" /></div></td>
												</tr>
												<?php
												  }
												?>
											  </tbody>
											  <tfoot>
												<tr>
													<th>Nº</th>
													<th>Nombre</th>
													<th>C&oacute;digo</th>
													<th>Modificar</th>
													<th>Eliminar</th>
												</tr>
											  </tfoot>
											</table>
											<?php
												mysqli_free_result($result);										
											?>								  				
								  			</div>
								  		</div>
									</div>
								</div>
								<div class="row">
									<div class="offset-2 col-8 offset-2 text-center">
										<div class="row">
											<div class="col-3">
												<button class="btn btn-success btn-block" name="agregar" id="agregar"><i class="fa fa-paper-plane"></i> Agregar</button>
											</div>
											<div class="col-3">
												<button class="btn btn-primary btn-block" name="cargaMasiva" id="cargaMasiva"><i class="fa fa-list"></i> Carga Masiva</button>
											</div>
											<div class="col-3">
												<button class="btn btn-secondary btn-block" name="eliminar" id="eliminar"><i class="fa fa-times"></i> Eliminar</button>
											</div>
											<div class="col-3">
												<button class="btn btn-danger btn-block" name="atras" id="regresar"><i class="fa fa-backward"></i> Regresar</button>
											</div>
										</div>
									</div>
								</div>
							</div>
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