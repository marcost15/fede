<?php
function bd_modificar_convenio($d)
{
	$id  = $d['id'];
	$sql = "UPDATE convenios
			SET ejecutor              =  '$d[ejecutor]',
			    monto                 =  '$d[monto]',
				tipo                  =  '$d[tipo]',
				fecha_inicio          =  '$d[fecha_inicio]',
				fecha_terminacion     =  '$d[fecha_terminacion]',
				fecha_paralizacion    =  '$d[fecha_paralizacion]',
				fecha_reinicio        =  '$d[fecha_reinicio]',
				plan                  =  '$d[plan]',
				descripcion_trabajos  =  '$d[descripcion_trabajos]',
				estatus               =  '$d[estatus]',
				motivo_paralizacion   =  '$d[motivo_paralizacion]',
				observacion           =  '$d[observacion]'
				WHERE CONVERT(`convenios`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }