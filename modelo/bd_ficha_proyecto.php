<?php
function bd_ficha_proyecto($id)
{
	$sql = "SELECT  id, codigo_dea, fecha_solicitud, desc_solicitado, responsable, estatus, fecha_resp,
					desc_respuesta, observacion, proy_actual, proy_propuesto, cod_proyecto
					FROM proyectos
					WHERE id = '$id' 
					LIMIT 0,1";
	return sql2row($sql);
}