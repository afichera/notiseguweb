<?php

class selects extends MySQL
{
	var $id = "";
		
	function cargarProvincias()
	{
		$consulta = parent::consulta("SELECT id, nombre FROM provincias");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$provincias = array();
			while($provincia = parent::fetch_assoc($consulta))
			{
				$id = $provincia["id"];
				$nombre = $provincia["nombre"];				
				$provincias[$id]=$nombre;
			}
			return $provincias;
		}
		else
		{
			return false;
		}
	}
		
	function cargarLocalidades()
	{
		$consulta = parent::consulta("SELECT id, nombre FROM localidades WHERE departamento_id = '".$this->id."'");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$localidades = array();
			while($localidad = parent::fetch_assoc($consulta))
			{
				$id = $localidad["id"];
				$nombre = $localidad["nombre"];				
				$localidades[$id]=$nombre;
			}
			return $localidades;
		}
		else
		{
			return false;
		}
	}		
	
	function cargarDepartamentos()
	{
		$consulta = parent::consulta("SELECT id, nombre FROM departamentos WHERE provincia_id = '".$this->id."'");
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$departamentos = array();
			while($departamento= parent::fetch_assoc($consulta))
			{
				$id = $departamento["id"];
				$nombre = $departamento["nombre"];								
				$departamentos[$id]=$nombre;
			}
			return $departamentos;
		}
		else
		{
			return false;
		}
	}		
}
?>