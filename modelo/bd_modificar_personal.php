<?php
function bd_modificar_personal($d)
{
	$id  = $d['id'];
	$sql = "UPDATE personal
			SET nombre           =  '$d[nombre]',
				apellido         =  '$d[apellido]',
				nivel_id         =  '$d[nivel_id]',
				estado           =  '$d[estado]'	
				WHERE CONVERT(`personal`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
	$sql2 = "UPDATE personal_datos
			SET direccion        =  '$d[direccion]',
				tlf_fijo         =  '$d[tlf_fijo]',
				tlf_movil        =  '$d[tlf_movil]',
				correo           =  '$d[correo]',
				foto             =  '$d[foto]'
				WHERE CONVERT(`personal_datos`.`personal_id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql2);
 }