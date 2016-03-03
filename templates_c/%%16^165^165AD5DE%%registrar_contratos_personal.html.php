<?php /* Smarty version 2.6.26, created on 2016-01-28 01:41:30
         compiled from registrar_contratos_personal.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => "Ing Inspector-Residente")));
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
	var f1 = new LiveValidation(\'cedula\'); f1.add( Validate.Presence );f1.add( Validate.Numericality ); f1.add( Validate.Length, { minimum: 7 } );
	var f2 = new LiveValidation(\'nombre\'); f2.add( Validate.Presence );
	var f3 = new LiveValidation(\'apellido\'); f3.add( Validate.Presence );
	var f4 = new LiveValidation(\'civ\'); f4.add( Validate.Presence ); 
	var f5 = new LiveValidation(\'tlf\'); f5.add( Validate.Numericality ); f5.add( Validate.Length, { minimum: 7 } );
	var f6 = new LiveValidation(\'correo\'); f6.add( Validate.Email );

</script>
'; ?>
