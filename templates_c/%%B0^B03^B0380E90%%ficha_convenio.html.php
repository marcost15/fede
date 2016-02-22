<?php /* Smarty version 2.6.26, created on 2016-01-28 02:15:57
         compiled from ficha_convenio.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'ficha_convenio.html', 68, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => ' Ficha Convenio')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($_SESSION['mensaje']): ?>
</p>
<div id="mensaje"><?php echo $_SESSION['mensaje']; ?>
</div>
<?php endif; ?>
<h3>DATOS DEL DEL CONVENIO</h3>
<div id="re" align="center">

 <table width="700" border="1" align="center">
    <tr>
      <td><strong>Codigo DEA </strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['codigo_dea']; ?>
</td>
      <td><strong>Nº Convenio</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['nro_convenio']; ?>
</td>
    </tr>
    <tr>
      <td><strong>Ejecutor</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['ejecutor']; ?>
</td>
      <td><strong>Monto</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['monto']; ?>
</td>
    </tr>
    <tr>
      <td><strong>Tipo</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['tipo']; ?>
</td>
      <td><strong>Fecha de Inicio</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['fecha_inicio']; ?>
</td>
    </tr>   
    <tr>
      <td><strong>Fecha de Terminacion</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['fecha_terminacion']; ?>
</td>
	  <td><strong>Fecha de Paralizacion</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['fecha_paralizacion']; ?>
</td>
    </tr> 
	 <tr>
      <td><strong>Motivo Paralizacion</strong></td>
      <td colspan='3'><?php echo $this->_tpl_vars['ficha']['motivo_paralizacion']; ?>
</td>
    </tr>
    <tr>
      <td><strong>Fecha de Reinicio</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['fecha_reinicio']; ?>
</td>
      <td><strong>Estatus</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['estatus']; ?>
</td>
    </tr>
    <tr>
      <td><strong>Plan</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['plan']; ?>
</td>
      <td><strong>Descripcion</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['descripcion_trabajos']; ?>
</td>
    </tr>
    <tr>
      <td><strong>Observacion</strong></td>
      <td colspan='3'><?php echo $this->_tpl_vars['ficha']['observacion']; ?>
</td>
    </tr>
 </table>
 </div>
 <p>
<h3>GALERIA DE FOTOS DEL CONVENIO</h3>     
<table  class="enhancedtable" border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>Descripcion</th>
		<th>Foto</th>
		<td width="5%"><a href="#" onClick="flash('forma3')"><img onmouseover='overlib("<strong>Agregar</strong>",WIDTH, 50)' src="./imagenes/seleccionar.ico" onmouseout='return nd();'/></a></td>
	</tr>
</thead> 
<tbody>
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['fotos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<tr class="linea<?php echo smarty_function_cycle(array('values' => '1,2'), $this);?>
">
		<td><?php echo $this->_tpl_vars['fotos'][$this->_sections['p']['index']]['descripcion']; ?>
</td>
		<td><a href="./upload/<?php echo $this->_tpl_vars['fotos'][$this->_sections['p']['index']]['foto']; ?>
"><img src="./upload/<?php echo $this->_tpl_vars['fotos'][$this->_sections['p']['index']]['foto']; ?>
" width="120" height="120" /></a></td>
		<td width="5%"><a href="?id=<?php echo $this->_tpl_vars['ficha']['id']; ?>
&foto_id=<?php echo $this->_tpl_vars['fotos'][$this->_sections['p']['index']]['id']; ?>
&func=delete_foto"><img onclick="return confirm('?Esta seguro?')" onmouseover='overlib(<strong>Eliminar</strong>",WIDTH, 70)' src="./imagenes/eliminar.png" onmouseout='return nd();'/></a></td>
	</tr><?php endfor; endif; ?>
</tbody>
</table>
<div id="forma3" style="display:none">
<?php echo $this->_tpl_vars['f3']; ?>

</div>
<p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
	function flash(a)
	{
		document.getElementById(a).style.setProperty("display","inline","")
	}
</script>
<script>
	var f15 = new LiveValidation(\'descripcion\'); f15.add( Validate.Presence );
</script>
'; ?>