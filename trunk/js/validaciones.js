function verificar_alta_periodista ()
					{
				
					
					var resultado=true;
					
					var filter1=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					
					
					if (document.formulario.nombre.value=="") {
					document.getElementById("nombre_msg").innerHTML="-> Por favor ingrese el nombre";
					resultado=false;
					} else 
					
					if (document.formulario.nombre.value.length>=50) {
					document.getElementById("nombre_msg").innerHTML="-> El nombre debe tener menos de 50 caracteres";
					resultado=false;
					} else document.getElementById("nombre_msg").innerHTML="";
					
					if (document.formulario.usuario.value=="") {
					document.getElementById("usuario_msg").innerHTML="-> Por favor ingrese un nombre de usuario";
					resultado=false;
					} else 
					
					if (document.formulario.usuario.value.length>=20) {
					document.getElementById("usuario_msg").innerHTML="-> El usuario debe tener menos de 20 caracteres";
					resultado=false;
					} else document.getElementById("usuario_msg").innerHTML="";
					
					
					if (document.formulario.password.value=="") {
					document.getElementById("password_msg").innerHTML="-> Por favor ingrese una password";
					resultado=false;
					} else
					
					if (document.formulario.password.value.length<6) {
					document.getElementById("password_msg").innerHTML="-> La password debe tener al menos 6 caracteres";
					resultado=false;
					} else 
					
					if (document.formulario.password.value.length>=20) {
					document.getElementById("password_msg").innerHTML="-> La password debe tener menos de 20 caracteres";
					resultado=false;
					} else document.getElementById("password_msg").innerHTML="";
					
					if (document.formulario.password.value!=document.formulario.password2.value) {
					document.getElementById("password2_msg").innerHTML="-> La password y la verificaci&oacute;n no coinciden";
					resultado=false;
					} else document.getElementById("password2_msg").innerHTML="";
					
					
					return resultado;					
					
}
					
function verificar_nuevas_noticias(){

                    var resultado=true;

                    if (document.formulario.autor.value=="") {
                    document.getElementById("autor").innerHTML="-> Por favor ingrese el Autor de la Noticia";
                    resultado=false;
                    } else

                    if (document.formulario.autor.value.length>=250) {
                    document.getElementById("autor").innerHTML="-> El Autor debe tener menos de 250 caracteres";
                    resultado=false;
                    } else document.getElementById("autor").innerHTML="";

                    if (document.formulario.titulo.value=="") {
                    document.getElementById("titulo").innerHTML="-> Por favor ingrese el Titulo de la Noticia";
                    resultado=false;
                    } else

                    if (document.formulario.titulo.value.length>=250) {
                    document.getElementById("titulo").innerHTML="-> El nombre debe tener menos de 250 caracteres";
                    resultado=false;
                    } else document.getElementById("titulo").innerHTML="";
                   
                    if (document.formulario.texto.value=="") {
                    document.getElementById("texto").innerHTML="-> Por favor ingrese el cuerpo de la Noticia";
                    resultado=false;
                    } else document.getElementById("texto").innerHTML="";
                   
                    return resultado;   
}