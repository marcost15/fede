<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';
include './modelo/bd_lista_municipios.php';
include './modelo/bd_verificar_privilegios.php';
$_SESSION['ini']=parse_ini_file('./configs/config.ini',true);
if (bd_verificar_privilegios('rp_frm_contratos_status.php',$_SESSION['usuario']['nivel_id'])!='CONCEDER')
{
	ir('negacion_usuario.php');
}

$status = array(
"EN EJECUCION" => "EN EJECUCION",
"PARALIZADA"   => "PARALIZADA",
"TERMINADA"    => "TERMINADA",
"CERRADA"      => "CERRADA",
"RESCINDIDA"   => "RESCINDIDA"
);

$f1=new dbFormHandler('contratos_repo');
$f1->setLanguage('es');
$f1->borderStart('REPORTE DE AVANCE DE OBRAS POR ESTATUS');
$f1->DateField('Fecha Inicio','fecha_ini',FH_NOT_EMPTY,1,'d-m-y',"10:03");
$f1->selectField('Estatus', 'id',$status,FH_NOT_EMPTY,true);
$f1->setMask(
   " <tr>\n".
   "   <td> </td>\n".
   "   <td> </td>\n".
   "   <td>%field% %field%</td>\n".
   " </tr>\n"
);
$f1->submitButton('Aceptar','Aceptar');
$f1->borderStop();
$f1->onCorrect("procesar");

function procesar($d)
{
	$id = $d['id'];
	$fecha_ini = $d['fecha_ini'];
	ir("rp_cons_contratos_status.php?id=$id&fecha_ini=$fecha_ini");
}
$smarty->assign('f1',$f1->flush(true));
$smarty->disp();
