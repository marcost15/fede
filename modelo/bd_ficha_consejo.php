<?php
function bd_ficha_consejo($id)
{
	$sql = "SELECT   id, nombre, vocero,cargo,correo,telf 
					FROM consejo_comunal
					WHERE id = '$id' 
					LIMIT 0,1";
	return sql2row($sql);
}