<?php
function bd_obt_plantel_personal($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,cedula,nombre,apellido,cod_dea,tipo,correo,telf FROM plantel_personal ORDER BY nombre ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM plantel_personal WHERE id = $id LIMIT 1");
	}
}