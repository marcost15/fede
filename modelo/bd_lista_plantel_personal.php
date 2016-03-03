<?php
function bd_lista_plantel_personal()
{
	return sql2opciones("SELECT id,CONCAT( apellido, ', ', nombre ) AS nombreape FROM plantel_personal ORDER BY nombreape ASC");
}