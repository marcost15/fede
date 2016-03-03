<?php /* Smarty version 2.6.26, created on 2015-06-22 21:03:15
         compiled from registrar_dotacion.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Registrar Dotacion')));
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
	var f1 = new LiveValidation(\'nro_memo\'); f1.add( Validate.Presence ); f1.add( Validate.Numericality );
	var f2 = new LiveValidation(\'gerencia\'); f2.add( Validate.Presence ); 
	var f3 = new LiveValidation(\'cod_dotacion\'); f3.add( Validate.Presence ); 
</script>
'; ?>
