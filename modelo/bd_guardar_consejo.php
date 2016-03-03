<?php
function bd_guardar_consejo($d)
{
	enviar_sql("INSERT INTO consejo_comunal (id,nombre,vocero,cargo,correo,telf) 
	VALUES ('$d[id]','$d[nombre]','$d[vocero]','$d[cargo]','$d[correo]','$d[telf]');");
}
