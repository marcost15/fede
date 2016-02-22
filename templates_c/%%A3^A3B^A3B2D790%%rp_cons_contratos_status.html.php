<?php /* Smarty version 2.6.26, created on 2016-02-22 17:00:32
         compiled from rp_cons_contratos_status.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="resultados_reporte">
<p>
<div id = "indice">REPORTE DE AVANCE DE OBRAS POR ESTATUS </br>Status: <?php echo $this->_tpl_vars['id']; ?>
 </br>Fecha de Inicio: <?php echo $this->_tpl_vars['fecha']; ?>
</div>
</p>
<?php if ($this->_tpl_vars['datos']): ?>
<div id="resultados">
<table class="enhancedtable" cellspacing="0" cellpadding = "3" border="1" align="center" width="100%">
<thead>
	<tr> 
		<th>ID</th>
		<th>Codigo Contrato</th>
		<th>Cod DEA</th>
		<th>Nombre del Plantel</th>
		<th>Descripción</th>
		<th>Plan</th>
		<th>Empresa</th>
		<th>% de Ejecución Financiero</th>
		<th>% de Ejecución Físico</th>
</thead>
<tbody>
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['datos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
$this->_sections['p']['start'] = $this->_sections['p']['step'] > 0 ? 0 : $this->_sections['p']['loop']-1;
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = $this->_sections['p']['loop'];
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>
	<tr>
		<td><a href="ficha_contrato.php?id=<?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['id']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['codigo_contrato']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['codigo_dea']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['plantel_nombre']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['desc_trabajo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['plan']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['empresa_nombre']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['poc_ejec_financiero']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['poc_ejec_fisico']; ?>
</td>
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
<p>
<input type="image" name="imprimir" src="imagenes/imprimir.gif" width="75" height="50" onclick="window.print();">
<?php else: ?>
	<h3>NO SE ENCONTRÓ NINGUN DATO QUE CORRESPONDA, VERIFIQUE...</h3>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>