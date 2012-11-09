function validar()
{
	// alert(document.form_alta_nota.titulo_noticia.value);
	// alert(document.form_alta_nota.contenido_noticia.value);
	// alert(document.form_alta_nota.autor_noticia.value);
	
	if (document.form_alta_usu.nombre.value.length==0||document.form_alta_usu.nombre.value==" ")
	{
		alert("Tiene que escribir su nombre");
		//document.formulario.nombre.focus();
		//pintar(document.formulario.nombre);
		return 0;
	}
	
	if (document.form_alta_usu.apellido.value.length==0||document.form_alta_usu.apellido.value==" ")
	{
		alert("Tiene que escribir su apellido");
		//document.formulario.nombre.focus();
		//pintar(document.formulario.nombre);
		return 0;
	}
	
	if (isNaN(document.form_alta_usu.dni.value))
		{
			alert("Ingrese solo números en su número de D.N.I.");
			//document.formulario.telefono.focus();
			//pintar(document.formulario.telefono);
			return 0;
		}
	
	if ((document.form_alta_usu.estado.value!=1)&&(document.form_alta_usu.estado.value!=0))
	{
		alert("El tipo de Estado no es válida")
		// document.formulario.clave.focus();
		// pintar(document.formulario.clave);
		// pintar(document.formulario.clave2);
		return 0;
	}	
	
	if ((document.form_alta_usu.tipo_usuario.value!=1)&&(document.form_alta_usu.tipo_usuario.value!=2))
	{
		alert("El tipo de Usuario no es válido")
		// document.formulario.clave.focus();
		// pintar(document.formulario.clave);
		// pintar(document.formulario.clave2);
		return 0;
	}	
	
	// if (document.form_alta_usu.clave.value.length<6)
	// {
		// alert("Tiene que escribir una contraseña de al menos 6 dígitos")
		//document.formulario.clave.focus();
		//pintar(document.formulario.clave);
		//pintar(document.formulario.clave2);
		// return 0;
	// }	


	if (document.form_alta_usu.clave1.value!=document.form_alta_usu.clave2.value)
	{
		alert("La verificacion de contraseña es incorrecta");
		//document.formulario.clave.focus();
		//pintar(document.formulario.clave);
		//pintar(document.formulario.clave2);
		return 0;
	}		
	
	document.formulario.submit();

}
/*
function pintar(campo)
{
campo.style.borderColor='#FF0000';
}

function despintar(campo)
{
switch(campo){
case 'nombre': campo=document.formulario.nombre; break;
case 'telefono': campo=document.formulario.telefono; break;
case 'email': campo=document.formulario.email; break;
case 'tarjeta': campo=document.formulario.tarjeta; break;
case 'direccion': campo=document.formulario.direccion; break;
case 'cp': campo=document.formulario.cp; break;
case 'clave': campo=document.formulario.clave; 
case 'clave2': campo=document.formulario.clave2; 
campo.style.borderColor='';
campo=document.formulario.clave; 
}
campo.style.borderColor='';
}
*/
//alert('prueba!');