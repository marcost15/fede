<?php
function bd_obt_plantel($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre,cod_dea,cod_dependencia,cod_estadistico,dependencia,parroquias_id,direccion,matricula,nro_aulas,telf,coordenadas_latitud,coordenadas_longitud,coordenadas_altitud,caracteristicas,nivel_id FROM plantel ORDER BY nombre ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM plantel WHERE id = $id LIMIT 1");
	}
}