<?php /* Smarty version 2.6.26, created on 2015-10-24 16:04:08
         compiled from registrar_consejo.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Registrar Consejo Comunal')));
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
	var f1 = new LiveValidation(\'nombre\'); f1.add( Validate.Presence ); f1.add( Validate.Length, { minimum: 8 } );
	var f2 = new LiveValidation(\'vocero\'); f2.add( Validate.Presence ); 
	var f3 = new LiveValidation(\'cargo\'); f3.add( Validate.Presence ); 
	var f4 = new LiveValidation(\'correo\'); f4.add( Validate.Email );
	var f5 = new LiveValidation(\'telf\'); f5.add( Validate.Length, { minimum: 7 } );
</script>
'; ?>