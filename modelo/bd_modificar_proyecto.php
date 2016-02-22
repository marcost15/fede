<?php
function bd_modificar_proyecto($d)
{
	$id  = $d['id'];
	$sql = "UPDATE proyectos
			SET fecha_solicitud  =  '$d[fecha_solicitud]',
			    desc_solicitado  =  '$d[desc_solicitado]',
				responsable      =  '$d[responsable]',
				estatus          =  '$d[estatus]',
				fecha_resp       =  '$d[fecha_resp]',
				desc_respuesta   =  '$d[desc_respuesta]',
				observacion      =  '$d[observacion]',
				proy_actual      =  '$d[proy_actual]',
				proy_propuesto   =  '$d[proy_propuesto]'
				WHERE CONVERT(`proyectos`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }