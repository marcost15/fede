<?php
function bd_guardar_proyecto($d)
{
	enviar_sql("INSERT INTO proyectos (id, codigo_dea, fecha_solicitud, desc_solicitado, responsable, estatus, fecha_resp, 
				desc_respuesta, observacion, proy_actual, proy_propuesto,cod_proyecto) 
	VALUES ('','$d[codigo_dea]','$d[fecha_solicitud]','$d[desc_solicitado]','$d[responsable]','$d[estatus]','$d[fecha_resp]','$d[desc_respuesta]',
			'$d[observacion]','$d[proy_actual]','$d[proy_propuesto]','$d[cod_proyecto]');");
}