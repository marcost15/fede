<?php
session_start();
include './configs/funciones.php';
include './configs/smarty.php';
include './configs/bd.php';
include './configs/bdfh3.php';

$filter = $_POST['filter'];
switch( $_POST['field'] ) {
    case 'parroquias_id':
        if( $filter != 0 ) 
		{
		    $parroquias_id = sql2opciones("SELECT id,nombre FROM parroquias WHERE municipio_id = '$filter'"); 
        	$n = count($parroquias_id);
			if ($n != 0)
            {
                FormHandler::setDynamicOptions($parroquias_id); 
				break;
			}
		}
       default:
          FormHandler::setDynamicOptions( array() );
      break;          
}  