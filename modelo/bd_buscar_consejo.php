<?php
function bd_buscar_consejo($tipo,$texto)
{
	switch($tipo)
	{
		case 2: //Busqueda de texto completo
			$sql = "SELECT id,nombre,vocero,cargo,correo,telf
							FROM consejo_comunal
							WHERE id LIKE '%$texto%'
							OR nombre 	LIKE '%$texto%' 
								OR vocero              LIKE '%$texto%' 
								OR cargo        LIKE '%$texto%' 
								OR correo        LIKE '%$texto%' 
								OR telf        LIKE '%$texto%'
						  	ORDER BY nombre ASC";
			break;
	}
	return sql2array($sql);
}