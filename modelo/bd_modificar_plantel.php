<?php
function bd_modificar_plantel($d)
{
	$id  = $d['id'];
	$sql = "UPDATE plantel
			SET nombre                    =  '$d[nombre]',
			    cod_dea                   =  '$d[cod_dea]',
				cod_dependencia           =  '$d[cod_dependencia]',
				cod_estadistico           =  '$d[cod_estadistico]',
				dependencia               =  '$d[dependencia]',
				parroquias_id             =  '$d[parroquias_id]',
				direccion                 =  '$d[direccion]',
				matricula                 =  '$d[matricula]',
				nro_aulas                 =  '$d[nro_aulas]',
				telf                      =  '$d[telf]',
				coordenadas_latitud       =  '$d[coordenadas_latitud]',
				coordenadas_longitud      =  '$d[coordenadas_longitud]',
				coordenadas_altitud       =  '$d[coordenadas_altitud]',
				caracteristicas           =  '$d[caracteristicas]',
				nivel_id                  =  '$d[nivel_id]'
				WHERE CONVERT(`plantel`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
	enviar_sql("DELETE from plantel_servicios WHERE plantel_id = '$id'"); 
	$servicios_id = $d['servicios'];
	$m = $d['servicios'][0];
	if(!empty($m))
	{
		foreach($servicios_id as $i=>$m)
		{
			$servi = $servicios_id[$i];
			enviar_sql("INSERT INTO plantel_servicios (id,servicio_id,plantel_id)
			VALUES ('','$servi','$id');");
		}
	}
 }
function bd_modificar_plantel_foto($foto)
{
	//$id = $con_id;
	//enviar_sql("DELETE FROM fotos WHERE tabla_id = '$id' AND tabla = 'PLANTEL'");
	foreach($foto as $d1)
	{
		$tabla_id   	    = $d1['tabla_id'];
		$foto    	        = $d1['foto'];
		$descripcion        = $d1['descripcion'];
		$tabla      	    = 'PLANTEL';
		enviar_sql("
		INSERT INTO fotos (id, tabla_id, foto, descripcion, tabla)
		VALUES ('','$tabla_id','$foto','$descripcion','$tabla');");
	}		
}