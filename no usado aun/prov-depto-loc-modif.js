$(document).ready(function(){
	cargar_provincias();
	$("#provincia").change(function(){dependencia_departamento();});
	$("#provincia").ready(function(){dependencia_departamento_ready();});
	$("#departamento").change(function(){dependencia_localidad();});
	$("#departamento").ready(function(){dependencia_localidad_ready();});
	$("#departamento").attr("disabled",false);
	$("#localidad").attr("disabled",false);
	
});

function cargar_provincias()
{
	$.get("../scripts/cargar-provincias.php", function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$('#provincia').append(resultado);			
		}
	});
	
}
function dependencia_departamento()
{
	var id = $("#provincia").val();
	
	$.get("../scripts/dependencia-departamento.php", { id: id },
		function(resultado)
		{
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				$("#departamento").attr("disabled",false);
				document.getElementById("departamento").options.length=0;
				$('#departamento').append(resultado);
				
				
				$.get("../scripts/dependencia-localidades.php?", { id: id }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#localidad").attr("disabled",false);
			document.getElementById("localidad").options.length=0;
			$('#localidad').append(resultado);			
		}
	});				
			}
		}	
	);
	
}

function dependencia_departamento_ready()
{
	var id = $("#provincia").val();
	
	$.get("../scripts/dependencia-departamento.php", { id: id },
		function(resultado)
		{
			if(resultado == false)
			{
				alert("Error");
			}
			else
			{
				document.getElementById("departamento").options.length=1;
				$('#departamento').append(resultado);			
			}
		}	
	);
	
}




function dependencia_localidad()
{
	var id = $("#departamento").val();
	$.get("../scripts/dependencia-localidades.php?", { id: id }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			$("#localidad").attr("disabled",false);
			document.getElementById("localidad").options.length=0;
			$('#localidad').append(resultado);			
		}
	});	
}

function dependencia_localidad_ready()
{
	var id = $("#departamento").val();
	$.get("../scripts/dependencia-localidades.php?", { id: id }, function(resultado){
		if(resultado == false)
		{
			alert("Error");
		}
		else
		{
			document.getElementById("localidad").options.length=1;
			$('#localidad').append(resultado);			
		}
	});	
}