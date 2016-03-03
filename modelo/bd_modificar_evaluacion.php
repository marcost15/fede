<?php
function bd_modificar_evaluacion($d)
{
	$id  = $d['id'];
	$sql = "UPDATE evaluacion_tecnica
			SET solicitado_por         =  '$d[solicitado_por]',
			    medio                  =  '$d[medio]',
				fecha_solicitud        =  '$d[fecha_solicitud]',
				modalidad_atencion     =  '$d[modalidad_atencion]',
				descripcion_solicitud  =  '$d[descripcion_solicitud]',
				estatus                =  '$d[estatus]',
				fecha_entrega          =  '$d[fecha_entrega]',
				fecha_respuesta        =  '$d[fecha_respuesta]',
				descripcion_respuesta  =  '$d[descripcion_respuesta]',
				observacion            =  '$d[observacion]'
				WHERE CONVERT(`evaluacion_tecnica`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }