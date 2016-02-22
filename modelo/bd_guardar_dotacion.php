<?php
function bd_guardar_dotacion($d)
{
	enviar_sql("INSERT INTO dotacion (id, fecha, fecha_dotacion, nro_memo, gerencia, codigo_dea, cod_dotacion) 
	VALUES ('','$d[fecha]', '$d[fecha_dotacion]','$d[nro_memo]','$d[gerencia]','$d[codigo_dea]','$d[cod_dotacion]');");
}

function bd_guardar_dotacion_mobiliario($d)
{
	enviar_sql("INSERT INTO  dotacion_mobiliario (id, dotacion_id, descripcion, tipo,tipo2,tipo_mobiliario, empresa, monto) 
	VALUES ('','$d[tabla_id]','$d[descripcion_mobi]','$d[tipo]','$d[tipo2]','$d[tipo_mobiliario]','$d[empresa]','$d[monto]');");
}