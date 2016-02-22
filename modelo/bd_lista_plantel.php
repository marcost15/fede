<?php
function bd_lista_plantel()
{
	return sql2opciones("SELECT id,nombre FROM plantel ORDER BY nombre ASC");
}