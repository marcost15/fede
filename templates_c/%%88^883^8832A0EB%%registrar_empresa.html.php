<?php /* Smarty version 2.6.26, created on 2015-06-22 16:34:03
         compiled from registrar_empresa.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Registrar Empresa')));
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
	var f1 = new LiveValidation(\'rif\'); f1.add( Validate.Presence );  f1.add( Validate.Length, { minimum: 8 } );
	var f2 = new LiveValidation(\'nombre\'); f2.add( Validate.Presence );
	var f3 = new LiveValidation(\'tlf\'); f3.add( Validate.Numericality ); f3.add( Validate.Length, { minimum: 7 } );
	var f4 = new LiveValidation(\'repre_legal\'); f4.add( Validate.Presence );
	var f5 = new LiveValidation(\'cedula\'); f5.add( Validate.Presence ); f5.add( Validate.Numericality ); f5.add( Validate.Length, { minimum: 7 } );
	var f6 = new LiveValidation(\'tlf_repre\'); f6.add( Validate.Numericality ); f6.add( Validate.Length, { minimum: 7 } );
	var f7 = new LiveValidation(\'correo\'); f7.add( Validate.Email );
</script>
'; ?>
