<?php
function bd_ficha_plantel_personal($id)
{
	$sql = "SELECT  id,cedula,nombre,apellido,cod_dea,tipo,correo,telf
					FROM plantel_personal
					WHERE id = '$id' 
					LIMIT 0,1";
	return sql2row($sql);
}