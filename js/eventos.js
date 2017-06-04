var inicioApp = function(){
	var entrar=function(){
		var usuario = $("#txtUsuario").val();
		var clave   = $("#txtClave").val();
		var parametros="opcion=entrar"+
					   "&usuario="+usuario+
					   "&clave="+clave+
					   "&id="+Math.random();
		validaEntrada = $.ajax({
			method:"POST",
			url:"php/valida.php",
			data:parametros,
			dataType:"json"
		});	
		validaEntrada.done(function(data){
			alert(data.respuesta)
		});
		validaEntrada.fail(function( jqXHR, textStatus ) {
			alert( "Request failed: " + textStatus );
		});
	}
	$("#btnEntrar").on("click",entrar);
}
$(document).ready(inicioApp);