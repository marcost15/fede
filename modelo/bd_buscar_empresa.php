<?php
function bd_buscar_empresa($tipo,$texto)
{
	switch($tipo)
	{
		case 2: //Busqueda de texto completo
			$sql = "SELECT id, nombre, rif, tlf, repre_legal, cedula, tlf_repre, correo
							FROM empresas
							WHERE id               LIKE '%$texto%'
							OR nombre 	           LIKE '%$texto%' 
								OR rif             LIKE '%$texto%' 
								OR tlf             LIKE '%$texto%' 
								OR repre_legal     LIKE '%$texto%' 
								OR cedula          LIKE '%$texto%' 
								OR tlf_repre       LIKE '%$texto%' 
								OR correo          LIKE '%$texto%' 
						  	ORDER BY nombre ASC";
			break;
	}
	return sql2array($sql);
}
