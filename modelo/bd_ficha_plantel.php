<?php
function bd_ficha_plantel($id)
{
	$sql = "SELECT  id,nombre,cod_dea,cod_dependencia,cod_estadistico,dependencia,parroquias_id,direccion,matricula,nro_aulas,telf,
					coordenadas_latitud,coordenadas_longitud,coordenadas_altitud,caracteristicas,nivel_id
					FROM plantel
					WHERE id = '$id' 
					LIMIT 0,1";
	return sql2row($sql);
}