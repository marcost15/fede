<?php
function bd_lista_servicios()
{
	return sql2opciones("SELECT id,nombre FROM servicios ORDER BY id ASC");
}