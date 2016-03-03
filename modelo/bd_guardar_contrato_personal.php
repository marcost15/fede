<?php
function bd_guardar_contrato_personal($d)
{
	enviar_sql("INSERT INTO personal_inspector (id, tipo, cedula, civ, nombre, apellido, tlf, correo, modalidad) 
	VALUES ('','$d[tipo]','$d[cedula]','$d[civ]','$d[nombre]','$d[apellido]','$d[tlf]','$d[correo]','$d[modalidad]');");
}
