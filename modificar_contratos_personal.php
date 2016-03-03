<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_modificar_contrato_personal.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('modificar_contratos_personal.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$tipo=array(
'INSPECTOR' => 'INSPECTOR',
'RESIDENTE' => 'RESIDENTE',

);
$modalidad=array(
'COORDINACION TRUJILLO' => 'COORDINACION TRUJILLO',
'INSP_CONTRATADA' => 'INSPECCION CONTRATADA',
);

$id = $_REQUEST['id'];
$personal = sql2row("SELECT * FROM personal_inspector WHERE id = '$id'");

$f1=new FormHandler('contrato_personal',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$star = '<font color="blue">*</font>';
$f1->borderStart('Modificar Ing Inspector / Residente');
$f1->selectField($star.'Tipo','tipo',$tipo,FH_NOT_EMPTY,true);
$f1->textField($star.'Cédula','cedula',FH_DIGIT,12,11);
$f1->textField($star.'CIV','civ',FH_STRING,12,11,"onkeyup=\"contrato_personal.civ.value=contrato_personal.civ.value.toUpperCase();\"");
$f1->textField($star.'Nombre','nombre',FH_STRING,50,100,"onkeyup=\"contrato_personal.nombre.value=contrato_personal.nombre.value.toUpperCase();\"");
$f1->textField($star.'Apellido','apellido',FH_STRING,50,100,"onkeyup=\"contrato_personal.apellido.value=contrato_personal.apellido.value.toUpperCase();\"");
$f1->textField('Teléfono','tlf',_FH_DIGIT,15,11);
$f1->textField('Correo','correo',_FH_EMAIL,30,50,"onkeyup=\"contrato_personal.correo.value=contrato_personal.correo.value.toUpperCase();\"");
$f1->selectField('Modalidad','modalidad',$modalidad,FH_NOT_EMPTY,true);
$f1->hiddenField('id', $personal['id']);
$f1->setValue('tipo', $personal['tipo']);
$f1->setValue('cedula', $personal['cedula']);
$f1->setValue('civ', $personal['civ']);
$f1->setValue('nombre', $personal['nombre']);
$f1->setValue('apellido', $personal['apellido']);
$f1->setValue('tlf', $personal['tlf']);
$f1->setValue('correo', $personal['correo']);
$f1->setValue('modalidad', $personal['modalidad']);
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

function procesar($d)
{
	bd_modificar_contrato_personal($d);
	?>
		<script type="text/javascript">
		window.alert('ING MODIFICADO CORRECTAMENTE');
		location.href='consmod_personal_inspector.php';
		</script>
	<?php
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);