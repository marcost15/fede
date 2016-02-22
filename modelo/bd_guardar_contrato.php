<?php
function bd_guardar_contrato($d)
{
	enviar_sql("INSERT INTO contratos (id, codigo_contrato, codigo_dea, tiempo_ejec, desc_trabajo, plan, modalidad_atencion,fecha_inicio, 
				fecha_terminacion, fecha_paralizacion, motivo_paralizacion, fecha_reinicio, fecha_prorroga, nro_dias_prorroga,
				motivo_prorroga, fecha_culminacion, monto_val_pagadas, poc_ejec_financiero, poc_ejec_fisico, estatus, observacion,
				monto_contratado, aumento, empleos_directos, empleos_indirectos,empresa_id,personal_insp,ing_residente) 
	VALUES ('','$d[codigo_contrato]','$d[codigo_dea]','$d[tiempo_ejec]','$d[desc_trabajo]','$d[plan]','$d[modalidad_atencion]','$d[fecha_inicio]',
			'$d[fecha_terminacion]','$d[fecha_paralizacion]','$d[motivo_paralizacion]','$d[fecha_reinicio]','$d[fecha_prorroga]','$d[nro_dias_prorroga]',
			'$d[motivo_prorroga]','$d[fecha_culminacion]','$d[monto_val_pagadas]','$d[poc_ejec_financiero]','$d[poc_ejec_fisico]','$d[estatus]','$d[observacion]',
			'$d[monto_contratado]','$d[aumento]','$d[empleos_directos]','$d[empleos_indirectos]','$d[empresa_id]','$d[personal_insp]',
			'$d[ing_residente]');");

	
}
function bd_modificar_contrato($d)
{
	$id  = $d['id'];
	$sql = "UPDATE contratos
			SET	tiempo_ejec                 =  '$d[tiempo_ejec]',
				desc_trabajo                =  '$d[desc_trabajo]',
				plan                        =  '$d[plan]',
				modalidad_atencion          =  '$d[modalidad_atencion]',
				fecha_inicio                =  '$d[fecha_inicio]',
				fecha_terminacion           =  '$d[fecha_terminacion]',
				fecha_paralizacion          =  '$d[fecha_paralizacion]',
				motivo_paralizacion         =  '$d[motivo_paralizacion]',
				fecha_reinicio              =  '$d[fecha_reinicio]',
				fecha_prorroga              =  '$d[fecha_prorroga]',
				nro_dias_prorroga           =  '$d[nro_dias_prorroga]',
				motivo_prorroga             =  '$d[motivo_prorroga]',
				fecha_culminacion           =  '$d[fecha_culminacion]',
				monto_val_pagadas           =  '$d[monto_val_pagadas]',
				poc_ejec_financiero         =  '$d[poc_ejec_financiero]',
				poc_ejec_fisico             =  '$d[poc_ejec_fisico]',
				estatus                     =  '$d[estatus]',
				observacion                 =  '$d[observacion]',
				monto_contratado            =  '$d[monto_contratado]',
				aumento                     =  '$d[aumento]',
				empleos_directos            =  '$d[empleos_directos]',
				empleos_indirectos          =  '$d[empleos_indirectos]',
				empresa_id                  =  '$d[empresa_id]',
				personal_insp               =  '$d[personal_insp]',
				ing_residente               =  '$d[ing_residente]'
				WHERE CONVERT(`contratos`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }