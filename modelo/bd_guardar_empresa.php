<?php
function bd_guardar_empresa($d)
{
	enviar_sql("INSERT INTO empresas (id, nombre, rif, tlf, repre_legal, cedula, tlf_repre, correo) 
	VALUES ('','$d[nombre]','$d[rif]','$d[tlf]','$d[repre_legal]','$d[cedula]','$d[tlf_repre]','$d[correo]');");
}
