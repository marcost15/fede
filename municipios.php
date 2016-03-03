<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_municipios.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('municipios.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
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
			enviar_sql("DELETE FROM municipios WHERE id = '$_REQUEST[id]' LIMIT 1;");
			ir('municipios.php');
			break;
		}
	}
	else
	{
		$_SESSION['mensaje']="NO TIENE PERMISOS SUFICIENTES PARA ELIMINAR";
		ir('municipios.php');
	}
}

$f1=new dbFormHandler('municipios',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'municipios','mysql');
$f1->borderStart('Municipios');
$f1->textField('Nombre del Municipio','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"municipios.nombre.value=municipios.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el nombre del Municipio');
$f1->submitButton('Continuar','continuar');
$f1->borderStop();
$f1->onSaved("mensaje");

function mensaje()
{
	$_SESSION['mensaje']="EL MUNICIPIO SE REGISTRO CORRECTAMENTE";
	ir("municipios.php");
}
 
$smarty->assign('municipios',bd_obt_municipios());
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);