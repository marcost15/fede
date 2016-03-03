<?php
function bd_lista_parroquias()
{
	return sql2opciones("SELECT id,nombre FROM parroquias ORDER BY id ASC");
}