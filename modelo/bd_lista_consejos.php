<?php
function bd_lista_consejos()
{
	return sql2opciones("SELECT id,nombre FROM consejo_comunal ORDER BY nombre ASC");
}