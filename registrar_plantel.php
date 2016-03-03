<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_lista_municipios.php';
include './modelo/bd_lista_servicios.php';
include './modelo/bd_lista_consejos.php';
include './modelo/bd_lista_nivel_educativo.php';
include './modelo/bd_obt_nivel_educativo.php';
include './modelo/bd_obt_parroquias.php';
include './modelo/bd_guardar_plantel.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('registrar_plantel.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$dependencia=array(
'NACIONAL' => 'NACIONAL',
'ESTADAL' => 'ESTADAL',
'PRIVADOS' => 'PRIVADOS',
'SUBVENCIONADOS' => 'SUBVENCIONADOS'
);

$f1=new FormHandler('plantel',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$star = '<font color="blue">*</font>';
$f1->borderStart('Agregar Plantel');
$f1->textField('Nombre','nombre',FH_STRING,55,100,"onkeyup=\"plantel.nombre.value=plantel.nombre.value.toUpperCase();\"");
$f1->setHelpText('nombre',"En este campo introduce el Nombre del plantel");
$f1->textField('Codigo DEA','cod_dea',FH_STRING,25,10,"onkeyup=\"plantel.cod_dea.value=plantel.cod_dea.value.toUpperCase();\"");
$f1->setHelpText('cod_dea',"En este campo introduce el Codigo DEA del plantel. Ejemplo: OD10862101");
$f1->textField('Codigo Dependencia','cod_dependencia',_FH_STRING,25,50,"onkeyup=\"plantel.cod_dependencia.value=plantel.cod_dependencia.value.toUpperCase();\"");
$f1->setHelpText('cod_dependencia',"En este campo introduce el Codigo de Dependencia del plantel");
$f1->textField('Codigo Estadistico','cod_estadistico',_FH_STRING,25,50,"onkeyup=\"plantel.cod_estadistico.value=plantel.cod_estadistico.value.toUpperCase();\"");
$f1->setHelpText('cod_estadistico',"En este campo introduce el Codigo de Estadistico del plantel. Ejemplo: 211664");
$f1->textField('Matricula','matricula',_FH_DIGIT,7,6);
$f1->setHelpText('matricula',"En este campo introduce la Matricula de alumnos del plantel");
$f1->textField('Nro de Aulas','nro_aulas',_FH_DIGIT,7,6);
$f1->setHelpText('nro_aulas',"En este campo introduce el Numero de Aulas del plantel");
$f1->textArea('Direccion','direccion',FH_STRING,38,3,"onkeyup=\"plantel.direccion.value=plantel.direccion.value.toUpperCase();\"");
$f1->setHelpText('direccion',"En este campo introduce la Direccion del plantel");
$f1->textField('Coordenadas Latitud','coordenadas_latitud',_FH_STRING,25,30,"onkeyup=\"plantel.coordenadas_latitud.value=plantel.coordenadas_latitud.value.toUpperCase();\"");
$f1->setHelpText('coordenadas_latitud',"En este campo introduce las coordenadas en formato 000°00'00''");
$f1->textField('Coordenadas Longitud','coordenadas_longitud',_FH_STRING,25,30,"onkeyup=\"plantel.coordenadas_longitud.value=plantel.coordenadas_longitud.value.toUpperCase();\"");
$f1->setHelpText('coordenadas_longitud',"En este campo introduce las coordenadas en formato 000°00'00''");
$f1->textField('Coordenadas Altitud','coordenadas_altitud',_FH_STRING,25,30,"onkeyup=\"plantel.coordenadas_altitud.value=plantel.coordenadas_altitud.value.toUpperCase();\"");
$f1->setHelpText('coordenadas_altitud',"En este campo introduce las Coordenadas Altitud");
$f1->textArea('Caracteristicas','caracteristicas',_FH_STRING,38,3,"onkeyup=\"plantel.caracteristicas.value=plantel.caracteristicas.value.toUpperCase();\"");
$f1->setHelpText('caracteristicas',"En este campo introduce las Caracteristicas del plantel");
$f1->selectField('Dependencia','dependencia',$dependencia,FH_NOT_EMPTY,true);
$f1->setHelpText('dependencia',"Selecciona la Dependencia del plantel");
$f1->textField('Teléfono','telf',_FH_DIGIT,15,11);
$f1->setHelpText('telf',"En este campo introduce el Numero de Telefono asociado al plantel. Ejemplo: 02722365412");
$f1->selectField($star."Municipio", "municipio",bd_lista_municipios(),"validaselect",true);
$f1->selectField($star."Parroquias", "parroquias_id", array(),"validaselect",true);
$f1->linkSelectFields("casiajax.php", "municipio", "parroquias_id");
$f1->selectField('Nivel Educativo','nivel_id',bd_lista_nivel_educativo(),FH_NOT_EMPTY,true);
$f1->setHelpText('nivel_id',"Selecciona el Nivel Educativo");
$f1->ListField("Servicios", "servicios", bd_lista_servicios(),'',true,'SELECCIONADOS','DISPONIBLE',5);
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
	$cod_dea=$d['cod_dea'];
	$n=sql2value("SELECT COUNT(*) FROM plantel WHERE cod_dea LIKE '$cod_dea'");
	if ($n == 0)
	{
		$_SESSION['mensaje']="PLANTEL REGISTRADO EXITOSAMENTE";
		bd_guardar_plantel($d);
		ir("registrar_plantel.php");
	}
	else
	{
		$_SESSION['mensaje']="EL CODIGO DEA YA EXISTE, POR FAVOR INTRODUZCA UNO NUEVO";
		return false;
	}
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
unset($_SESSION['mensaje']);