$(document).ready(function(){
	cargar_provincias();
	$("#provincia").change(function(){dependencia_departamento();});
	$("#departamento").change(function(){dependencia_localidad();});
	$("#departamento").attr("disabled",true);
	$("#localidad").attr("disabled",true);
	
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
			document.getElementById("localidad").options.length=1;
			$('#localidad').append(resultado);			
		}
	});	
}