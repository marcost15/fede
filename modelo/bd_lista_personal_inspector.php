<?php
function bd_lista_personal_inspector()
{
	return sql2opciones("SELECT id,CONCAT( apellido, ', ', nombre ) AS nombreape FROM personal_inspector WHERE tipo = 'INSPECTOR' ORDER BY nombreape ASC");
}
function bd_lista_personal_residente()
{
	return sql2opciones("SELECT id,CONCAT( apellido, ', ', nombre ) AS nombreape FROM personal_inspector WHERE tipo = 'RESIDENTE' ORDER BY nombreape ASC");
}