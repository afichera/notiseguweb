function verificar_alta_cliente ()
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
					
					if (document.formulario.apellido.value=="") {
					document.getElementById("apellido_msg").innerHTML="-> Por favor ingrese el apellido";
					resultado=false;
					} else
					
					if (document.formulario.apellido.value.length>=50) {
					document.getElementById("apellido_msg").innerHTML="-> El apellido debe tener menos de 50 caracteres";
					resultado=false;
					} else document.getElementById("apellido_msg").innerHTML="";
					
					if (document.formulario.razon_social.value=="") {
					document.getElementById("razon_msg").innerHTML="-> Por favor ingrese la raz&oacute;n social";
					resultado=false;
					} else
					
					if (document.formulario.razon_social.value.length>=100) {
					document.getElementById("razon_msg").innerHTML="-> La raz&oacute;n social debe tener menos de 100 caracteres";
					resultado=false;
					} else document.getElementById("razon_msg").innerHTML="";
					
					
					if (document.formulario.nro_doc.value=="") {
					document.getElementById("nro_doc_msg").innerHTML="-> Por favor ingrese el n&uacute;mero";
					resultado=false;
					} else 
					
					if (isNaN(document.formulario.nro_doc.value)) {
					document.getElementById("nro_doc_msg").innerHTML="-> Este campo s&oacute;lo admite n&uacute;meros";
					resultado=false;
					} else 
					
					
					if (document.formulario.nro_doc.value.length>=20) {
					document.getElementById("nro_doc_msg").innerHTML="-> El n&uacute;mero debe tener menos de 20 cifras";
					resultado=false;
					} else document.getElementById("nro_doc_msg").innerHTML="";
					
					if (document.formulario.palabra_clave.value=="") {
					document.getElementById("palabra_msg").innerHTML="-> Por favor ingrese una palabra clave";
					resultado=false;
					} else 
					
					if (document.formulario.palabra_clave.value.length>=50) {
					document.getElementById("palabra_msg").innerHTML="-> La palabra clave debe tener menos de 50 caracteres";
					resultado=false;
					} else document.getElementById("palabra_msg").innerHTML="";
					
					if (document.formulario.calle.value=="") {
					document.getElementById("calle_msg").innerHTML="-> Por favor ingrese la calle";
					resultado=false;
					} else
					
					if (document.formulario.calle.value.length>=100) {
					document.getElementById("calle_msg").innerHTML="-> La calle debe tener menos de 100 caracteres";
					resultado=false;
					} else document.getElementById("calle_msg").innerHTML="";
					
					if (document.formulario.numero.value=="") {
					document.getElementById("numero_msg").innerHTML="-> Por favor ingrese el n&uacute;mero";
					resultado=false;
					} else
					
					if (isNaN(document.formulario.numero.value)) {
					document.getElementById("numero_msg").innerHTML="-> Este campo s&oacute;lo admite n&uacute;meros";
					resultado=false;
					} else 
					
					
					if (document.formulario.numero.value.length>=11) {
					document.getElementById("numero_msg").innerHTML="-> El n&uacute;mero debe tener menos de 11 cifras";
					resultado=false;
					} else document.getElementById("numero_msg").innerHTML="";
					
					if (document.formulario.provincia.value==0) {
					document.getElementById("provincia_msg").innerHTML="-> Por favor ingrese la provincia";
					resultado=false;
					} else document.getElementById("provincia_msg").innerHTML="";
					
					if (document.formulario.departamento.value==0) {
					document.getElementById("departamento_msg").innerHTML="-> Por favor ingrese el departamento";
					resultado=false;
					} else document.getElementById("departamento_msg").innerHTML="";
					
					if (document.formulario.localidad.value==0) {
					document.getElementById("localidad_msg").innerHTML="-> Por favor ingrese la localidad";
					resultado=false;
					} else document.getElementById("departamento_msg").innerHTML="";
					
					if (document.formulario.cod_post.value.length!=4) {
					document.getElementById("codigo_msg").innerHTML="-> El c&oacute;digo debe tener 4 cifras";
					resultado=false;
					} else
							
					if (isNaN(document.formulario.cod_post.value)) {
					document.getElementById("codigo_msg").innerHTML="-> Este campo s&oacute;lo admite n&uacute;meros";
					resultado=false;
					} else document.getElementById("codigo_msg").innerHTML="";
					
					if(document.formulario.email.value=="") {
					document.getElementById("email_msg").innerHTML="-> Por favor ingrese un e-mail";
					resultado=false;}
					else
					if (!filter1.test(document.formulario.email.value)) {
					
					document.getElementById("email_msg").innerHTML="-> El mail ingresado no pudo ser reconocido como v&aacute;lido";
					resultado=false;
					} else 
					
					if (document.formulario.email.value.length>=100) {
					document.getElementById("email_msg").innerHTML="-> El mail debe tener menos de 100 caracteres";
					resultado=false;
					} else document.getElementById("email_msg").innerHTML="";
					
					if (document.formulario.telefono_1.value=="") {
					document.getElementById("telefono1_msg").innerHTML="-> Por favor ingrese un telefono";
					resultado=false;
					} else
					
					if (document.formulario.telefono_1.value.length>=20) {
					document.getElementById("telefono1_msg").innerHTML="-> La n&uacute;mero debe tener menos de 20 caracteres";
					resultado=false;
					} else document.getElementById("telefono1_msg").innerHTML="";
					
					if (document.formulario.telefono_2.value.length>=20) {
					document.getElementById("telefono2_msg").innerHTML="-> La n&uacute;mero debe tener menos de 20 caracteres";
					resultado=false;
					} else document.getElementById("telefono2_msg").innerHTML="";
					
					if (document.formulario.telefono_3.value.length>=20) {
					document.getElementById("telefono3_msg").innerHTML="-> La n&uacute;mero debe tener menos de 20 caracteres";
					resultado=false;
					} else document.getElementById("telefono3_msg").innerHTML="";
					
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
					
					
function verificar_modificacion_cliente ()
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
					
					if (document.formulario.apellido.value=="") {
					document.getElementById("apellido_msg").innerHTML="-> Por favor ingrese el apellido";
					resultado=false;
					} else
					
					if (document.formulario.apellido.value.length>=50) {
					document.getElementById("apellido_msg").innerHTML="-> El apellido debe tener menos de 50 caracteres";
					resultado=false;
					} else document.getElementById("apellido_msg").innerHTML="";
					
					if (document.formulario.razon_social.value=="") {
					document.getElementById("razon_msg").innerHTML="-> Por favor ingrese la raz&oacute;n social";
					resultado=false;
					} else
					
					if (document.formulario.razon_social.value.length>=100) {
					document.getElementById("razon_msg").innerHTML="-> La raz&oacute;n social debe tener menos de 100 caracteres";
					resultado=false;
					} else document.getElementById("razon_msg").innerHTML="";
					
					
					if (document.formulario.nro_doc.value=="") {
					document.getElementById("nro_doc_msg").innerHTML="-> Por favor ingrese el n&uacute;mero";
					resultado=false;
					} else 
					
					if (isNaN(document.formulario.nro_doc.value)) {
					document.getElementById("nro_doc_msg").innerHTML="-> Este campo s&oacute;lo admite n&uacute;meros";
					resultado=false;
					} else 
					
					
					if (document.formulario.nro_doc.value.length>=20) {
					document.getElementById("nro_doc_msg").innerHTML="-> El n&uacute;mero debe tener menos de 20 cifras";
					resultado=false;
					} else document.getElementById("nro_doc_msg").innerHTML="";
					
					if (document.formulario.palabra_clave.value=="") {
					document.getElementById("palabra_msg").innerHTML="-> Por favor ingrese una palabra clave";
					resultado=false;
					} else 
					
					if (document.formulario.palabra_clave.value.length>=50) {
					document.getElementById("palabra_msg").innerHTML="-> La palabra clave debe tener menos de 50 caracteres";
					resultado=false;
					} else document.getElementById("palabra_msg").innerHTML="";
					
					if (document.formulario.calle.value=="") {
					document.getElementById("calle_msg").innerHTML="-> Por favor ingrese la calle";
					resultado=false;
					} else
					
					if (document.formulario.calle.value.length>=100) {
					document.getElementById("calle_msg").innerHTML="-> La calle debe tener menos de 100 caracteres";
					resultado=false;
					} else document.getElementById("calle_msg").innerHTML="";
					
					if (document.formulario.numero.value=="") {
					document.getElementById("numero_msg").innerHTML="-> Por favor ingrese el n&uacute;mero";
					resultado=false;
					} else
					
					if (isNaN(document.formulario.numero.value)) {
					document.getElementById("numero_msg").innerHTML="-> Este campo s&oacute;lo admite n&uacute;meros";
					resultado=false;
					} else 
					
					
					if (document.formulario.numero.value.length>=11) {
					document.getElementById("numero_msg").innerHTML="-> El n&uacute;mero debe tener menos de 11 cifras";
					resultado=false;
					} else document.getElementById("numero_msg").innerHTML="";
					
					if (document.formulario.provincia.value==0) {
					document.getElementById("provincia_msg").innerHTML="-> Por favor ingrese la provincia";
					resultado=false;
					} else document.getElementById("provincia_msg").innerHTML="";
					
					if (document.formulario.departamento.value==0) {
					document.getElementById("departamento_msg").innerHTML="-> Por favor ingrese el departamento";
					resultado=false;
					} else document.getElementById("departamento_msg").innerHTML="";
					
					if (document.formulario.localidad.value==0) {
					document.getElementById("localidad_msg").innerHTML="-> Por favor ingrese la localidad";
					resultado=false;
					} else document.getElementById("departamento_msg").innerHTML="";
					
					if (document.formulario.cod_post.value.length!=4) {
					document.getElementById("codigo_msg").innerHTML="-> El c&oacute;digo debe tener 4 cifras";
					resultado=false;
					} else
							
					if (isNaN(document.formulario.cod_post.value)) {
					document.getElementById("codigo_msg").innerHTML="-> Este campo s&oacute;lo admite n&uacute;meros";
					resultado=false;
					} else document.getElementById("codigo_msg").innerHTML="";
					
					if(document.formulario.email.value=="") {
					document.getElementById("email_msg").innerHTML="-> Por favor ingrese un e-mail";
					resultado=false;}
					else
					if (!filter1.test(document.formulario.email.value)) {
					
					document.getElementById("email_msg").innerHTML="-> El mail ingresado no pudo ser reconocido como v&aacute;lido";
					resultado=false;
					} else 
					
					if (document.formulario.email.value.length>=100) {
					document.getElementById("email_msg").innerHTML="-> El mail debe tener menos de 100 caracteres";
					resultado=false;
					} else document.getElementById("email_msg").innerHTML="";
					
					if (document.formulario.telefono_1.value=="") {
					document.getElementById("telefono1_msg").innerHTML="-> Por favor ingrese un telefono";
					resultado=false;
					} else
					
					if (document.formulario.telefono_1.value.length>=20) {
					document.getElementById("telefono1_msg").innerHTML="-> La n&uacute;mero debe tener menos de 20 caracteres";
					resultado=false;
					} else document.getElementById("telefono1_msg").innerHTML="";
					
					if (document.formulario.telefono_2.value.length>=20) {
					document.getElementById("telefono2_msg").innerHTML="-> La n&uacute;mero debe tener menos de 20 caracteres";
					resultado=false;
					} else document.getElementById("telefono2_msg").innerHTML="";
					
					if (document.formulario.telefono_3.value.length>=20) {
					document.getElementById("telefono3_msg").innerHTML="-> La n&uacute;mero debe tener menos de 20 caracteres";
					resultado=false;
					} else document.getElementById("telefono3_msg").innerHTML="";
					
					return resultado;					
					
					}
					
function verificar_cambio_password ()
					{
				
					
					var resultado=true;					
					
					
					if (document.user_password.password.value=="") {
					document.getElementById("password_msg").innerHTML="-> Por favor ingrese una password";
					resultado=false;
					} else
					
					if (document.user_password.password.value.length<6) {
					document.getElementById("password_msg").innerHTML="-> La password debe tener al menos 6 caracteres";
					resultado=false;
					} else 
					
					if (document.user_password.password.value.length>=20) {
					document.getElementById("password_msg").innerHTML="-> La password debe tener menos de 20 caracteres";
					resultado=false;
					} else document.getElementById("password_msg").innerHTML="";
					
					if (document.user_password.password.value!=document.user_password.password2.value) {
					document.getElementById("password2_msg").innerHTML="-> La password y la verificaci&oacute;n no coinciden";
					resultado=false;
					} else document.getElementById("password2_msg").innerHTML="";
					
					
					return resultado;					
					
					}
					
function verificar_alta_usuario_interno ()
					{
				
					
					var resultado=true;
					
					
					
					if (document.formulario.nombre.value=="") {
					document.getElementById("nombre_msg").innerHTML="-> Por favor ingrese el nombre";
					resultado=false;
					} else 
					
					if (document.formulario.nombre.value.length>=50) {
					document.getElementById("nombre_msg").innerHTML="-> El nombre debe tener menos de 50 caracteres";
					resultado=false;
					} else document.getElementById("nombre_msg").innerHTML="";
					
					if (document.formulario.apellido.value=="") {
					document.getElementById("apellido_msg").innerHTML="-> Por favor ingrese el apellido";
					resultado=false;
					} else
					
					if (document.formulario.apellido.value.length>=50) {
					document.getElementById("apellido_msg").innerHTML="-> El apellido debe tener menos de 50 caracteres";
					resultado=false;
					} else document.getElementById("apellido_msg").innerHTML="";
					
										
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
					
					
function verificar_modificacion_usuario_interno()
					{
				
					
					var resultado=true;
					
					
					
					if (document.formulario.nombre.value=="") {
					document.getElementById("nombre_msg").innerHTML="-> Por favor ingrese el nombre";
					resultado=false;
					} else 
					
					if (document.formulario.nombre.value.length>=50) {
					document.getElementById("nombre_msg").innerHTML="-> El nombre debe tener menos de 50 caracteres";
					resultado=false;
					} else document.getElementById("nombre_msg").innerHTML="";
					
					if (document.formulario.apellido.value=="") {
					document.getElementById("apellido_msg").innerHTML="-> Por favor ingrese el apellido";
					resultado=false;
					} else
					
					if (document.formulario.apellido.value.length>=50) {
					document.getElementById("apellido_msg").innerHTML="-> El apellido debe tener menos de 50 caracteres";
					resultado=false;
					} else document.getElementById("apellido_msg").innerHTML="";
					
										
					return resultado;					
					
					}
					




function verificar_modificacion_habilitacion_dispositivo()
					{
				
					
					var resultado=true;
					
					
				
	
	if (document.formulario.descripcion.value.length>=50) {
					document.getElementById("descripcion_msg").innerHTML="-> La descripci&oacute;n debe tener menos de 50 caracteres";
					resultado=false;
					} else document.getElementById("descripcion_msg").innerHTML="";
					
					if (document.formulario.motivo_de_baja.value==""&&document.formulario.estado_habilitacion.value==4) {
					document.getElementById("motivo_de_baja_msg").innerHTML="-> Para las bajas, es obligatorio asentar el motivo";
					resultado=false;
					}  else
if (document.formulario.motivo_de_baja.value.length>0 && document.formulario.estado_habilitacion.value==1) {
					document.getElementById("motivo_de_baja_msg").innerHTML="-> El motivo de baja, s&oacute;lo debe ser usado para bajas o pendiente de baja.";
					resultado=false;
					}  else
					if (document.formulario.motivo_de_baja.value.length>0 && document.formulario.estado_habilitacion.value==2) {
					document.getElementById("motivo_de_baja_msg").innerHTML="-> El motivo de baja, s&oacute;lo debe ser usado para bajas o pendiente de baja.";
					resultado=false;
					}  else
					
					if (document.formulario.motivo_de_baja.value.length>=250) {
					document.getElementById("motivo_de_baja_msg").innerHTML="->El motivo debe tener menos de 250 caracteres";
					resultado=false;
					} else document.getElementById("motivo_de_baja_msg").innerHTML="";
					
					
					
	
	
	return resultado;					
					
					}
					
					
function verificar_nueva_facturacion()
					{
				
					
					var resultado=true;
					var f = new Date();
						if (document.formulario.anio.value<2008||document.formulario.anio.value>f.getFullYear()) {
					document.getElementById("anio_msg").innerHTML="-> A&ntilde;o incorrecto";
					resultado=false;
					} else 
					
					if (isNaN(document.formulario.anio.value)) {
					document.getElementById("anio_msg").innerHTML="-> Este campo s&oacute;lo admite n&uacute;meros";
					resultado=false;
					} else document.getElementById("anio_msg").innerHTML="";				
					
					
					
					if (document.formulario.mes.value>12||document.formulario.mes.value<1) {
					document.getElementById("mes_msg").innerHTML="-> Mes incorrecto";
					resultado=false;
					} else 
					
					if (isNaN(document.formulario.mes.value)) {
					document.getElementById("mes_msg").innerHTML="-> Este campo s&oacute;lo admite n&uacute;meros";
					resultado=false;
					} else document.getElementById("mes_msg").innerHTML="";
					
					
					
					if (document.formulario.valor5.value<1) {
					document.getElementById("valor5_msg").innerHTML="-> Valor incorrecto";
					resultado=false;
					} else 
					
					if (isNaN(document.formulario.valor5.value)) {
					document.getElementById("valor5_msg").innerHTML="-> Este campo s&oacute;lo admite n&uacute;meros";
					resultado=false;
					} else document.getElementById("valor5_msg").innerHTML="";
					
					
					
					if (document.formulario.valor10.value<1) {
					document.getElementById("valor10_msg").innerHTML="-> Valor incorrecto";
					resultado=false;
					} else 
					
					if (isNaN(document.formulario.valor10.value)) {
					document.getElementById("valor10_msg").innerHTML="-> Este campo s&oacute;lo admite n&uacute;meros";
					resultado=false;
					} else document.getElementById("valor10_msg").innerHTML="";
					
					
					
					if (document.formulario.valorextra.value<1) {
					document.getElementById("valorextra_msg").innerHTML="-> Valor incorrecto";
					resultado=false;
					} else 
					
					if (isNaN(document.formulario.valorextra.value)) {
					document.getElementById("valorextra_msg").innerHTML="-> Este campo s&oacute;lo admite n&uacute;meros";
					resultado=false;
					} else document.getElementById("valorextra_msg").innerHTML="";
					
					
					
					if (document.formulario.valorfalsa.value<1) {
					document.getElementById("valorfalsa_msg").innerHTML="-> Valor incorrecto";
					resultado=false;
					} else 
					
					if (isNaN(document.formulario.valorfalsa.value)) {
					document.getElementById("valorfalsa_msg").innerHTML="-> Este campo s&oacute;lo admite n&uacute;meros";
					resultado=false;
					} else document.getElementById("valorfalsa_msg").innerHTML="";
					
					
					
					
						return resultado;					
					
					}