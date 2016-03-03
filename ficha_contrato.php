<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_guardar_foto.php';
include './modelo/bd_ficha_contrato.php';
include './modelo/bd_ficha_empresa.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('ficha_contrato.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
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
			case 'delete_foto':
			$foto_id = $_REQUEST['foto_id'];
			enviar_sql("DELETE FROM fotos WHERE id = '$foto_id' LIMIT 1;");
			ir("ficha_contrato.php?id=$id");
			break;
		}
	}
	else
	{
		$_SESSION['mensaje']="NO TIENE PERMISOS SUFICIENTES PARA ELIMINAR";
		ir("ficha_contrato.php?id=$id");
	}
}

$contrato = bd_ficha_contrato($_REQUEST['id']);
$cod_dea = $contrato['codigo_dea'];
$contrato['nombre_plantel'] = sql2value("SELECT nombre FROM plantel WHERE cod_dea = '$cod_dea'");
$contrato['fecha_inicio'] = f2f($contrato['fecha_inicio']);
$contrato['fecha_terminacion'] = f2f($contrato['fecha_terminacion']);
$contrato['fecha_paralizacion'] = f2f($contrato['fecha_paralizacion']);
$contrato['fecha_reinicio'] = f2f($contrato['fecha_reinicio']);
$contrato['fecha_prorroga'] = f2f($contrato['fecha_prorroga']);
$contrato['fecha_culminacion'] = f2f($contrato['fecha_culminacion']);

$empresa_id = $contrato['empresa_id'];
$empresa = bd_ficha_empresa($empresa_id);
$personal_insp = $contrato['personal_insp'];
$ing_residente = $contrato['ing_residente'];
$inspector = sql2row("SELECT * FROM personal_inspector WHERE id = '$personal_insp'");
$ing_residente = sql2row("SELECT * FROM personal_inspector WHERE id = '$ing_residente'");

$fotos = sql2array("SELECT * FROM fotos WHERE tabla_id = '$id' AND tabla = 'CONTRATACION'");

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
$f3->hiddenField('tipo', 'CONTRATACION');
$f3->submitButton('Agregar Foto','registrar');
$f3->borderStop();
$f3->onCorrect('proc_plantel_fotos');

function proc_plantel_fotos($d)
{
	bd_guardar_foto($d);
	$_SESSION['mensaje']="FOTO AGREGADA CORRECTAMENTE";
	$id = $d['tabla_id'];
	ir("ficha_contrato.php?id=$id");
}

$smarty->assign('ficha',$contrato);
$smarty->assign('fotos',$fotos);
$smarty->assign('empresa',$empresa);
$smarty->assign('inspector',$inspector);
$smarty->assign('ing_residente',$ing_residente);
$smarty->assign('f3',$f3->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);