<?php /* Smarty version 2.6.26, created on 2016-02-22 15:48:51
         compiled from registrar_plantel.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Registrar Plantel')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($_SESSION['mensaje']): ?>
</p>
<div id="mensaje"><?php echo $_SESSION['mensaje']; ?>
</div>
<?php endif; ?>
	
<?php echo $this->_tpl_vars['f1']; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
	var f1 = new LiveValidation(\'nombre\'); f1.add( Validate.Presence );
	var f2 = new LiveValidation(\'cod_dea\'); f2.add( Validate.Presence ); 
	var f8= new LiveValidation(\'matricula\'); f8.add( Validate.Numericality );
	var f9 = new LiveValidation(\'nro_aulas\');f9.add( Validate.Numericality );	
	var f7 = new LiveValidation(\'direccion\'); f7.add( Validate.Presence );
	var f10 = new LiveValidation(\'telf\'); f10.add( Validate.Numericality ); f10.add( Validate.Length, { minimum: 7 } );
	var f3 = new LiveValidation(\'coordenadas_latitud\'); f3.add( Validate.Length, { minimum: 10 } );
	var f4 = new LiveValidation(\'coordenadas_longitud\'); f4.add( Validate.Length, { minimum: 10 } );
</script>
'; ?>
