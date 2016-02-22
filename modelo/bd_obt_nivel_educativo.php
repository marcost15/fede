<?php
function bd_obt_nivel_educativo($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM nivel_educativo ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM nivel_educativo WHERE id = $id");
	}
}
