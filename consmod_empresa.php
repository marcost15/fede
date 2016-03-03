<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_verificar_privilegios.php';
include './modelo/bd_buscar_empresa.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('consmod_empresa.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
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
			enviar_sql("DELETE FROM empresas WHERE id = '$_REQUEST[id]' LIMIT 1;");
			ir('consmod_empresa.php');
			break;
		}
	}
	else
	{
		$_SESSION['mensaje']="NO TIENE PERMISOS SUFICIENTES PARA ELIMINAR";
		ir('consmod_empresa.php');
	}
}

$error1 = '0';

$f1  = new formHandler('busqueda_empresa',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1 -> borderStart('Busqueda de Empresa');
$f1 -> textField('Texto a buscar','texto');
$f1 -> submitButton('Continuar');
$f1 -> borderStop();
$f1 ->onCorrect('procesar');

function procesar($d)
{
	global $smarty;
	$texto=$d['texto'];
	$datos15 = bd_buscar_empresa(2,$texto);
	if (isset($datos15))
	{
		$error1 = '2';
	}
	
	$smarty->assign('error1',$error1);
	$smarty->assign('datos',$datos15);
	return false;
}

$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['datos']);