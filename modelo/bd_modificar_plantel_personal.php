<?php
function bd_modificar_plantel_personal($d)
{
	$id  = $d['id'];
	$sql = "UPDATE plantel_personal
			SET 
				cedula  =  '$d[cedula]',
				nombre  =  '$d[nombre]',
				apellido  =  '$d[apellido]',
			    cod_dea  =  '$d[cod_dea]',
				tipo  =  '$d[tipo]',
				correo     =  '$d[correo]',
				telf  =  '$d[telf]'
				WHERE CONVERT(`plantel_personal`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }
