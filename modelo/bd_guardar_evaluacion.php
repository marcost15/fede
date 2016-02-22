<?php
function bd_guardar_evaluacion($d)
{
	enviar_sql("INSERT INTO evaluacion_tecnica (id, codigo_dea, solicitado_por, medio, fecha_solicitud, modalidad_atencion, descripcion_solicitud,
				estatus, fecha_entrega, fecha_respuesta, descripcion_respuesta, observacion, cod_evaluacion) 
	VALUES ('','$d[codigo_dea]','$d[solicitado_por]','$d[medio]','$d[fecha_solicitud]','$d[modalidad_atencion]','$d[descripcion_solicitud]',
			'$d[estatus]','$d[fecha_entrega]','$d[fecha_respuesta]','$d[descripcion_respuesta]','$d[observacion]','$d[cod_evaluacion]');");
}