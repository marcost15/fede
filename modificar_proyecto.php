<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_modificar_proyecto.php';
include './modelo/bd_ficha_proyecto.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('modificar_proyecto.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}


$status=array(
'POR REALIZAR' => 'POR REALIZAR',
'REALIZADO' => 'REALIZADO'
);

$proyecto = bd_ficha_proyecto($_REQUEST['id']);
$id = $_REQUEST['id'];
$cod_dea = $proyecto['codigo_dea'];
$plantel_nombre = sql2row("SELECT nombre FROM plantel WHERE cod_dea = '$cod_dea'");
$proyecto['fecha_solicitud'] = f2f($proyecto['fecha_solicitud']);
$proyecto['fecha_resp'] = f2f($proyecto['fecha_resp']);

$f1=new FormHandler('proyecto',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Modificar proyecto');
$f1->hiddenField('id', $id);
$f1->textField("Codigo DEA", "codigo_dea",FH_STRING,15,20,"readonly=readonly");
$f1->textField("Plantel", "plantel_nombre",_FH_STRING,40,40,"readonly=readonly");
$f1->textField('Codigo Proyecto','cod_proyecto',FH_STRING,50,255,"readonly=readonly");
$f1->jsDateField('Fecha de Solicitud','fecha_solicitud','validafecha',1,'d-m-y',"20:00");
$f1->textArea('Descripcion de Solicitud','desc_solicitado',FH_STRING,30,3,"onkeyup=\"proyecto.desc_solicitado.value=proyecto.desc_solicitado.value.toUpperCase();\"");
$f1->textField('Responsable','responsable',FH_STRING,50,100,"onkeyup=\"proyecto.responsable.value=proyecto.responsable.value.toUpperCase();\"");
$f1->selectField('Estatus','estatus',$status,FH_NOT_EMPTY,true);
$f1->jsDateField('Fecha de Respuesta','fecha_resp','',0,'d-m-y',"20:00");
$f1->textArea('Descripcion de Respuesta','desc_respuesta',FH_STRING,30,3,"onkeyup=\"proyecto.desc_respuesta.value=proyecto.desc_respuesta.value.toUpperCase();\"");
$f1->textArea('Proyecto Actual','proy_actual',_FH_STRING,30,3,"onkeyup=\"proyecto.proy_actual.value=proyecto.proy_actual.value.toUpperCase();\"");
$f1->textArea('Proyecto Propuesto','proy_propuesto',_FH_STRING,30,3,"onkeyup=\"proyecto.proy_propuesto.value=proyecto.proy_propuesto.value.toUpperCase();\"");
$f1->textArea('Observacion','observacion',_FH_STRING,30,3,"onkeyup=\"proyecto.observacion.value=proyecto.observacion.value.toUpperCase();\"");

$f1->setValue('codigo_dea', $proyecto['codigo_dea']);
$f1->setValue('plantel_nombre', $plantel_nombre['nombre']);
$f1->setValue('fecha_solicitud', $proyecto['fecha_solicitud']);
$f1->setValue('desc_solicitado', $proyecto['desc_solicitado']);
$f1->setValue('responsable', $proyecto['responsable']);
$f1->setValue('fecha_resp', $proyecto['fecha_resp']);
$f1->setValue('desc_respuesta', $proyecto['desc_respuesta']);
$f1->setValue('proy_actual', $proyecto['proy_actual']);
$f1->setValue('proy_propuesto', $proyecto['proy_propuesto']);
$f1->setValue('estatus', $proyecto['estatus']);
$f1->setValue('observacion', $proyecto['observacion']);
$f1->setMask(
   " <tr>\n".
   "   <td> </td>\n".
   "   <td> </td>\n".
   "   <td>%field% %field%</td>\n".
   " </tr>\n"
);
$f1->submitButton('Modificar','modificar');
$f1->resetButton();
$f1->borderStop();
$f1->onCorrect("procesar");


function procesar($d)
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
		bd_modificar_proyecto($d);
		$_SESSION['mensaje']="PROYECTO MODIFICADO CORRECTAMENTE";
		ir("ficha_plantel.php?id=$id_plantel");
	}
}

$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);