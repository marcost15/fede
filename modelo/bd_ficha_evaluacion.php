<?php
function bd_ficha_evaluacion($id)
{
	$sql = "SELECT  id, codigo_dea, solicitado_por, medio, fecha_solicitud, modalidad_atencion, 
					descripcion_solicitud, estatus, fecha_entrega, fecha_respuesta, descripcion_respuesta, observacion, cod_evaluacion
					FROM evaluacion_tecnica
					WHERE id = '$id' 
					LIMIT 0,1";
	return sql2row($sql);
}