function verificar_alta_periodista() {

	var resultado = true;

	if (document.formulario.nombre.value == "") {
		document.getElementById("nombre_msg").innerHTML = "-> Por favor ingrese el nombre";
		resultado = false;
	} else

	if (document.formulario.nombre.value.length >= 50) {
		document.getElementById("nombre_msg").innerHTML = "-> El nombre debe tener menos de 50 caracteres";
		resultado = false;
	} else {
		document.getElementById("nombre_msg").innerHTML = "";
	}

	if (document.formulario.usuario.value == "") {
		document.getElementById("usuario_msg").innerHTML = "-> Por favor ingrese un nombre de usuario";
		resultado = false;
	} else if (document.formulario.usuario.value.length >= 20) {
		document.getElementById("usuario_msg").innerHTML = "-> El usuario debe tener menos de 20 caracteres";
		resultado = false;
	} else {
		document.getElementById("usuario_msg").innerHTML = "";
	}

	if (document.formulario.password.value == "") {
		document.getElementById("password_msg").innerHTML = "-> Por favor ingrese una password";
		resultado = false;
	} else if (document.formulario.password.value.length < 6) {
		document.getElementById("password_msg").innerHTML = "-> El password debe tener al menos 6 caracteres";
		resultado = false;
	} else if (document.formulario.password.value.length >= 20) {
		document.getElementById("password_msg").innerHTML = "-> El password debe tener menos de 20 caracteres";
		resultado = false;
	} else {
		document.getElementById("password_msg").innerHTML = "";
	}

	if (document.formulario.password.value != document.formulario.password2.value) {
		document.getElementById("password2_msg").innerHTML = "-> La password y la verificaci&oacute;n no coinciden";
		resultado = false;
	} else {
		document.getElementById("password2_msg").innerHTML = "";
	}

	return resultado;

}
					
function verificar_nuevas_noticias(){

                    var resultado=true;

                    
                    if (document.formulario.titulo.value=="") {
                    document.getElementById("titulo_msg").innerHTML="-> Por favor ingrese el Titulo de la Noticia";
                    resultado=false;
                    } else

                    if (document.formulario.titulo.value.length>=150) {
                    document.getElementById("titulo_msg").innerHTML="-> El titulo debe tener menos de 150 caracteres";
                    resultado=false;
                    }  
                    else document.getElementById("titulo_msg").innerHTML="";
                   
                    if (document.formulario.texto.value=="") {
                    document.getElementById("texto_msg").innerHTML="-> Por favor ingrese el cuerpo de la Noticia";
                    resultado=false;
                    } 
                    else document.getElementById("texto_msg").innerHTML="";
                   
                   
                    return resultado;   
}

function verificar_alta_comentario() {

	var resultado = true;

	if (document.formulario.comentario.value == "") {
		document.getElementById("comentario_msg").innerHTML = "-> Debe completar el comentario";
		resultado = false;
	}

	return resultado;
}