<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_guardar_proyecto.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_proyecto.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$status=array(
'POR REALIZAR' => 'POR REALIZAR',
'REALIZADO' => 'REALIZADO'
);
$f1=new FormHandler('proyecto',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Agregar Proyecto');
if (isset($_REQUEST['cod_dea']))
{
	$cod_dea = $_REQUEST['cod_dea'];
	$plantel_nombre = sql2value("SELECT nombre FROM plantel WHERE cod_dea = '$cod_dea'");
	$f1->textField("CODIGO DEA", "codigo_dea",_FH_STRING,40,40,"readonly=readonly");
	$f1->textField("NOMBRE DEL PLANTEL", "plantel_nombre",_FH_STRING,40,40,"readonly=readonly");
	$f1->setValue('plantel_nombre', $plantel_nombre);
	$f1->setValue('codigo_dea', $cod_dea);
}
$f1->textField('Codigo Proyecto','cod_proyecto',FH_STRING,50,255,"onkeyup=\"proyecto.cod_proyecto.value=proyecto.cod_proyecto.value.toUpperCase();\"");
$f1->setHelpText('cod_proyecto',"En este campo introduce el Codigo del Proyecto");
$f1->jsDateField('Fecha de Solicitud','fecha_solicitud','validafecha',1,'d-m-y',"20:00");
$f1->setHelpText('fecha_solicitud',"Seleccione la Fecha de Solicitud del Proyecto");
$f1->textArea('Descripcion de Solicitud','desc_solicitado',FH_STRING,30,3,"onkeyup=\"proyecto.desc_solicitado.value=proyecto.desc_solicitado.value.toUpperCase();\"");
$f1->setHelpText('desc_solicitado',"En este campo introduce la Descripcion de la Solicitud del Proyecto");
$f1->textField('Responsable','responsable',FH_STRING,50,100,"onkeyup=\"proyecto.responsable.value=proyecto.responsable.value.toUpperCase();\"");
$f1->setHelpText('responsable',"En este campo introduce el Responsable del Proyecto");
$f1->selectField('Estatus','estatus',$status,FH_NOT_EMPTY,true);
$f1->setHelpText('estatus',"Seleccione el Estatus del Proyecto");
$f1->jsDateField('Fecha de Respuesta','fecha_resp','',0,'d-m-y',"20:00");
$f1->setHelpText('fecha_resp',"Seleccione la Fecha de Respuesta del Proyecto");
$f1->textArea('Descripcion de Respuesta','desc_respuesta',FH_STRING,30,3,"onkeyup=\"proyecto.desc_respuesta.value=proyecto.desc_respuesta.value.toUpperCase();\"");
$f1->setHelpText('desc_respuesta',"En este campo introduce la Descripcion de la Respuesta del Proyecto");
$f1->textArea('Proyecto Actual','proy_actual',_FH_STRING,30,3,"onkeyup=\"proyecto.proy_actual.value=proyecto.proy_actual.value.toUpperCase();\"");
$f1->setHelpText('proy_actual',"En este campo introduce el Proyecto Actual");
$f1->textArea('Proyecto Propuesto','proy_propuesto',_FH_STRING,30,3,"onkeyup=\"proyecto.proy_propuesto.value=proyecto.proy_propuesto.value.toUpperCase();\"");
$f1->setHelpText('proy_propuesto',"En este campo introduce el Proyecto Propuesto");
$f1->textArea('Observacion','observacion',_FH_STRING,30,3,"onkeyup=\"proyecto.observacion.value=proyecto.observacion.value.toUpperCase();\"");
$f1->setHelpText('observacion',"En este campo introduce las Observaciones del Proyecto");

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
	$codigo=$d['cod_proyecto'];
	$n=sql2value("SELECT COUNT(*) FROM proyectos WHERE cod_proyecto LIKE '$codigo'");
	if ($n==0)
	{
		$resp = comparafecha($d['fecha_solicitud'],$d['fecha_resp']);
		if ($resp == 1)
		{
			$_SESSION['mensaje']="LAS FECHAS NO PUEDE SER PROCESADA PORQUE LA DE SOLICITUD ES MAYOR A LA DE RESPUESTA";
			return false;
		}
		else
		{
			$cod_dea = $d['codigo_dea'];
			$id_plantel = sql2value("SELECT id FROM plantel WHERE cod_dea = '$cod_dea'");
			$d['fecha_solicitud'] = f2f($d['fecha_solicitud']);
			$d['fecha_resp'] = f2f($d['fecha_resp']);
			bd_guardar_proyecto($d);
			$_SESSION['mensaje']="PROYECTO REGISTRADO CORRECTAMENTE";
			ir("ficha_plantel.php?id=$id_plantel");
		}
	}
	else
	{
		$_SESSION['mensaje']="EL PROYECTO YA EXISTE, POR FAVOR INTRODUZCA UNO NUEVO";
		return false;
	}
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);