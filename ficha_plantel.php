<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_ficha_plantel.php';
include './modelo/bd_obt_nivel_educativo.php';
include './modelo/bd_obt_parroquias.php';
include './modelo/bd_obt_municipios.php';
include './modelo/bd_obt_servicios.php';
include './modelo/bd_obt_concejos.php';
include './modelo/bd_obt_empresas.php';
include './modelo/bd_lista_consejos.php';
include './modelo/bd_guardar_plantel_concejo.php';
include './modelo/bd_guardar_plantel_personal.php';
include './modelo/bd_guardar_foto.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('ficha_plantel.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$id = $_REQUEST['id'];

if(isset($_REQUEST['func']))
{
	if($_SESSION['usuario']['nivel_id'] == '1')
	{
		switch($_REQUEST['func'])
		{
		case 'delete':
		enviar_sql("DELETE FROM plantel WHERE id = '$id' LIMIT 1;");
		ir('consmod_plantel.php');
		break;
		case 'delete_servicios':
		$servi_id = $_REQUEST['servi_id'];
		enviar_sql("DELETE FROM plantel_servicios WHERE id = '$servi_id' LIMIT 1;");
		ir("ficha_plantel.php?id=$id");
		break;
		case 'delete_consejo':
		$consejo_id = $_REQUEST['consejo_id'];
		enviar_sql("DELETE FROM plantel_concejo WHERE id = '$consejo_id' LIMIT 1;");
		ir("ficha_plantel.php?id=$id");
		break;
		case 'delete_personal':
		$personal_id = $_REQUEST['personal_id'];
		enviar_sql("DELETE FROM plantel_personal WHERE id = '$personal_id' LIMIT 1;");
		ir("ficha_plantel.php?id=$id");
		break;
		case 'delete_contrato':
		$contrato_id = $_REQUEST['contrato_id'];
		enviar_sql("DELETE FROM contratos WHERE id = '$contrato_id' LIMIT 1;");
		ir("ficha_plantel.php?id=$id");
		break;
		case 'delete_convenio':
		$convenio_id = $_REQUEST['convenio_id'];
		enviar_sql("DELETE FROM convenios WHERE id = '$convenio_id' LIMIT 1;");
		ir("ficha_plantel.php?id=$id");
		case 'delete_proyecto':
		$proyecto_id = $_REQUEST['proyecto_id'];
		enviar_sql("DELETE FROM proyectos WHERE id = '$proyecto_id' LIMIT 1;");
		ir("ficha_plantel.php?id=$id");
		break;
		case 'delete_evaluacion':
		$evaluacion_id = $_REQUEST['evaluacion_id'];
		enviar_sql("DELETE FROM evaluacion_tecnica WHERE id = '$evaluacion_id' LIMIT 1;");
		ir("ficha_plantel.php?id=$id");
		break;
		case 'delete_dotacion':
		$dotacion_id = $_REQUEST['dotacion_id'];
		enviar_sql("DELETE FROM dotacion WHERE id = '$dotacion_id' LIMIT 1;");
		ir("ficha_plantel.php?id=$id");
		break;
		case 'delete_foto':
		$foto_id = $_REQUEST['foto_id'];
		enviar_sql("DELETE FROM fotos WHERE id = '$foto_id' LIMIT 1;");
		ir("ficha_plantel.php?id=$id");
		break;
		}
	}
	else
	{
		$_SESSION['mensaje']="NO TIENE PERMISOS SUFICIENTES PARA ELIMINAR";
		ir("ficha_plantel.php?id=$id");
	}
}

$plantel = bd_ficha_plantel($id);
$cod_dea = $plantel['cod_dea'];
$parro = $plantel['parroquias_id'];
$muni = sql2value("SELECT municipio_id FROM parroquias WHERE id = '$parro'");
$plantel['municipio_id'] = $muni;
$plantel['nivel_id'] = bd_obt_nivel_educativo($plantel['nivel_id']);
$plantel['parroquias_id'] = bd_obt_parroquias($plantel['parroquias_id']);
$plantel['municipio_id'] = bd_obt_municipios($plantel['municipio_id']);


$servicios = sql2array("SELECT id, servicio_id FROM plantel_servicios WHERE plantel_id = '$id'");
foreach ($servicios as $i=>$c)
{
	$servicios[$i]['servicio_id'] = bd_obt_servicios($servicios[$i]['servicio_id']);
}

$consejo = sql2array("SELECT plantel_concejo.id, consejo_comunal.nombre, consejo_comunal.vocero, consejo_comunal.cargo, consejo_comunal.correo, consejo_comunal.telf,
					 plantel_concejo.plantel_id FROM plantel_concejo INNER JOIN consejo_comunal ON plantel_concejo.consejo_id = consejo_comunal.id
					 WHERE plantel_concejo.plantel_id = '$id' ");

$personal = sql2array("SELECT id, cedula, nombre, apellido, correo, telf, tipo FROM plantel_personal WHERE cod_dea = '$cod_dea'");

$contrato = sql2array("SELECT id,codigo_dea,codigo_contrato,modalidad_atencion,empresa_id FROM contratos WHERE codigo_dea = '$cod_dea'");
foreach ($contrato as $i=>$c)
{
	$contrato[$i]['empresa_id'] = bd_obt_empresas($contrato[$i]['empresa_id']);
}

$convenio = sql2array("SELECT id, nro_convenio, descripcion_trabajos, tipo FROM convenios WHERE codigo_dea = '$cod_dea'");

$proyecto = sql2array("SELECT id, responsable, desc_solicitado, estatus FROM proyectos WHERE codigo_dea = '$cod_dea'");

$evaluacion = sql2array("SELECT id, solicitado_por, medio, descripcion_solicitud FROM evaluacion_tecnica WHERE codigo_dea = '$cod_dea'");

$dotacion = sql2array("SELECT id, nro_memo, gerencia, fecha FROM dotacion WHERE codigo_dea = '$cod_dea'");
foreach ($dotacion as $i=>$c)
{
	$dotacion[$i]['fecha'] = f2f($dotacion[$i]['fecha']);
}

$fotos = sql2array("SELECT id, descripcion, foto FROM fotos WHERE tabla = 'PLANTEL' AND tabla_id = '$id'");

////////////////////////////FORMULARIO 1 ////////////////////////////////////////////////////////////////////////////

$f1=new FormHandler('concejo',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->hiddenField('id', $id);
$f1->borderStart('Agregar Consejo Comunal');
$f1->selectField("Consejo Comunal","consejo_id",bd_lista_consejos(),FH_NOT_EMPTY,true);
$f1->submitButton('Agregar');
$f1->borderStop();
$f1->onCorrect('proc_concejo');

function proc_concejo($d)
{
	$id=$d['id'];
	$consejo_id = $d['consejo_id'];
	$n=sql2value("SELECT COUNT(*) FROM plantel_concejo WHERE plantel_id LIKE '$id' AND consejo_id = '$consejo_id'");
	if ($n==0)
	{
		bd_guardar_plantel_concejo($d);
		$_SESSION['mensaje']="CONSEJO COMUNAL AGREGADO CORRECTAMENTE";	
		ir("ficha_plantel.php?id=$id");
	}
	else
	{
		$_SESSION['mensaje']="EL CONSEJO COMUNAL YA FUE AGREGADO, POR FAVOR VERIFIQUE";
		return false;
	}
}

////////////////////////////FORMULARIO 2 ////////////////////////////////////////////////////////////////////////////

$tipo=array(
'DIRECTOR' => 'DIRECTOR',
'SUBDIRECTOR' => 'SUBDIRECTOR',
);

$f2=new FormHandler('plantel_personal',NULL,'onclick="highlight(event)"');
$f2->setLanguage('es');
$star = '<font color="blue">*</font>';
$f2->borderStart('Agregar Personal del Plantel');
$f2->hiddenField('cod_dea', $cod_dea);
$f2->hiddenField('id', $id);
$f2->textField($star.'Cédula','cedula',FH_DIGIT,12,11);
$f2->textField($star.'Nombre','nombre',FH_STRING,30,100,"onkeyup=\"plantel_personal.nombre.value=plantel_personal.nombre.value.toUpperCase();\"");
$f2->textField($star.'Apellido','apellido',FH_STRING,30,100,"onkeyup=\"plantel_personal.apellido.value=plantel_personal.apellido.value.toUpperCase();\"");
$f2->selectField($star.'Tipo','tipo',$tipo,FH_NOT_EMPTY,true);
$f2->textField('Correo','correo',_FH_EMAIL,30,50);
$f2->setHelpText('correo',"En este campo introduce el Correo Electronico");
$f2->textField('Teléfono','telf',_FH_DIGIT,15,11);
$f2->setHelpText('telf',"En este campo introduce el Numero de Telefono. Ejemplo: 04167896541");
$f2->addLine($star ." = Campos Requeridos Obligatoriamente");
$f2->setMask(
   " <tr>\n".
   "   <td> </td>\n".
   "   <td> </td>\n".
   "   <td>%field% %field%</td>\n".
   " </tr>\n"
);
$f2->submitButton('Registrar','registrar');
$f2->resetButton();
$f2->borderStop();
$f2->onCorrect("procesar_personal");

function procesar_personal($d)
{
	$id=$d['id'];
	$cedula=$d['cedula'];
	$cod_dea=$d['cod_dea'];
	$tipo=$d['tipo'];
	$n=sql2value("SELECT COUNT(*) FROM plantel_personal WHERE cedula LIKE '$cedula'");
	if ($n==0)
	{	
		$n=sql2value("SELECT COUNT(*) FROM plantel_personal WHERE cod_dea LIKE '$cod_dea' and tipo = '$tipo'");
		if ($n==0)
		{
			bd_guardar_plantel_personal($d);
			$_SESSION['mensaje']="PERSONAL AGREGADO CORRECTAMENTE";	
			ir("ficha_plantel.php?id=$id");
		}
		else
		{
			$_SESSION['mensaje']="YA EXISTE EL PERSONAL EN ESE PLANTEL VERIFIQUE POR FAVOR";
			return false;
		}
	}
	else
	{
		$_SESSION['mensaje']="LA CEDULA YA EXISTE, POR FAVOR INTRODUZCA UNA NUEVA";
		return false;
	}	
}

////////////////////////////FORMULARIO 3 ////////////////////////////////////////////////////////////////////////////
$foto = array(
  "path"        => './upload',
  "type" 		=> "JPG jpg JPEG jpeg GIF gif PNG png BMP bmp",
  "required"    => false,
  "exists"      => "overwrite"
);

$f3 = new FormHandler('plantel_fotos');
$f3->borderStart('Fotos');
$f3->hiddenField('tabla_id', $id);
$f3->uploadField('Foto', 'foto', $foto);
$f3->textField('Descripcion','descripcion',FH_STRING,50,255);
$f3->hiddenField('tipo', 'PLANTEL');
$f3->submitButton('Agregar Foto','registrar');
$f3->borderStop();
$f3->onCorrect('proc_plantel_fotos');

function proc_plantel_fotos($d)
{
	bd_guardar_foto($d);
	$_SESSION['mensaje']="FOTO AGREGADA CORRECTAMENTE";
	$id = $d['tabla_id'];
	ir("ficha_plantel.php?id=$id");
}

////////////////////////////FORMULARIOS  ////////////////////////////////////////////////////////////////////////////

$smarty->assign('ficha',$plantel);
$smarty->assign('servicios',$servicios);
$smarty->assign('consejo',$consejo);
$smarty->assign('personal',$personal);
$smarty->assign('contrato',$contrato);
$smarty->assign('convenio',$convenio);
$smarty->assign('proyecto',$proyecto);
$smarty->assign('evaluacion',$evaluacion);
$smarty->assign('dotacion',$dotacion);
$smarty->assign('fotos',$fotos);
$smarty->assign('f1',$f1->flush(true));
$smarty->assign('f2',$f2->flush(true));
$smarty->assign('f3',$f3->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);
unset($_SESSION['mensaje']);