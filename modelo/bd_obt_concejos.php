<?php
function bd_obt_concejos($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre,vocero,cargo,correo,telf FROM consejo_comunal ORDER BY nombre ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM consejo_comunal WHERE id = $id LIMIT 1");
	}
}