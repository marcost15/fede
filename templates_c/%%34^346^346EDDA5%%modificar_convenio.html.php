<?php /* Smarty version 2.6.26, created on 2016-01-28 02:16:33
         compiled from modificar_convenio.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Modificar Convenios')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo $this->_tpl_vars['f1']; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
	var f1 = new LiveValidation(\'nro_convenio\'); f1.add( Validate.Presence ); f1.add( Validate.Numericality );
	var f2 = new LiveValidation(\'ejecutor\'); f2.add( Validate.Presence ); 
	var f3 = new LiveValidation(\'monto\'); f3.add( Validate.Presence ); 
</script>
'; ?>
