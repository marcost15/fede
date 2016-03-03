<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_lista_empresas.php';
include './modelo/bd_lista_personal_inspector.php';
include './modelo/bd_guardar_contrato.php';
include './modelo/bd_ficha_contrato.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_contratos.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$modalidad=array(
'REHABILITACION' => 'REHABILITACION',
'AMPLIACION' => 'AMPLIACION',
'CONSTRUCCION NUEVA' => 'CONSTRUCCION NUEVA'
);

$status=array(
'EN EJECUCION' => 'EN EJECUCION',
'PARALIZADA' => 'PARALIZADA',
'TERMINADA' => 'TERMINADA',
'CERRADA' => 'CERRADA',
'RESCINDIDA' => 'RESCINDIDA'
);

$f1=new FormHandler('contrato',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Agregar Contrato');
if (isset($_REQUEST['cod_dea']))
{
	$cod_dea = $_REQUEST['cod_dea'];
	$plantel_nombre = sql2value("SELECT nombre FROM plantel WHERE cod_dea = '$cod_dea'");
	$f1->textField("CODIGO DEA", "codigo_dea",_FH_STRING,40,40,"readonly=readonly");
	$f1->textField("NOMBRE DEL PLANTEL", "plantel_nombre",_FH_STRING,40,40,"readonly=readonly");
	$f1->setValue('plantel_nombre', $plantel_nombre);
	$f1->setValue('codigo_dea', $cod_dea);
	$f1->textField('Codigo del Contrato','codigo_contrato',FH_STRING,50,255,"onkeyup=\"contrato.codigo_contrato.value=contrato.codigo_contrato.value.toUpperCase();\"");
	$f1->setHelpText('codigo_contrato',"En este campo introduce el Codigo del Contrato");
}
else
{
	$f1->hiddenField('id',$_REQUEST['id']);	
}
$f1->textField('Tiempo de Ejecucion','tiempo_ejec',_FH_STRING,15,11,"onkeyup=\"contrato.tiempo_ejec.value=contrato.tiempo_ejec.value.toUpperCase();\"");
$f1->setHelpText('tiempo_ejec',"En este campo introduce el Tiempo de Ejecucion del Contrato");
$f1->textArea('Descripcion','desc_trabajo',FH_STRING,30,3,"onkeyup=\"contrato.desc_trabajo.value=contrato.desc_trabajo.value.toUpperCase();\"");
$f1->setHelpText('desc_trabajo',"En este campo introduce la Descripcion del Trabajo Realizado");
$f1->textArea('Plan','plan',FH_STRING,30,3,"onkeyup=\"contrato.plan.value=contrato.plan.value.toUpperCase();\"");
$f1->setHelpText('plan',"En este campo introduce el Plan de Ejecucion");
$f1->selectField('Modalidad','modalidad_atencion',$modalidad,FH_NOT_EMPTY,true);
$f1->setHelpText('modalidad_atencion',"Selecciona la Modalidad de Atencion");
$f1->jsDateField('Fecha de Inicio','fecha_inicio','',0,'d-m-y',"20:20");
$f1->setHelpText('fecha_inicio',"Seleccione la Fecha de Inicio del Contrato");
$f1->jsDateField('Fecha de Terminacion','fecha_terminacion','',0,'d-m-y',"20:20");
$f1->setHelpText('fecha_terminacion',"Seleccione la Fecha de Terminacion del Contrato");
$f1->jsDateField('Fecha de Paralizacion','fecha_paralizacion','',0,'d-m-y',"20:00");
$f1->setHelpText('fecha_paralizacion',"Seleccione la Fecha de Paralizacion del Contrato");
$f1->textArea('Motivo Paralizacion','motivo_paralizacion',_FH_STRING,30,3,"onkeyup=\"contrato.motivo_paralizacion.value=contrato.motivo_paralizacion.value.toUpperCase();\"");
$f1->setHelpText('motivo_paralizacion',"En este campo introduce el Motivo de Paralizacion del Contrato");
$f1->jsDateField('Fecha de Reinicio','fecha_reinicio','',0,'d-m-y',"20:20");
$f1->setHelpText('fecha_reinicio',"Seleccione la Fecha de Reinicio del Contrato");
$f1->jsDateField('Fecha de Prorroga','fecha_prorroga','',0,'d-m-y',"20:20");
$f1->setHelpText('fecha_prorroga',"Seleccione la Fecha de Prorroga del Contrato");
$f1->textField('Nro de Dias de Prorroga','nro_dias_prorroga',_FH_DIGIT,5,3);
$f1->setHelpText('nro_dias_prorroga',"En este campo introduce el Numero de Dias para la Prorroga");
$f1->textArea('Motivo Prorroga','motivo_prorroga',_FH_STRING,30,3,"onkeyup=\"contrato.motivo_prorroga.value=contrato.motivo_prorroga.value.toUpperCase();\"");
$f1->setHelpText('motivo_prorroga',"En este campo introduce el Motivo de Prorroga del Contrato");
$f1->jsDateField('Fecha de Culminacion','fecha_culminacion','',0,'d-m-y',"20:20");
$f1->setHelpText('fecha_culminacion',"Seleccione la Fecha de Culminacion del Contrato");
$f1->textField('Monto Val Pagadas','monto_val_pagadas',_FH_FLOAT,15,11);
$f1->setHelpText('monto_val_pagadas',"En este campo introduce el Monto de Valuaciones Pagadas del Contrato");
$f1->textField('% Ejecucion Financiero','poc_ejec_financiero',_FH_FLOAT,7,15);
$f1->setHelpText('poc_ejec_financiero',"En este campo introduce el Porcentaje de Ejecucion Financiero del Contrato. Ejemplo: 95.68");
$f1->textField('% Ejecucion Fisico','poc_ejec_fisico',_FH_FLOAT,7,255);
$f1->setHelpText('poc_ejec_fisico',"En este campo introduce el Porcentaje de Ejecucion Fisico del Contrato. Ejemplo: 70.09");
$f1->selectField('Estatus','estatus',$status,FH_NOT_EMPTY,true);
$f1->setHelpText('estatus',"Seleccione el Estatus del Contrato");
$f1->textField('Monto Contratado','monto_contratado',_FH_FLOAT,15,255);
$f1->setHelpText('monto_contratado',"En este campo introduce el Monto Contratado para Contrato. Ejemplo: 707544.00");
$f1->textField('Aumento','aumento',_FH_DIGIT,15,11);
$f1->setHelpText('aumento',"En este campo introduce el Aumento para Contrato. Ejemplo: 45862.00");
$f1->textField('Empleos Directos','empleos_directos',_FH_DIGIT,7,255);
$f1->setHelpText('empleos_directos',"En este campo introduce el Numero de Empleos Directos del Contrato");
$f1->textField('Empleos Indirectos','empleos_indirectos',_FH_DIGIT,7,255);
$f1->setHelpText('empleos_indirectos',"En este campo introduce el Numero de Empleos Indirectos del Contrato");
$f1->selectField('Empresa','empresa_id',bd_lista_empresas(),FH_NOT_EMPTY,true);
$f1->setHelpText('empresa_id',"Seleccione la Empresa para el Contrato");
$f1->selectField('Ingeniero Inspector','personal_insp',bd_lista_personal_inspector(),FH_NOT_EMPTY,true);
$f1->setHelpText('personal_insp',"Seleccione el Ingeniero Inspector para el Contrato");
$f1->selectField('Ingeniero Residente','ing_residente',bd_lista_personal_residente(),FH_NOT_EMPTY,true);
$f1->setHelpText('ing_residente',"Seleccione el Ingeniero Residente para el Contrato");
$f1->textArea('Observacion','observacion',_FH_STRING,30, 3,"onkeyup=\"contrato.observacion.value=contrato.observacion.value.toUpperCase();\"");
$f1->setHelpText('observacion',"En este campo introduce las Observaciones del Contrato");
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

if (isset($_REQUEST['id']))
{
	$id  = $_REQUEST['id'];
	$contrato = bd_ficha_contrato($id);
	$contrato['fecha_inicio']       = f2f($contrato['fecha_inicio']);
	$contrato['fecha_terminacion']  = f2f($contrato['fecha_terminacion']);
	$contrato['fecha_paralizacion'] = f2f($contrato['fecha_paralizacion']);
	$contrato['fecha_reinicio']     = f2f($contrato['fecha_reinicio']);
	$contrato['fecha_prorroga']     = f2f($contrato['fecha_prorroga']);
	$contrato['fecha_culminacion']  = f2f($contrato['fecha_culminacion']);
	$f1->setValue('tiempo_ejec', $contrato['tiempo_ejec']);
	$f1->setValue('desc_trabajo', $contrato['desc_trabajo']);
	$f1->setValue('plan', $contrato['plan']);
	$f1->setValue('modalidad_atencion', $contrato['modalidad_atencion']);
	$f1->setValue('fecha_inicio', $contrato['fecha_inicio']);
	$f1->setValue('fecha_terminacion', $contrato['fecha_terminacion']);
	$f1->setValue('fecha_paralizacion', $contrato['fecha_paralizacion']);
	$f1->setValue('motivo_paralizacion', $contrato['motivo_paralizacion']);
	$f1->setValue('fecha_reinicio', $contrato['fecha_reinicio']);
	$f1->setValue('fecha_prorroga', $contrato['fecha_prorroga']);
	$f1->setValue('nro_dias_prorroga', $contrato['nro_dias_prorroga']);
	$f1->setValue('motivo_prorroga', $contrato['motivo_prorroga']);
	$f1->setValue('fecha_culminacion', $contrato['fecha_culminacion']);
	$f1->setValue('monto_val_pagadas', $contrato['monto_val_pagadas']);
	$f1->setValue('poc_ejec_financiero', $contrato['poc_ejec_financiero']);
	$f1->setValue('poc_ejec_fisico', $contrato['poc_ejec_fisico']);
	$f1->setValue('estatus', $contrato['estatus']);
	$f1->setValue('observacion', $contrato['observacion']);
	$f1->setValue('monto_contratado', $contrato['monto_contratado']);
	$f1->setValue('aumento', $contrato['aumento']);
	$f1->setValue('empleos_directos', $contrato['empleos_directos']);
	$f1->setValue('empleos_indirectos', $contrato['empleos_indirectos']);
	$f1->setValue('empresa_id', $contrato['empresa_id']);
	$f1->setValue('personal_insp', $contrato['personal_insp']);
	$f1->setValue('ing_residente', $contrato['ing_residente']);
}

function procesar($d)
{
	$bloqueo = false;
	$resp = comparafecha($d['fecha_inicio'],$d['fecha_terminacion']);
	if ($resp == 1)
	{
		$_SESSION['mensaje']="LAS FECHAS NO PUEDE SER PROCESADA PORQUE LA DE INICIO ES MAYOR A LA DE TERMINACION";
		$bloqueo = true;
		return false;
	}
	else
	{
		if (isset($d['fecha_paralizacion']) OR $d['fecha_paralizacion'] <> '00-00-0000')
		{	
			$resp2 = comparafecha($d['fecha_paralizacion'],$d['fecha_reinicio']);
			if ($resp2 == 1)
			{
				$_SESSION['mensaje']="LAS FECHAS DE PARALIZACION NO PUEDE SER PROCESADA PORQUE LA DE INICIO ES MAYOR A LA DE TERMINACION";
				$bloqueo = true;
				return false;
			}
		}
	}
	$d['fecha_inicio'] = f2f($d['fecha_inicio']);
	$d['fecha_terminacion'] = f2f($d['fecha_terminacion']);
	$d['fecha_paralizacion'] = f2f($d['fecha_paralizacion']);
	$d['fecha_reinicio'] = f2f($d['fecha_reinicio']);
	$d['fecha_prorroga'] = f2f($d['fecha_prorroga']);
	$d['fecha_culminacion'] = f2f($d['fecha_culminacion']);
	if ($bloqueo == false)
	{
		if (!isset($_REQUEST['id']))
		{
			$codigo = $d['codigo_contrato'];
			$n=sql2value("SELECT COUNT(*) FROM contratos WHERE codigo_contrato LIKE '$codigo'");
			if ($n==0)
			{
				$cod_dea = $d['codigo_dea'];
				$id_plantel = sql2value("SELECT id FROM plantel WHERE cod_dea = '$cod_dea'");
				bd_guardar_contrato($d);
				$_SESSION['mensaje']="EL CONTRATO FUE REGISTRADO CORRECTAMENTE";
				ir("ficha_plantel.php?id=$id_plantel");
			}
			else
			{
				$_SESSION['mensaje']="EL CODIGO DE CONTRATO YA EXISTE, POR FAVOR VERIFIQUE";
				return false;
			}
		}
		else
		{
			$id = $d['id'];
			$cod_dea = sql2value("SELECT codigo_dea FROM contratos WHERE id = '$id'");
			$id_plantel = sql2value("SELECT id FROM plantel WHERE cod_dea = '$cod_dea'");
			bd_modificar_contrato($d);
			$_SESSION['mensaje']="EL CONTRATO FUE MODIFICADO CORRECTAMENTE";
			ir("ficha_plantel.php?id=$id_plantel");
		}
	}
}

$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);