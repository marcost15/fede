<?php
function bd_ficha_contrato($id)
{
	$sql = "SELECT  id, codigo_contrato, codigo_dea, tiempo_ejec, desc_trabajo, plan, modalidad_atencion,fecha_inicio, 
				fecha_terminacion, fecha_paralizacion, motivo_paralizacion, fecha_reinicio, fecha_prorroga, nro_dias_prorroga,
				motivo_prorroga, fecha_culminacion, monto_val_pagadas, poc_ejec_financiero, poc_ejec_fisico, estatus, observacion,
				monto_contratado, aumento, empleos_directos, empleos_indirectos,empresa_id,personal_insp,ing_residente
					FROM contratos
					WHERE id = '$id' 
					LIMIT 0,1";
	return sql2row($sql);
}