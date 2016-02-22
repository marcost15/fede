<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_guardar_convenio.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_convenio.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
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

$f1=new FormHandler('convenios',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Agregar convenio');
$cod_dea = $_REQUEST['cod_dea'];
$plantel_nombre = sql2value("SELECT nombre FROM plantel WHERE cod_dea = '$cod_dea'");
$f1->textField("CODIGO DEA", "codigo_dea",_FH_STRING,40,40,"readonly=readonly");
$f1->textField("NOMBRE DEL PLANTEL", "plantel_nombre",_FH_STRING,40,40,"readonly=readonly");
$f1->setValue('plantel_nombre', $plantel_nombre);
$f1->setValue('codigo_dea', $cod_dea);
$f1->textField('Nro Convenio','nro_convenio',FH_STRING,50,255,"onkeyup=\"convenios.nro_convenio.value=convenios.nro_convenio.value.toUpperCase();\"");
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
		$codigo=$d['nro_convenio'];
		$n=sql2value("SELECT COUNT(*) FROM convenios WHERE nro_convenio LIKE '$codigo'");
		if ($n==0)
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
					bd_guardar_convenio($d);
					$_SESSION['mensaje']="CONVENIO REGISTRADO CORRECTAMENTE";
					ir("ficha_plantel.php?id=$id_plantel");
				}
			}
		}
		else
		{
			$_SESSION['mensaje']="EL CONVENIO YA EXISTE, POR FAVOR INTRODUZCA UNO NUEVO";
			return false;
		}
}

$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);