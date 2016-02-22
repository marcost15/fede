<?php
function bd_lista_nivel_educativo()
{
	return sql2opciones("SELECT id,nombre FROM nivel_educativo ORDER BY id ASC");
}