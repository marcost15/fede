<?php
session_start();
include './configs/smarty.php';
include './configs/bd.php';
include './configs/fh3.php';
include './configs/funciones.php';
include './modelo/bd_ficha_dotacion.php';
include './modelo/bd_guardar_foto.php';
include './modelo/bd_guardar_dotacion.php';
include './modelo/bd_obt_niveles.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('ficha_dotacion.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
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
			ir("ficha_dotacion.php?id=$id");
			break;
			case 'delete_mobiliario':
			$mobiliario_id = $_REQUEST['mobiliario_id'];
			enviar_sql("DELETE FROM dotacion_mobiliario WHERE id = '$mobiliario_id' LIMIT 1;");
			ir("ficha_dotacion.php?id=$id");
			break;
		}
	}
	else
	{
		$_SESSION['mensaje']="NO TIENE PERMISOS SUFICIENTES PARA ELIMINAR";
		ir("ficha_dotacion.php?id=$id");
	}
}

$dotacion = bd_ficha_dotacion($_REQUEST['id']);
$dotacion['fecha'] = f2f($dotacion['fecha']);
$dotacion['fecha_dotacion'] = f2f($dotacion['fecha_dotacion']);
$mobiliario = sql2array("SELECT * FROM dotacion_mobiliario WHERE dotacion_id ='$id'");
$fotos = sql2array("SELECT * FROM fotos WHERE tabla_id = '$id' AND tabla = 'DOTACION'");

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
$f3->hiddenField('tipo', 'DOTACION');
$f3->submitButton('Agregar Foto','registrar');
$f3->borderStop();
$f3->onCorrect('proc_plantel_fotos');

function proc_plantel_fotos($d)
{
	bd_guardar_foto($d);
	$_SESSION['mensaje']="FOTO AGREGADA CORRECTAMENTE";
	$id = $d['tabla_id'];
	ir("ficha_dotacion.php?id=$id");
}

$tipo=array(
'S' => 'SOLICITUD'
);
$tipo2=array(
'D' => 'DOTADO'
);

$f2=new FormHandler('dotacion_mobiliario',NULL,'onclick="highlight(event)"');
$f2->setLanguage('es');
$f2->borderStart('Agregar Mobiliario');
$f2->hiddenField('tabla_id', $id);
$f2->textField('Descripcion','descripcion_mobi',FH_STRING,50,100,"onkeyup=\"dotacion_mobiliario.descripcion_mobi.value=dotacion_mobiliario.descripcion_mobi.value.toUpperCase();\"");
$f2->setHelpText('descripcion_mobi',"En este campo introduce la Descripcion del Mobiliario Solicitado/Dotado");
$f2->selectField('Tipo','tipo',$tipo,FH_NOT_EMPTY,true);
$f2->RadioButton("Solicitud", "tipo", $tipo);
$f2->setHelpText('tipo',"Seleccione si el Mobiliario fue Solicitado");
$f2->RadioButton("Dotado", "tipo2", $tipo2);
$f2->setHelpText('tipo2',"Seleccione si el Mobiliario fue Dotado");
$f2->textField('Tipo Mobiliario','tipo_mobiliario',FH_STRING,20,255,"onkeyup=\"dotacion_mobiliario.tipo_mobiliario.value=dotacion_mobiliario.tipo_mobiliario.value.toUpperCase();\"");
$f2->setHelpText('tipo_mobiliario',"En este campo introduce el tipo del Mobiliario Solicitado/Dotado");
$f2->textField('Empresa','empresa',_FH_STRING,50,100,"onkeyup=\"dotacion_mobiliario.empresa.value=dotacion_mobiliario.empresa.value.toUpperCase();\"");
$f2->setHelpText('empresa',"En este campo introduce el nombre de la Empresa donde se adquirio el Mobiliario");
$f2->textField('Monto','monto',_FH_FLOAT,10,10);
$f2->setHelpText('monto',"En este campo introduce el Monto cancelado a la Empresa donde se adquirio el Mobiliario");
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
$f2->onCorrect("procesar_mobiliario");

function procesar_mobiliario($d)
{
	bd_guardar_dotacion_mobiliario($d);
	$_SESSION['mensaje']="MOBILIARIO AGREGADO CORRECTAMENTE";
	$id = $d['tabla_id'];
	ir("ficha_dotacion.php?id=$id");
}


$smarty->assign('ficha',$dotacion);
$smarty->assign('mobiliario',$mobiliario);
$smarty->assign('fotos',$fotos);
$smarty->assign('f3',$f3->flush(true));
$smarty->assign('f2',$f2->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);