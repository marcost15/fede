<?php
function bd_modificar_contrato_personal($d)
{
	$id  = $d['id'];
	$sql = "UPDATE personal_inspector
			SET tipo      =  '$d[tipo]',
				cedula    =  '$d[cedula]',
				civ       =  '$d[civ]',
				apellido  =  '$d[apellido]',
				tlf       =  '$d[tlf]',
				correo    =  '$d[correo]',
				modalidad =  '$d[modalidad]'				
				WHERE CONVERT(`personal_inspector`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
	}