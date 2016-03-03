<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('rp_cons_dotacionesxfecha.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$fecha_ini = $_REQUEST['fecha_ini'];
$fecha_fin = $_REQUEST['fecha_fin'];
$fecha_ini = f2f($fecha_ini);
$fecha_fin = f2f($fecha_fin);

$datos = sql2array("SELECT * FROM dotacion WHERE fecha BETWEEN '$fecha_ini' AND '$fecha_fin'");
foreach ($datos as $i=>$c)
{
	$cod_dea = $datos[$i]['codigo_dea'];
	$datos[$i]['plantel_nombre'] = sql2value("SELECT nombre FROM plantel WHERE cod_dea = '$cod_dea'");
	$datos[$i]['fecha'] = f2f($datos[$i]['fecha']);
	$datos[$i]['fecha_dotacion'] = f2f($datos[$i]['fecha_dotacion']);
}

$smarty->assign('datos',$datos);
$smarty->assign('fecha_ini',$fecha_ini);
$smarty->assign('fecha_fin',$fecha_fin);
$smarty->disp();