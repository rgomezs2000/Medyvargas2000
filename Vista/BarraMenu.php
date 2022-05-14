<?php
	require_once '../Modelo/Sesion.php';
	require_once '../Modelo/Funciones.php';
	require_once '../Modelo/Querys.php';
	require_once '../Modelo/Dias.php';
	require_once '../Modelo/Conexion.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="#">
		<img src="../img/<?=ObtenerLogo()?>" alt="LOGO MEDYVARGAS 2000, C.A." width="30" height="30" class="d-inline-block align-top img-fluid" />
	</a>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="navbar-nav">
			<?php
				$strQuery = "SELECT ";
				$strQuery .= "idMenu, ";
				$strQuery .= "menu, ";
				$strQuery .= "icono, ";									
				$strQuery .= "url ";
				$strQuery .= "FROM menu ";
				$strQuery .= "WHERE habilitado = TRUE;";
													
				$result = mysqli_query($dbc, $strQuery);			
									
				while($results = mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="<?=$results['url']?>" id="navbarDropdownMenuLink" data-toggle="dropdown"><i class="fa <?=$results['icono']?>"></i> <?=$results['menu']?></a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<?php
								$strQuery2 = "SELECT "; 
								$strQuery2 .= "idMenuHijo, ";
								$strQuery2 .= "menuHijo, ";
								$strQuery2 .= "url ";
								$strQuery2 .= "FROM menuhijo ";
								$strQuery2 .= "WHERE idMenu = ".$results['idMenu']." ";
								$strQuery2 .= "AND habilitado = TRUE ";
								$strQuery2 .= "ORDER BY menuHijo ASC;";

								$result2 = mysqli_query($dbc, $strQuery2);

								while($results2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))
								{
									?>
										<a class="dropdown-item" href="javascript:fIrA('<?=$results2['url']?>')"><i class="fa <?=$results['icono']?>"></i> <?=$results2['menuHijo']?></a>
									<?php
								}
								mysqli_free_result($result2);
							?>
							</div>
						</li>											
					<?php
				}
				mysqli_free_result($result);
			?>
	  </ul>
		<ul class="navbar-nav ml-md-auto">
			<li class="nav-item">
			  <a class="nav-link" href="javascript:fIrA('../Controlador/Logout.php')"><i class="fa fa-times"></i> Salir</a>
			</li>
		</ul>
	</div>
</nav>