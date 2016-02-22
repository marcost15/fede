<?php
function bd_modificar_consejo($d)
{
	$id  = $d['id'];
	$sql = "UPDATE consejo_comunal
			SET nombre    =  '$d[nombre]',
				vocero    =  '$d[vocero]',
				cargo     =  '$d[cargo]',
				correo    =  '$d[correo]',
				telf      =  '$d[telf]'	
				WHERE CONVERT(`consejo_comunal`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }