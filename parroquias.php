<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_obt_parroquias.php';
include './modelo/bd_obt_municipios.php';
include './modelo/bd_lista_municipios.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('parroquias.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
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
			enviar_sql("DELETE FROM parroquias WHERE id = '$_REQUEST[id]' LIMIT 1;");
			ir('parroquias.php');
			break;
		}
	}
	else
	{
		$_SESSION['mensaje']="NO TIENE PERMISOS SUFICIENTES PARA ELIMINAR";
		ir('parroquias.php');
	}
}

$f1=new dbFormHandler('parroquias',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->setConnectionResource($link,'parroquias','mysql');
$f1->borderStart('Agregar/Modificar Parroquias');
$f1->SelectField('Municipios','municipio_id',bd_lista_municipios(),FH_NOT_EMPTY,true);
$f1->textField('Parroquia','nombre',FH_NOT_EMPTY,30,255,"onkeyup=\"parroquias.nombre.value=parroquias.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre','Por Favor Introduzca el Nombre de la Parroquia y asignele el Municipio');
$f1->submitButton('Continuar','continuar');
$f1->borderStop();
$f1->onSaved('mensaje');

function mensaje($id,$d)
{
    $_SESSION['mensaje']="PARROQUIA PROCESADA CORRECTAMENTE";
	ir('parroquias.php');
}

$parroquias = bd_obt_parroquias();
foreach ($parroquias as $i=>$c)
{
	$parroquias[$i]['municipio_id'] = bd_obt_municipios($parroquias[$i]['municipio_id']);
}
$smarty->assign('parroquias',$parroquias);
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);