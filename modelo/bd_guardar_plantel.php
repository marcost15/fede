<?php
function bd_guardar_plantel($d)
{
	enviar_sql("INSERT INTO plantel (id,nombre,cod_dea,cod_dependencia,cod_estadistico,dependencia,parroquias_id,direccion,matricula,nro_aulas,telf,
									 coordenadas_latitud,coordenadas_longitud,coordenadas_altitud,caracteristicas,nivel_id) 
	VALUES ('','$d[nombre]','$d[cod_dea]','$d[cod_dependencia]','$d[cod_estadistico]','$d[dependencia]','$d[parroquias_id]','$d[direccion]',
			'$d[matricula]','$d[nro_aulas]','$d[telf]','$d[coordenadas_latitud]','$d[coordenadas_longitud]','$d[coordenadas_altitud]','$d[caracteristicas]',
			'$d[nivel_id]');");
	$plantel_id = sql2value("SELECT id FROM plantel ORDER BY id DESC LIMIT 1"); 
	$servicios_id = $d['servicios'];
	$m = $d['servicios'][0];
	if(!empty($m))
	{
		foreach($servicios_id as $i=>$m)
		{
			$servi = $servicios_id[$i];
			enviar_sql("INSERT INTO plantel_servicios (id,servicio_id,plantel_id)
			VALUES ('','$servi','$plantel_id');");
		}
	}
}