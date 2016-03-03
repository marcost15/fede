<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_servicios.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('servicios.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

if(isset($_REQUEST['id']))
{
	if($_SESSION['usuario']['nivel_id'] == '1')
	{
		switch($_REQUEST['func'])
		{	
			case 'delete':
			enviar_sql("DELETE FROM servicios WHERE id = '$_REQUEST[id]' LIMIT 1;");
			ir('servicios.php');
			break;
		}
	}
	else
	{
		$_SESSION['mensaje']="NO TIENE PERMISOS SUFICIENTES PARA ELIMINAR";
		ir('servicios.php');
	}
}

$f1=new dbFormHandler('servicios20',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'servicios','mysql');
$f1->borderStart('Servicios');
$f1->textField('Nombre del Servicio','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"servicios20.nombre.value=servicios20.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el nombre del Servicio');
$f1->submitButton('Continuar','continuar');
$f1->borderStop();
$f1->onSaved("mensaje");

function mensaje()
{
	$_SESSION['mensaje']="EL SERVICIO SE REGISTRO CORRECTAMENTE";
	ir("servicios.php");
}
 
$smarty->assign('f1',$f1->flush(true));
$smarty->assign('servicios',bd_obt_servicios());
$smarty->disp();
unset($_SESSION['mensaje']);