<?php
function bd_guardar_foto($d)
{
	enviar_sql("INSERT INTO fotos (id, tabla_id, foto, descripcion, tabla)
	VALUES ('','$d[tabla_id]','$d[foto]','$d[descripcion]','$d[tipo]');");
}