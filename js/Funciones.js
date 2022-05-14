// JavaScript 
function Alerta(titulo, texto, tipo)
{
	var colorIcono = "";
	switch(tipo)
	{
		case "times-circle":
			colorIcono = "FF0000";
			break;
		case "info-circle":
			colorIcono = "3474CA";
			break;
		case "check-circle":
			colorIcono = "22AC66";
			break;
	}
	bootbox.alert({
		title: titulo,
		message: '<i class="fa fa-'+ tipo +'" style="float:left; margin:0 20px 20px 0; color:#'+ colorIcono +'; font-size:4em;"></i> ' + texto,
		buttons: {
			ok: {
				label: 'Aceptar'
			}
		}
	});
}