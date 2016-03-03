<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_nivel_educativo.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('nivel_educativo.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
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
			enviar_sql("DELETE FROM nivel_educativo WHERE id = '$_REQUEST[id]' LIMIT 1;");
			ir('nivel_educativo.php');
			break;
		}
	}
	else
	{
		$_SESSION['mensaje']="NO TIENE PERMISOS SUFICIENTES PARA ELIMINAR";
		ir('nivel_educativo.php');
	}
}

$f1=new dbFormHandler('nivel_educativo',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'nivel_educativo','mysql');
$f1->borderStart('Nivel Educativo');
$f1->textField('Nombre del Nivel Educativo','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"nivel_educativo.nombre.value=nivel_educativo.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el nombre del Nivel Educativo');
$f1->submitButton('Continuar','continuar');
$f1->borderStop();
$f1->onSaved("mensaje");

function mensaje()
{
	$_SESSION['mensaje']="EL NIVEL EDUCATIVO SE REGISTRO CORRECTAMENTE";
	ir("nivel_educativo.php");
}
 
$smarty->assign('nivel_educativo',bd_obt_nivel_educativo());
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);