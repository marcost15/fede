<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_ficha_empresa.php';
include './modelo/bd_modificar_empresa.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('modificar_empresa.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$id = $_REQUEST['id'];
$empresa = bd_ficha_empresa($id);

$f1=new FormHandler('empresa',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$star = '<font color="blue">*</font>';
$f1->borderStart('Modificar Empresa');
$f1->hiddenField('id', $id);
$f1->textField($star.'Rif','rif',FH_STRING,15,20,"onkeyup=\"empresa.rif.value=empresa.rif.value.toUpperCase();\"");
$f1->textField($star.'Nombre','nombre',FH_STRING,50,100,"onkeyup=\"empresa.nombre.value=empresa.nombre.value.toUpperCase();\"");
$f1->textField('Teléfono','tlf',_FH_DIGIT,15,11);
$f1->textField($star.'Representante Legal','repre_legal',FH_STRING,50,100,"onkeyup=\"empresa.repre_legal.value=empresa.repre_legal.value.toUpperCase();\"");
$f1->textField($star.'Cédula','cedula',FH_DIGIT,12,11);
$f1->textField('Teléfono Representante','tlf_repre',_FH_DIGIT,15,11);
$f1->textField('Correo','correo',_FH_EMAIL,30,50);
$f1->addLine($star ." = Campos Requeridos Obligatoriamente");

$f1->setValue('nombre', $empresa['nombre']);
$f1->setValue('rif', $empresa['rif']);
$f1->setValue('tlf', $empresa['tlf']);
$f1->setValue('repre_legal', $empresa['repre_legal']);
$f1->setValue('cedula', $empresa['cedula']);
$f1->setValue('tlf_repre', $empresa['tlf_repre']);
$f1->setValue('correo', $empresa['correo']);

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
		bd_modificar_empresa($d);
		?>
				<script type="text/javascript">
				window.alert('EMPRESA MODIFICADA CORRECTAMENTE');
				location.href='consmod_empresa.php';
				</script>
		<?php
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);