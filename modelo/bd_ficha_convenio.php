<?php
function bd_ficha_convenio($id)
{
	$sql = "SELECT  id, codigo_dea, nro_convenio, ejecutor, monto, tipo, fecha_inicio, fecha_terminacion, fecha_paralizacion,
					fecha_reinicio, estatus, plan, descripcion_trabajos, observacion, motivo_paralizacion
					FROM convenios
					WHERE id = '$id' 
					LIMIT 0,1";
	return sql2row($sql);
}