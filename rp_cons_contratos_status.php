<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('rp_cons_contratos_status.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$id = $_REQUEST['id'];

$datos = sql2array("SELECT * FROM contratos WHERE estatus = '$id'");
foreach ($datos as $i=>$c)
{
	$cod_dea = $datos[$i]['codigo_dea'];
	$datos[$i]['plantel_nombre'] = sql2value("SELECT nombre FROM plantel WHERE cod_dea = '$cod_dea'");
	$empresa_id = $datos[$i]['empresa_id'];
	$datos[$i]['empresa_nombre'] = sql2value("SELECT nombre FROM empresas WHERE id = '$empresa_id'");
	$personal_insp = $datos[$i]['personal_insp'];
	$datos[$i]['nombre_inspector'] = sql2value("SELECT CONCAT( apellido, ', ', nombre ) AS nombreape FROM personal_inspector WHERE id = '$personal_insp'");
	$ing_residente = $datos[$i]['ing_residente'];
	$datos[$i]['nombre_residente'] = sql2value("SELECT CONCAT( apellido, ', ', nombre ) AS nombreape FROM personal_inspector WHERE id = '$ing_residente'");
	$datos[$i]['fecha_inicio'] = f2f($datos[$i]['fecha_inicio']);
	$datos[$i]['fecha_terminacion'] = f2f($datos[$i]['fecha_terminacion']);
	$datos[$i]['fecha_paralizacion'] = f2f($datos[$i]['fecha_paralizacion']);
	$datos[$i]['fecha_reinicio'] = f2f($datos[$i]['fecha_reinicio']);
	$datos[$i]['fecha_prorroga'] = f2f($datos[$i]['fecha_prorroga']);
}

$smarty->assign('datos',$datos);
$smarty->assign('id',$id);
$smarty->disp();