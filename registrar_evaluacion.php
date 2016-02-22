<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_guardar_evaluacion.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_evaluacion.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$status=array(
'POR REALIZAR' => 'POR REALIZAR',
'REALIZADO' => 'REALIZADO'
);

$f1=new FormHandler('evaluacion',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Agregar Evaluacion');
if (isset($_REQUEST['cod_dea']))
{
	$cod_dea = $_REQUEST['cod_dea'];
	$plantel_nombre = sql2value("SELECT nombre FROM plantel WHERE cod_dea = '$cod_dea'");
	$f1->textField("CODIGO DEA", "codigo_dea",_FH_STRING,40,40,"readonly=readonly");
	$f1->textField("NOMBRE DEL PLANTEL", "plantel_nombre",_FH_STRING,40,40,"readonly=readonly");
	$f1->setValue('plantel_nombre', $plantel_nombre);
	$f1->setValue('codigo_dea', $cod_dea);
}
$f1->textField('Codigo Evaluacion','cod_evaluacion',FH_STRING,50,255,"onkeyup=\"evaluacion.cod_evaluacion.value=evaluacion.cod_evaluacion.value.toUpperCase();\"");
$f1->textField('Solicitado por','solicitado_por',FH_STRING,50,100,"onkeyup=\"evaluacion.solicitado_por.value=evaluacion.solicitado_por.value.toUpperCase();\"");
$f1->textField('Medio','medio',FH_STRING,50,100,"onkeyup=\"evaluacion.medio.value=evaluacion.medio.value.toUpperCase();\"");
$f1->jsDateField('Fecha Solicitud','fecha_solicitud','validafecha',1,'d-m-y',"20:00");
$f1->textField('Modalidad Atencion','modalidad_atencion',FH_STRING,50,100,"onkeyup=\"evaluacion.modalidad_atencion.value=evaluacion.modalidad_atencion.value.toUpperCase();\"");
$f1->textField('Descripcion Solicitud','descripcion_solicitud',FH_STRING,50,100,"onkeyup=\"evaluacion.descripcion_solicitud.value=evaluacion.descripcion_solicitud.value.toUpperCase();\"");
$f1->selectField('Estatus','estatus',$status,FH_NOT_EMPTY,true);
$f1->jsDateField('Fecha de Entrega','fecha_entrega','validafecha',1,'d-m-y',"20:00");
$f1->jsDateField('Fecha de Respuesta','fecha_respuesta','validafecha',1,'d-m-y',"20:00");
$f1->textArea('Descripcion Respuesta','descripcion_respuesta',_FH_STRING,30,3,"onkeyup=\"evaluacion.descripcion_respuesta.value=evaluacion.descripcion_respuesta.value.toUpperCase();\"");
$f1->textArea('Observacion','observacion',_FH_STRING,30,3,"onkeyup=\"evaluacion.observacion.value=evaluacion.observacion.value.toUpperCase();\"");
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
	$codigo=$d['cod_evaluacion'];
	$n=sql2value("SELECT COUNT(*) FROM evaluacion_tecnica WHERE cod_evaluacion LIKE '$codigo'");
	if ($n==0)
	{
	$resp = comparafecha($d['fecha_solicitud'],$d['fecha_entrega']);
	if ($resp == 1)
	{
		$_SESSION['mensaje']="LAS FECHAS NO PUEDE SER PROCESADA PORQUE LA DE SOLICITUD ES MAYOR A LA DE ENTREGA";
		return false;
	}
	else
	{
		$resp = comparafecha($d['fecha_entrega'],$d['fecha_respuesta']);
		if ($resp == 1)
		{
			$_SESSION['mensaje']="LAS FECHAS NO PUEDE SER PROCESADA PORQUE LA DE ENTREGA ES MAYOR A LA DE RESPUESTA";
			return false;
		}
		else
		{
			$cod_dea = $d['codigo_dea'];
			$id_plantel = sql2value("SELECT id FROM plantel WHERE cod_dea = '$cod_dea'");
			$d['fecha_solicitud'] = f2f($d['fecha_solicitud']);
			$d['fecha_entrega'] = f2f($d['fecha_entrega']);
			$d['fecha_respuesta'] = f2f($d['fecha_respuesta']);
			bd_guardar_evaluacion($d);
			$_SESSION['mensaje']="EVALUACION REGISTRADA CORRECTAMENTE";
			ir("ficha_plantel.php?id=$id_plantel");
		}
	}
	}
	else
	{
		$_SESSION['mensaje']="LA EVALUACIÓN YA EXISTE, POR FAVOR INTRODUZCA UNO NUEVO";
		return false;
	}
}

$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);