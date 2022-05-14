// JavaScript Document
$(document).ready(function(e){
	var cont, i;
	cont = $('#total').val();
	
	$('#tdivisa').DataTable();
	
	$('#agregar').click(function(e){
		bootbox.dialog({
			title: 'Agregar Divisa',
			message: '<h5>Agregar Divisa</h5><div class="form-group"><label for="divisa">Nombre:</label><input type="text" class="form-control" id="divisa" name="divisa" placeholder="Nombre"><label for="abrDivisa">Código:</label><input type="text" class="form-control" id="abrDivisa" name="abrDivisa" placeholder="C&oacute;digo"></div>',
			buttons: {
				accept: {
					label: 'Aceptar',
					className: 'btn-success',
					callback: function(){
						var divisa, abrDivisa, url;
						divisa = $('#divisa').val();
						abrDivisa = $('#abrDivisa').val();
						url = "../Controlador/AgregarDivisa.php";
						if(divisa == '')
						{
							Alerta('Atencion', 'El nombre de la divisa es requerido.', 'times-circle');
							event.returnValue = false;
						}
						else if(abrDivisa == '')
						{
							Alerta('Atencion', 'El código de la divisa es requerido.', 'times-circle');
							event.returnValue = false;
						}
						else if(abrDivisa.length != 4)
						{
							Alerta('Atencion', 'El código de la divisa debe ser de 4 caracteres.', 'times-circle');
							event.returnValue = false;
						}
						else
						{
							$.ajax({
								url: url,
								type: "POST",
								data: {divisa: divisa, abrDivisa: abrDivisa},
								beforeSend: function(){
									$('#resultado').html("<img src='../img/5.gif' alt='Cargando' class='img-responsive'>");
								},
								success: function(output){
									$('#resultado').html(output);
									window.location.reload();									
								},
								error: function(xhr, ajaxOptions, thrownError){
									Alerta('Atencion', 'Error al cargar.', 'times-circle');
									$('#resultado').html("");
									event.returnValue = false;
								}
							});
						}
					}
				},
				cancel: {
					label: 'Cancelar',
					className: 'btn-danger'
				}
			}
		});
	});
	
	for(i = 1; i <= cont; i++)
	{
		$('#modificar' + i).click(function(e){
			bootbox.dialog({
				title: 'Modificar Divisa',
				message: '<h5>Modificar Divisa</h5><div class="form-group"><label for="divisa">Nombre:</label><input type="text" class="form-control" id="divisa" name="divisa" placeholder="Nombre"><label for="abrDivisa">Código:</label><input type="text" class="form-control" id="abrDivisa" name="abrDivisa" placeholder="C&oacute;digo"></div>',
				buttons: {
					accept: {
						label: 'Aceptar',
						className: 'btn-success',
						callback: function(){
							var divisa, abrDivisa, url;
							divisa = $('#divisa').val();
							abrDivisa = $('#abrDivisa').val();
							url = "../Controlador/AgregarDivisa.php";
							if(divisa == '')
							{
								Alerta('Atencion', 'El nombre de la divisa es requerido.', 'times-circle');
								event.returnValue = false;
							}
							else if(abrDivisa == '')
							{
								Alerta('Atencion', 'El código de la divisa es requerido.', 'times-circle');
								event.returnValue = false;
							}
							else if(abrDivisa.length != 4)
							{
								Alerta('Atencion', 'El código de la divisa debe ser de 4 caracteres.', 'times-circle');
								event.returnValue = false;
							}
							else
							{
								$.ajax({
									url: url,
									type: "POST",
									data: {divisa: divisa, abrDivisa: abrDivisa},
									beforeSend: function(){
										$('#resultado').html("<img src='../img/5.gif' alt='Cargando' class='img-responsive'>");
									},
									success: function(output){
										$('#resultado').html(output);
										window.location.reload();									
									},
									error: function(xhr, ajaxOptions, thrownError){
										Alerta('Atencion', 'Error al cargar.', 'times-circle');
										$('#resultado').html("");
										event.returnValue = false;
									}
								});
							}
						}
					},
					cancel: {
						label: 'Cancelar',
						className: 'btn-danger'
					}
				}
			});		
	}
	
	});	
	
	
});
