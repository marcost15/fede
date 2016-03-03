<?php
function bd_modificar_dotacion($d)
{
	$id  = $d['id'];
	$sql = "UPDATE dotacion
			SET fecha          =  '$d[fecha]',
			    nro_memo       =  '$d[nro_memo]',
				gerencia       =  '$d[gerencia]',
				fecha_dotacion =  '$d[fecha_dotacion]'
				WHERE CONVERT(`dotacion`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }