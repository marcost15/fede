<?php
function bd_guardar_plantel_personal($d)
{
	enviar_sql("INSERT INTO plantel_personal (id,cedula,nombre,apellido,cod_dea,tipo,correo,telf) 
	VALUES ('','$d[cedula]','$d[nombre]','$d[apellido]','$d[cod_dea]','$d[tipo]','$d[correo]','$d[telf]');");
}