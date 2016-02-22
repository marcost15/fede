<?php
function bd_ficha_empresa($id)
{
	$sql = "SELECT  id, nombre, rif, tlf, repre_legal, cedula, tlf_repre, correo
					FROM empresas
					WHERE id = '$id' 
					LIMIT 0,1";
	return sql2row($sql);
}