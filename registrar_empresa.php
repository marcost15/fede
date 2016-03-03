<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_guardar_empresa.php';
//include './modelo/bd_modificar_plantel_personal.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_empresa.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$f1=new FormHandler('empresa',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$star = '<font color="blue">*</font>';
$f1->borderStart('Agregar Empresa');
$f1->textField($star.'Rif','rif',FH_STRING,15,20,"onkeyup=\"empresa.rif.value=empresa.rif.value.toUpperCase();\"");
$f1->textField($star.'Nombre','nombre',FH_STRING,50,100,"onkeyup=\"empresa.nombre.value=empresa.nombre.value.toUpperCase();\"");
$f1->textField('Teléfono','tlf',_FH_DIGIT,15,11);
$f1->setHelpText('tlf',"En este campo introduce el Numero de Telefono de la Empresa. Ejemplo: 02712448965");
$f1->textField($star.'Representante Legal','repre_legal',FH_STRING,50,100,"onkeyup=\"empresa.repre_legal.value=empresa.repre_legal.value.toUpperCase();\"");
$f1->textField($star.'Cédula','cedula',FH_DIGIT,12,11);
$f1->textField('Teléfono Representante','tlf_repre',_FH_DIGIT,15,11);
$f1->setHelpText('tlf_repre',"En este campo introduce el Numero de Telefono del Representante Legal. Ejemplo: 04167896541");
$f1->textField('Correo','correo',_FH_EMAIL,30,50);
$f1->setHelpText('correo',"En este campo introduce el Correo del Representante Legal");
$f1->addLine($star ." = Campos Requeridos Obligatoriamente");
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
	$rif=$d['rif'];
	$n=sql2value("SELECT COUNT(*) FROM empresas WHERE rif LIKE '$rif'");
	if ($n==0)
	{
		bd_guardar_empresa($d);
		$_SESSION['mensaje']="EMPRESA REGISTRADA CORRECTAMENTE";	
	}
	else
	{
		$_SESSION['mensaje']="EL RIF YA EXISTE, POR FAVOR INTRODUZCA UNO NUEVO";
		return false;
	}
	ir('registrar_empresa.php');
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);