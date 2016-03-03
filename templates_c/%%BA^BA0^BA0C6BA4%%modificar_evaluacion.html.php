<?php /* Smarty version 2.6.26, created on 2016-02-24 17:24:36
         compiled from modificar_evaluacion.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => 'Modificar Evaluacion')));
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
	var f1 = new LiveValidation(\'solicitado_por\'); f1.add( Validate.Presence );
	var f3 = new LiveValidation(\'medio\'); f3.add( Validate.Presence ); 
	var f4 = new LiveValidation(\'modalidad_atencion\'); f4.add( Validate.Presence );
	var f5 = new LiveValidation(\'descripcion_solicitud\'); f5.add( Validate.Presence );
</script>
'; ?>

