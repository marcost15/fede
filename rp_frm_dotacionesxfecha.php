<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('rp_frm_dotacionesxfecha.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$f1=new dbFormHandler('cierres',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('DOTACIONES POR FECHA DE SOLICITUD');
$f1->DateField('Fecha Inicio','fecha_ini',FH_NOT_EMPTY,1,'d-m-y',"10:00");
$f1->DateField('Fecha Final','fecha_fin',FH_NOT_EMPTY,1,'d-m-y',"10:00");
$f1->submitButton('Aceptar','Aceptar');
$f1->borderStop();
$f1->onCorrect("procesar");

function procesar($d)
{
	$resp = comparafecha($d['fecha_ini'],$d['fecha_fin']);
	if ($resp == 1)
	{
		$_SESSION['mensaje']="LAS FECHAS NO PUEDE SER PROCESADA PORQUE LA DE INICIO ES MAYOR A LA DE FINAL";
		return false;
		ir("rp_frm_cierreglobal.php");
	}
	else
	{
		$fecha_ini = $d['fecha_ini'];
		$fecha_fin = $d['fecha_fin'];
		ir("rp_cons_dotacionesxfecha.php?fecha_ini=$fecha_ini&fecha_fin=$fecha_fin");
	}
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);
