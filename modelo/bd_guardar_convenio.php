<?php
function bd_guardar_convenio($d)
{
	enviar_sql("INSERT INTO convenios (id, codigo_dea, nro_convenio, ejecutor, monto, tipo, fecha_inicio, fecha_terminacion, fecha_paralizacion,
				fecha_reinicio, estatus, plan, descripcion_trabajos, observacion,motivo_paralizacion) 
	VALUES ('','$d[codigo_dea]','$d[nro_convenio]','$d[ejecutor]','$d[monto]','$d[tipo]','$d[fecha_inicio]','$d[fecha_terminacion]',
			'$d[fecha_paralizacion]','$d[fecha_reinicio]','$d[estatus]','$d[plan]','$d[descripcion_trabajos]','$d[observacion]','$d[motivo_paralizacion]');");	
}