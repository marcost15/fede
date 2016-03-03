<?php
function bd_modificar_empresa($d)
{
	$id  = $d['id'];
	$sql = "UPDATE empresas
			SET nombre       =  '$d[nombre]',
			    rif          =  '$d[rif]',
				tlf          =  '$d[tlf]',
				repre_legal  =  '$d[repre_legal]',
				cedula       =  '$d[cedula]',
				tlf_repre    =  '$d[tlf_repre]',
				correo       =  '$d[correo]'
				WHERE CONVERT(`empresas`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }