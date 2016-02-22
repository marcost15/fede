<?php /* Smarty version 2.6.26, created on 2015-06-22 20:10:25
         compiled from registrar_proyecto.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Registrar Proyecto')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($_SESSION['mensaje']): ?>
</p>
<div class="mensaje"><?php echo $_SESSION['mensaje']; ?>
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
	var f1 = new LiveValidation(\'desc_solicitado\'); f1.add( Validate.Presence );
	var f2 = new LiveValidation(\'responsable\'); f2.add( Validate.Presence ); 
	var f3 = new LiveValidation(\'desc_respuesta\'); f3.add( Validate.Presence ); 
	var f4 = new LiveValidation(\'proy_actual\'); f4.add( Validate.Presence );
	var f5= new LiveValidation(\'proy_propuesto\'); f5.add( Validate.Presence );
</script>
'; ?>