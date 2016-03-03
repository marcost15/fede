<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_modificar_convenio.php';
include './modelo/bd_ficha_convenio.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('modificar_convenio.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$tipo=array(
'PREVENTIVO' => 'PREVENTIVO',
'CORRECTIVO' => 'CORRECTIVO',
'INTERINSTITUCIONAL' => 'INTERINSTITUCIONAL'
);

$status=array(
'EN EJECUCION' => 'EN EJECUCION',
'PARALIZADA' => 'PARALIZADA',
'TERMINADA' => 'TERMINADA',
'CERRADA' => 'CERRADA',
'RESCINDIDA' => 'RESCINDIDA'
);

$convenio = bd_ficha_convenio($_REQUEST['id']);
$id = $_REQUEST['id'];
$nr_convenio = $convenio['nro_convenio'];
$cod_dea = $convenio['codigo_dea'];
$plantel_nombre = sql2row("SELECT nombre FROM plantel WHERE cod_dea = '$cod_dea'");
$convenio['fecha_inicio'] = f2f($convenio['fecha_inicio']);
$convenio['fecha_terminacion'] = f2f($convenio['fecha_terminacion']);
$convenio['fecha_paralizacion'] = f2f($convenio['fecha_paralizacion']);
$convenio['fecha_reinicio'] = f2f($convenio['fecha_reinicio']);

$f1=new FormHandler('convenios',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Modificar Convenio');
$f1->hiddenField('id', $id);
$f1->textField("Codigo DEA", "codigo_dea",FH_STRING,15,20,"readonly=readonly");
$f1->textField("Plantel", "plantel_nombre",_FH_STRING,40,40,"readonly=readonly");
$f1->textField('Nro Convenio','nro_convenio',FH_STRING,50,255,"readonly=readonly");
$f1->textArea('Ejecutor','ejecutor',FH_STRING,30,3,"onkeyup=\"convenios.ejecutor.value=convenios.ejecutor.value.toUpperCase();\"");
$f1->textField('Monto','monto',FH_FLOAT,20,255);
$f1->selectField('Tipo','tipo',$tipo,FH_NOT_EMPTY,true);
$f1->jsDateField('Fecha de Inicio','fecha_inicio','',0,'d-m-y',"20:00");
$f1->jsDateField('Fecha de Terminacion','fecha_terminacion','',0,'d-m-y',"20:00");
$f1->jsDateField('Fecha de Paralizacion','fecha_paralizacion','',0,'d-m-y',"20:00");
$f1->textArea('Motivo Paralizacion','motivo_paralizacion',_FH_STRING,30,3,"onkeyup=\"convenios.motivo_paralizacion.value=convenios.motivo_paralizacion.value.toUpperCase();\"");
$f1->jsDateField('Fecha de Reinicio','fecha_reinicio','',0,'d-m-y',"20:00");
$f1->selectField('Estatus','estatus',$status,FH_NOT_EMPTY,true);
$f1->textArea('Plan','plan',_FH_STRING,30,3,"onkeyup=\"convenios.plan.value=convenios.plan.value.toUpperCase();\"");
$f1->textArea('Descripcion','descripcion_trabajos',_FH_STRING,30,3,"onkeyup=\"convenios.descripcion_trabajos.value=convenios.descripcion_trabajos.value.toUpperCase();\"");
$f1->textArea('Observacion','observacion',_FH_STRING,30,3,"onkeyup=\"convenios.observacion.value=convenios.observacion.value.toUpperCase();\"");

$f1->setValue('codigo_dea', $convenio['codigo_dea']);
$f1->setValue('plantel_nombre', $plantel_nombre['nombre']);
$f1->setValue('nro_convenio', $convenio['nro_convenio']);
$f1->setValue('ejecutor', $convenio['ejecutor']);
$f1->setValue('monto', $convenio['monto']);
$f1->setValue('tipo', $convenio['tipo']);
$f1->setValue('fecha_inicio', $convenio['fecha_inicio']);
$f1->setValue('fecha_terminacion', $convenio['fecha_terminacion']);
$f1->setValue('fecha_paralizacion', $convenio['fecha_paralizacion']);
$f1->setValue('fecha_reinicio', $convenio['fecha_reinicio']);
$f1->setValue('estatus', $convenio['estatus']);
$f1->setValue('plan', $convenio['plan']);
$f1->setValue('descripcion_trabajos', $convenio['descripcion_trabajos']);
$f1->setValue('observacion', $convenio['observacion']);
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
	$resp = comparafecha($d['fecha_inicio'],$d['fecha_terminacion']);
	if ($resp == 1)
	{
		$_SESSION['mensaje']="LAS FECHAS NO PUEDE SER PROCESADA PORQUE LA DE INICIO ES MAYOR A LA DE TERMINACION";
		return false;
	}
	else
	{
		$resp = comparafecha($d['fecha_paralizacion'],$d['fecha_reinicio']);
		if ($resp == 1)
		{
			$_SESSION['mensaje']="LAS FECHAS NO PUEDE SER PROCESADA PORQUE LA DE PARALIZACION ES MAYOR A LA DE REINICIO";
			return false;
		}
		else
		{
			$cod_dea = $d['codigo_dea'];
			$id_plantel = sql2value("SELECT id FROM plantel WHERE cod_dea = '$cod_dea'");
			$d['fecha_inicio'] = f2f($d['fecha_inicio']);
			$d['fecha_terminacion'] = f2f($d['fecha_terminacion']);
			$d['fecha_paralizacion'] = f2f($d['fecha_paralizacion']);
			$d['fecha_reinicio'] = f2f($d['fecha_reinicio']);
			bd_modificar_convenio($d);
			$_SESSION['mensaje']="CONVENIO MODIFICADO CORRECTAMENTE";
			ir("ficha_plantel.php?id=$id_plantel");
		}
	}
}

$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);