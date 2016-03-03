<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_guardar_dotacion.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_dotacion.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}
$f1=new FormHandler('dotacion',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Agregar Dotacion');
$f1->hiddenField('plantel_id');
if (isset($_REQUEST['cod_dea']))
{
	$cod_dea = $_REQUEST['cod_dea'];
	$plantel_nombre = sql2value("SELECT nombre FROM plantel WHERE cod_dea = '$cod_dea'");
	$f1->textField("CODIGO DEA", "codigo_dea",_FH_STRING,40,40,"readonly=readonly");
	$f1->textField("NOMBRE DEL PLANTEL", "plantel_nombre",_FH_STRING,40,40,"readonly=readonly");
	$f1->setValue('plantel_nombre', $plantel_nombre);
	$f1->setValue('codigo_dea', $cod_dea);
}
$f1->textField('Codigo de Dotacion','cod_dotacion',FH_STRING,50,255,"onkeyup=\"dotacion.cod_dotacion.value=dotacion.cod_dotacion.value.toUpperCase();\"");
$f1->setHelpText('cod_dotacion',"En este campo introduce el Codigo de la Dotacion");
$f1->jsDateField('Fecha de Solicitud','fecha','',0,'d-m-y',"20:00");
$f1->setHelpText('fecha',"Seleccione la Fecha de Solicitud de la Dotacion");
$f1->textField('Memo Nro','nro_memo',FH_DIGIT,15,11);
$f1->setHelpText('nro_memo',"En este campo introduce el Numero MEMO de la Dotacion");
$f1->textField('Gerencia','gerencia',FH_STRING,50,100,"onkeyup=\"dotacion.gerencia.value=dotacion.gerencia.value.toUpperCase();\"");
$f1->setHelpText('gerencia',"En este campo introduce la Gerencia de la Dotacion");
$f1->jsDateField('Fecha de Dotacion','fecha_dotacion','',0,'d-m-y',"20:00");
$f1->setHelpText('fecha_dotacion',"Seleccione la Fecha de la Dotacion Realizada");
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
	$codigo=$d['cod_dotacion'];
	$n=sql2value("SELECT COUNT(*) FROM dotacion WHERE cod_dotacion LIKE '$codigo'");
	if ($n==0)
	{
	$nro_memo=$d['nro_memo'];
	$n=sql2value("SELECT COUNT(*) FROM dotacion WHERE nro_memo LIKE '$nro_memo'");
	if ($n==0)
	{
		$cod_dea = $d['codigo_dea'];
		$id_plantel = sql2value("SELECT id FROM plantel WHERE cod_dea = '$cod_dea'");
		$d['fecha'] = f2f($d['fecha']);
		$d['fecha_dotacion'] = f2f($d['fecha_dotacion']);
		bd_guardar_dotacion($d);
		$_SESSION['mensaje']="DOTACION AGREGADA CORRECTAMENTE";
		ir("ficha_plantel.php?id=$id_plantel");
	}
	else
	{
		$_SESSION['mensaje']="EL NRO DE MEMO YA EXISTE, POR FAVOR INTRODUZCA UNO NUEVO";
		return false;
	}
	}
	else
	{
		$_SESSION['mensaje']="EL CODIGO DE DOTACION YA EXISTE, POR FAVOR INTRODUZCA UNO NUEVO";
		return false;
	}
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);