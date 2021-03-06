<?php /* Smarty version 2.6.26, created on 2016-03-03 14:27:47
         compiled from rp_cons_dotacionesxfecha.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id = "indice">REPORTE DE DOTACIONES POR FECHA DE SOLICITUD</br>Fecha Inicial: <?php echo $this->_tpl_vars['fecha_ini']; ?>
</br>Fecha Final: <?php echo $this->_tpl_vars['fecha_fin']; ?>
</br>
</div>
</p>
<?php if ($this->_tpl_vars['datos']): ?>
<div id="resultados">
<table class="enhancedtable" cellspacing="0" cellpadding = "3" border="1" align="center" width="100%">
<thead>
	<tr> 
		<th>ID</th>
		<th>Codigo Dotacion</th>
		<th>Cod DEA</th>
		<th>Nombre del Plantel</th>
		<th>Fecha</th>
		<th>Fecha Dotacion</th>
		<th>Nro de Memo</th>
		<th>Gerencia</th>
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
		<td><a href="ficha_dotacion.php?id=<?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['id']; ?>
</a></td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['cod_dotacion']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['codigo_dea']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['plantel_nombre']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['fecha']; ?>
</td>
		<?php if ($this->_tpl_vars['datos'][$this->_sections['p']['index']]['fecha_dotacion'] == '00-00-0000'): ?>
			<th>&nbsp;</th>
		<?php else: ?>
			<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['fecha_dotacion']; ?>
</td>
		<?php endif; ?>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['nro_memo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['gerencia']; ?>
</td>
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
<p>
<div id = "botonimprimir">
<input type="image" name="imprimir" src="imagenes/imprimir.gif" width="75" height="50" onclick="window.print();">
</div>
<?php else: ?>
	<h3>NO SE ENCONTRÓ NINGUN DATO QUE CORRESPONDA, VERIFIQUE...</h3>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>