<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_modificar_dotacion.php';
include './modelo/bd_ficha_dotacion.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('modificar_dotacion.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$dotacion = bd_ficha_dotacion($_REQUEST['id']);
$dotacion['fecha'] = f2f($dotacion['fecha']);
$dotacion['fecha_dotacion'] = f2f($dotacion['fecha_dotacion']);
$cod_dea = $dotacion['codigo_dea'];
$plantel_nombre = sql2row("SELECT nombre FROM plantel WHERE cod_dea = '$cod_dea'");

$f1=new FormHandler('dotacion',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Agregar Dotacion');
$f1->hiddenField('id',$_REQUEST['id']);
if (isset($cod_dea))
{
	$plantel_nombre = sql2value("SELECT nombre FROM plantel WHERE cod_dea = '$cod_dea'");
	$f1->textField("CODIGO DEA", "codigo_dea",_FH_STRING,40,40,"readonly=readonly");
	$f1->textField("NOMBRE DEL PLANTEL", "plantel_nombre",_FH_STRING,40,40,"readonly=readonly");
	$f1->setValue('plantel_nombre', $plantel_nombre);
	$f1->setValue('codigo_dea', $cod_dea);
}
$f1->textField('Codigo de Dotacion','cod_dotacion',FH_STRING,50,255,"readonly=readonly");
$f1->jsDateField('Fecha de Solicitud','fecha','',0,'d-m-y',"20:00");
$f1->textField('Memo Nro','nro_memo',FH_DIGIT,15,11);
$f1->textField('Gerencia','gerencia',FH_STRING,50,100,"onkeyup=\"dotacion.gerencia.value=dotacion.gerencia.value.toUpperCase();\"");
$f1->jsDateField('Fecha de Dotacion','fecha_dotacion','',0,'d-m-y',"20:00");

$f1->setValue('cod_dotacion', $dotacion['cod_dotacion']);
$f1->setValue('fecha', $dotacion['fecha']);
$f1->setValue('nro_memo', $dotacion['nro_memo']);
$f1->setValue('gerencia', $dotacion['gerencia']);
$f1->setValue('fecha_dotacion', $dotacion['fecha_dotacion']);

$f1->setMask(
   " <tr>\n".
   "   <td> </td>\n".
   "   <td> </td>\n".
   "   <td>%field% %field%</td>\n".
   " </tr>\n"
);
$f1->submitButton('Registrar','registrar');
$f1->resetButton();
$f1->borderStop();
$f1->onCorrect("procesar");

function procesar($d)
{
		$cod_dea = $d['codigo_dea'];
		$id_plantel = sql2value("SELECT id FROM plantel WHERE cod_dea = '$cod_dea'");
		$d['fecha'] = f2f($d['fecha']);
		$d['fecha_dotacion'] = f2f($d['fecha_dotacion']);
		bd_modificar_dotacion($d);
		$_SESSION['mensaje']="DOTACION MODIFICADA CORRECTAMENTE";
		ir("ficha_plantel.php?id=$id_plantel");
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);