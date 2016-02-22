<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_guardar_foto.php';
include './modelo/bd_ficha_evaluacion.php';
include './modelo/bd_obt_niveles.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('ficha_evaluacion.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
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
			ir("ficha_evaluacion.php?id=$id");
			break;
		}
	}
	else
	{
		$_SESSION['mensaje']="NO TIENE PERMISOS SUFICIENTES PARA ELIMINAR";
		ir("ficha_evaluacion.php?id=$id");
	}	
}

$evaluacion = bd_ficha_evaluacion($_REQUEST['id']);
$evaluacion['fecha_solicitud'] = f2f($evaluacion['fecha_solicitud']);
$evaluacion['fecha_entrega'] = f2f($evaluacion['fecha_entrega']);
$evaluacion['fecha_respuesta'] = f2f($evaluacion['fecha_respuesta']);
$cod_dea = $evaluacion['codigo_dea'];
$evaluacion['plantel_nombre'] = sql2value("SELECT nombre FROM plantel WHERE cod_dea = '$cod_dea'");

$fotos = sql2array("SELECT * FROM fotos WHERE tabla_id = '$id' AND tabla = 'EVALUACION'");

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
$f3->hiddenField('tipo', 'EVALUACION');
$f3->submitButton('Agregar Foto','registrar');
$f3->borderStop();
$f3->onCorrect('proc_plantel_fotos');

function proc_plantel_fotos($d)
{
	bd_guardar_foto($d);
	$_SESSION['mensaje']="FOTO AGREGADA CORRECTAMENTE";
	$id = $d['tabla_id'];
	ir("ficha_evaluacion.php?id=$id");
}

$smarty->assign('ficha',$evaluacion);
$smarty->assign('fotos',$fotos);
$smarty->assign('f3',$f3->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);