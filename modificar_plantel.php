<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_ficha_plantel.php';
include './modelo/bd_lista_municipios.php';
include './modelo/bd_lista_nivel_educativo.php';
include './modelo/bd_lista_servicios.php';
include './modelo/bd_lista_parroquias.php';
include './modelo/bd_obt_municipios.php';
include './modelo/bd_obt_parroquias.php';
include './modelo/bd_lista_niveles.php';
include './modelo/bd_modificar_plantel.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('modificar_plantel.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$dependencia=array(
'NACIONAL' => 'Conceder el acceso',
'ESTADAL' => 'Conceder el acceso',
'PRIVADOS' => 'Conceder el acceso',
'SUBVENCIONADOS' => 'Conceder el acceso'
);

$dependencia=array(
'NACIONAL' => 'NACIONAL',
'ESTADAL' => 'ESTADAL',
'PRIVADOS' => 'PRIVADOS',
'SUBVENCIONADOS' => 'SUBVENCIONADOS'
);

$id = $_REQUEST['id'];
$plantel = bd_ficha_plantel($id);
$parro = $plantel['parroquias_id'];
$muni = sql2value("SELECT municipio_id FROM parroquias WHERE id = '$parro'");
$plantel['municipio_id'] = $muni;
$servicios = sql2array("SELECT servicio_id FROM plantel_servicios WHERE plantel_id = '$id'");
foreach($servicios as $i=>$m)
{
	$servicios[$i] = $servicios[$i]['servicio_id'];
}

$f1=new FormHandler('plantel',NULL,'onclick="highlight(event)"');
$f1->setLanguage('es');
$f1->borderStart('Modificar Plantel');
$f1->textField('Codigo DEA','cod_dea',FH_STRING,25,50,"readonly=readonly");
$f1->textField('Nombre','nombre',FH_STRING,55,100,"onkeyup=\"plantel.nombre.value=plantel.nombre.value.toUpperCase();\"");
$f1->textField('Codigo Dependencia','cod_dependencia',_FH_STRING,25,50,"onkeyup=\"plantel.cod_dependencia.value=plantel.cod_dependencia.value.toUpperCase();\"");
$f1->textField('Codigo Estadistico','cod_estadistico',_FH_STRING,25,50,"onkeyup=\"plantel.cod_estadistico.value=plantel.cod_estadistico.value.toUpperCase();\"");
$f1->textField('Matricula','matricula',_FH_DIGIT,7,6);
$f1->textField('Nro de Aulas','nro_aulas',_FH_DIGIT,7,6);
$f1->textArea('Direccion','direccion',FH_STRING,38,3,"onkeyup=\"plantel.direccion.value=plantel.direccion.value.toUpperCase();\"");
$f1->textField('Coordenadas Latitud','coordenadas_latitud',_FH_STRING,25,30,"onkeyup=\"plantel.coordenadas_latitud.value=plantel.coordenadas_latitud.value.toUpperCase();\"");
$f1->textField('Coordenadas Longitud','coordenadas_longitud',_FH_STRING,25,30,"onkeyup=\"plantel.coordenadas_longitud.value=plantel.coordenadas_longitud.value.toUpperCase();\"");
$f1->textField('Coordenadas Altitud','coordenadas_altitud',_FH_STRING,25,30,"onkeyup=\"plantel.coordenadas_altitud.value=plantel.coordenadas_altitud.value.toUpperCase();\"");
$f1->textArea('Caracteristicas','caracteristicas',_FH_STRING,38,3,"onkeyup=\"plantel.caracteristicas.value=plantel.caracteristicas.value.toUpperCase();\"");
$f1->selectField('Dependencia','dependencia',$dependencia,FH_NOT_EMPTY,true);
$f1->textField('Teléfono','telf',_FH_DIGIT,15,11);
$f1->selectField("Municipio", "municipio",bd_lista_municipios(),"validaselect",true);
$f1->selectField("Parroquias", "parroquias_id", array(),"validaselect",true);
$f1->linkSelectFields("casiajax.php", "municipio", "parroquias_id");
$f1->selectField('Nivel Educativo','nivel_id',bd_lista_nivel_educativo(),FH_NOT_EMPTY,true);
$f1->ListField("Servicios", "servicios", bd_lista_servicios(),'',true,'SELECCIONADOS','DISPONIBLE',5);

$f1->hiddenField('id', $id);
$f1->setValue('nombre', $plantel['nombre']);
$f1->setValue('cod_dea', $plantel['cod_dea']);
$f1->setValue('cod_dependencia', $plantel['cod_dependencia']);
$f1->setValue('cod_estadistico', $plantel['cod_estadistico']);
$f1->setValue('direccion', $plantel['direccion']);
$f1->setValue('matricula', $plantel['matricula']);
$f1->setValue('nro_aulas', $plantel['nro_aulas']);
$f1->setValue('telf', $plantel['telf']);
$f1->setValue('coordenadas_latitud', $plantel['coordenadas_latitud']);
$f1->setValue('coordenadas_longitud', $plantel['coordenadas_longitud']);
$f1->setValue('coordenadas_altitud', $plantel['coordenadas_altitud']);
$f1->setValue('caracteristicas', $plantel['caracteristicas']);
$f1->setValue('dependencia', $plantel['dependencia']);
$f1->setValue('municipio', $plantel['municipio_id']);
$f1->setValue('parroquias_id', $plantel['parroquias_id']);
$f1->setValue('nivel_id', $plantel['nivel_id']);
$f1->setValue('servicios', $servicios);
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
	$id = $d['id'];
	bd_modificar_plantel($d);
	$_SESSION['mensaje']="EL PLANTEL FUE MODIFICADO CORRECTAMENTE";
	ir("ficha_plantel.php?id=$id");
}

$smarty->assign('f1',$f1->flush(true));
$smarty->disp();