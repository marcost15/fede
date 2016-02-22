<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_guardar_consejo.php';
include './modelo/bd_modificar_consejo.php';
include './modelo/bd_ficha_consejo.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_consejo.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$f1=new FormHandler('consejo_comunal',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$star = '<font color="blue">*</font>';
$f1->borderStart('Agregar Consejo Comunal');
$f1->textField($star.'Razon Social','nombre',FH_STRING,50,100,"onkeyup=\"consejo_comunal.nombre.value=consejo_comunal.nombre.value.toUpperCase();\"");
$f1->textField($star.'Vocero','vocero',FH_STRING,30,35,"onkeyup=\"consejo_comunal.vocero.value=consejo_comunal.vocero.value.toUpperCase();\"");
$f1->textField($star.'Cargo','cargo',FH_STRING,30,35,"onkeyup=\"consejo_comunal.cargo.value=consejo_comunal.cargo.value.toUpperCase();\"");
$f1->textField('Correo','correo',_FH_EMAIL,30,50);
$f1->textField('Teléfono','telf',_FH_DIGIT,15,11);
$f1->addLine($star ." = Campos Requeridos Obligatoriamente");
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
	$id = $_REQUEST['id'];
	$solicitudes = bd_ficha_consejo($id);
	$f1->hiddenField('id', $solicitudes['id']);
	$f1->setValue('nombre', $solicitudes['nombre']);
	$f1->setValue('vocero', $solicitudes['vocero']);
	$f1->setValue('cargo', $solicitudes['cargo']);
	$f1->setValue('correo', $solicitudes['correo']);
	$f1->setValue('telf', $solicitudes['telf']);
}

function procesar($d)
{
	if (isset($_REQUEST['id']))
	{
		bd_modificar_consejo($d);
		?>
				<script type="text/javascript">
				window.alert('CONSEJO MODIFICADO CORRECTAMENTE');
				location.href='registrar_consejo.php';
				</script>
		<?php
	}
	else
	{
		$nombre=$d['nombre'];
		$n=sql2value("SELECT COUNT(*) FROM consejo_comunal WHERE nombre LIKE '$nombre'");
		if ($n==0)
		{
				bd_guardar_consejo($d);
				$_SESSION['mensaje']="CONSEJO COMUNAL REGISTRADO CORRECTAMENTE";	
		}
		else
		{
			$_SESSION['mensaje']="EL NOMBRE YA EXISTE, POR FAVOR INTRODUZCA UNO NUEVO";
			return false;
		}
		ir('registrar_consejo.php');
	}
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);