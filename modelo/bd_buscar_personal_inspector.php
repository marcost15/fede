<?php
function bd_buscar_personal_inspector($tipo,$texto)
{
	switch($tipo)
	{
		case 2: //Busqueda de texto completo
			$sql = "SELECT id,apellido,nombre,tipo,civ,tlf,correo,modalidad,cedula
							FROM personal_inspector
							WHERE id           LIKE '%$texto%' 
 								OR apellido    LIKE '%$texto%'
								OR nombre      LIKE '%$texto%'
								OR civ         LIKE '%$texto%'
								OR cedula      LIKE '%$texto%'
								OR correo      LIKE '%$texto%'
								OR tipo        LIKE '%$texto%'
								OR modalidad   LIKE '%$texto%'
						  	ORDER BY apellido ASC";
			break;
	}
	return sql2array($sql);
}