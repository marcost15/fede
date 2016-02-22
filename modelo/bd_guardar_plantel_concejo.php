<?php
function bd_guardar_plantel_concejo($d)
{
	enviar_sql("INSERT INTO plantel_concejo (id,consejo_id,plantel_id)
		VALUES ('','$d[consejo_id]','$d[id]');");
}