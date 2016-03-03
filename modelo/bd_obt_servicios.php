<?php
function bd_obt_servicios($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM servicios ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM servicios WHERE id = $id");
	}
}
