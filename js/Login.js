// JavaScript Document
$(document).ready(function(e){
	$('#ingresar').click(function(e){
		var loginUsuario, clave, url;
		loginUsuario = $('#loginUsuario').val();
		clave = $('#clave').val();
		url = "../Controlador/ValidarLogin.php";
		if(loginUsuario == '')
		{
			Alerta('Acceso al Sistema', 'El Usuario es requerido', 'times-circle');
			event.returnValue = false;
		}
		else if(clave == '')
		{
			Alerta('Acceso al Sistema', 'La Clave es requerida', 'times-circle');
			event.returnValue = false;
		}
		else if(clave.length < 4)
		{
			Alerta('Acceso al Sistema', 'la clave debe ser m&iacute;nima 4 caracteres', 'times-circle');
			event.returnValue = false;
		}
		else
		{
			$.ajax({
				url: url,
				type: "POST",
				data: {loginUsuario: loginUsuario, clave: clave},
				beforeSend: function(){
					$('#resultado').html("<img src='../img/5.gif' alt='Cargando' class='img-responsive'>");
				},
				success: function(output){
					$('#resultado').html(output);
				},
				error: function(xhr, ajaxOptions, thrownError){
					Alerta('Atencion', 'Error al cargar.', 'times-circle');
					$('#resultado').html("");
					event.returnValue = false;					
				}
			});
		}
	});
	
	$('#loginUsuario').blur(function(e){
		var login;
		login = $(this);
		if(login.val().length<1)
		{
			login.css('border-color', '#F00000');
			login.css('border-width', 'thin');
			login.css('box-shadow', '0 0 3px #F00000, 0 0 5px #F00000');
		}
		else
		{
			login.css('border-color', '');
			login.css('box-shadow', '');
		}	
	});

	$('#loginUsuario').focus(function(e){
		var login;
		login = $(this);
		login.css('border-color', '');
		login.css('box-shadow', '');
	});
	
	$('#clave').blur(function(e){
		var clave;
		clave = $(this);
		if(clave.val().length<1)
		{
			clave.css('border-color', '#F00000');
			clave.css('border-width', 'thin');
			clave.css('box-shadow', '0 0 3px #F00000, 0 0 5px #F00000');
		}
		else
		{
			clave.css('border-color', '');
			clave.css('box-shadow', '');
		}	
	});

	$('#clave').focus(function(e){
		var clave;
		clave = $(this);
		clave.css('border-color', '');
		clave.css('box-shadow', '');
	});	
});

function cerrar()
{
  $(location).attr('href','Login.php');
}