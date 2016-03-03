<?php
function bd_buscar_plantel($tipo,$texto)
{
	switch($tipo)
	{
		case 2: //Busqueda de texto completo
			$sql = "SELECT plantel.id,plantel.nombre,cod_dea,direccion
							FROM plantel INNER JOIN parroquias ON plantel.parroquias_id = parroquias.id INNER JOIN
								 municipios ON parroquias.municipio_id = municipios.id
								WHERE plantel.id        LIKE '%$texto%'
								OR plantel.nombre       LIKE '%$texto%' 
								OR cod_dea              LIKE '%$texto%' 
								OR cod_dependencia      LIKE '%$texto%' 
								OR cod_estadistico      LIKE '%$texto%' 
								OR dependencia          LIKE '%$texto%' 
								OR direccion            LIKE '%$texto%' 
								OR telf                 LIKE '%$texto%' 
								OR coordenadas_latitud  LIKE '%$texto%' 
								OR coordenadas_longitud LIKE '%$texto%' 
								OR coordenadas_altitud  LIKE '%$texto%' 
								OR caracteristicas      LIKE '%$texto%' 
								OR municipios.nombre    LIKE '%$texto%'
						  	ORDER BY nombre ASC";
			break;
	}
	return sql2array($sql);
}