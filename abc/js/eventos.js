var iniciaApp = function(){
	//alert("Hola App");
	var entrar=function(){
		var usuario = $("#txtUsuario").val();
		var clave   = $("#txtClave").val();
		var parametros="opcion=valida"+
					   "&usuario="+usuario+
					   "&clave="+clave+
					   "&id="+Math.random();
		var validaEntrada = $.ajax({
			method:"POST",
			url:"php/datos.php",
			data:parametros,
			dataType:"json"
		});	
		validaEntrada.done(function(data){
			//alert(data.respuesta);
			if(data.respuesta==true){
				$("#datosUsuario").hide();
				$("nav").show("slow");
			}else{
				alert("Usuario no válido");
			}
		});
		validaEntrada.fail(function(jqError,textStatus){
			alert("Solicitud fallida: "+textStatus);
		});
	}
	var teclaUsuario=function(tecla){
		if(tecla.which==13){
			$("#txtClave").focus();
		}
	}
	var teclaClave=function(tecla){
		if(tecla.which==13){
			entrar();
		}
	}
	//Sección de declaración de eventos
	$("#btnEntrar").on("click",entrar);
	$("#txtUsuario").on("keypress",teclaUsuario);
	$("#txtClave").on("keypress",teclaClave);
}
$(document).ready(iniciaApp);





