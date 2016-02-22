<?php
function bd_obt_empresas($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre,rif,tlf,repre_lega,cedula,tlf_repre,correo FROM empresas ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM empresas WHERE id = $id");
	}
}
