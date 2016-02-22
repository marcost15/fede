<?php
function bd_ficha_dotacion($id)
{
	$sql = "SELECT  id, fecha, fecha_dotacion, nro_memo, gerencia, codigo_dea, fecha, cod_dotacion
					FROM dotacion
					WHERE id = '$id' 
					LIMIT 0,1";
	return sql2row($sql);
}