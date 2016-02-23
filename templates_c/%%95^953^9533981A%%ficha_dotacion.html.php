<?php /* Smarty version 2.6.26, created on 2016-02-22 16:35:23
         compiled from ficha_dotacion.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'ficha_dotacion.html', 79, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => ' Ficha Dotacion')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($_SESSION['mensaje']): ?>
</p>
<div id="mensaje"><?php echo $_SESSION['mensaje']; ?>
</div>
<?php endif; ?>
<h3>DATOS DE LA DOTACION</h3>
<div>
<table width="700" border="1" align="center">
    <tr>
      <td width="150"><strong>Código de Dotación</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['id']; ?>
</td>
    </tr>
	<tr>
      <td width="150"><strong>Numero Memo</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['nro_memo']; ?>
</td>
    </tr>
    <tr>
      <td><strong>Fecha</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['fecha']; ?>
</td>
    </tr>
    <tr>
      <td><strong>Gerencia</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['gerencia']; ?>
</td>
    </tr> 
    <tr>
      <td><strong>Codigo DEA</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['codigo_dea']; ?>
</td>
    </tr> 
    <?php if ($this->_tpl_vars['ficha']['fecha_dotacion'] != '00-00-0000'): ?>
    <tr>
      <td><strong>Fecha Dotacion</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['fecha_dotacion']; ?>
</td>
    </tr>
    <?php endif; ?>
</table>
</p>
<table class="enhancedtable" align="center" width="100%" border="1" cellspacing="0" cellpadding = "3">
  <thead>
    <tr>
	  <td colspan="16" align="center"><font size=4><strong>MOBILIARIO</strong></font></td>
	</tr>
	<tr> 
      <th>Descripcion</th>
      <th colspan="2">Tipo</th>
	  <th>Tipo Mobiliario</th>
      <th>Empresa</th>
	  <th>Monto</th>
	  <td width="5%"><a href="#" onClick="flash('forma2','forma3')"><img onmouseover='overlib("<strong>Agregar</strong>",WIDTH, 50)' src="./imagenes/seleccionar.ico" onmouseout='return nd();'/></a></td>
    </tr>
  </thead>
  <tbody>
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['mobiliario']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
		<tr>
		  <td><?php echo $this->_tpl_vars['mobiliario'][$this->_sections['i']['index']]['descripcion']; ?>
</td>	
		  <td><?php echo $this->_tpl_vars['mobiliario'][$this->_sections['i']['index']]['tipo']; ?>
</td>	
		  <td><?php echo $this->_tpl_vars['mobiliario'][$this->_sections['i']['index']]['tipo2']; ?>
</td>	
		  <td><?php echo $this->_tpl_vars['mobiliario'][$this->_sections['i']['index']]['tipo_mobiliario']; ?>
</td>
		  <td><?php echo $this->_tpl_vars['mobiliario'][$this->_sections['i']['index']]['empresa']; ?>
</td>
		  <td><?php echo $this->_tpl_vars['mobiliario'][$this->_sections['i']['index']]['monto']; ?>
</td>
		  <td width="5%"><a href="?id=<?php echo $this->_tpl_vars['ficha']['id']; ?>
&mobiliario_id=<?php echo $this->_tpl_vars['mobiliario'][$this->_sections['i']['index']]['id']; ?>
&func=delete_mobiliario"><img onclick="return confirm('?Esta seguro?')" onmouseover='overlib(<strong>Eliminar</strong>",WIDTH, 70)' src="./imagenes/eliminar.png" onmouseout='return nd();'/></a></td>
		</tr>
	<?php endfor; endif; ?>
  </tbody>
</table>
<div id="forma2" style="display:none">
<?php echo $this->_tpl_vars['f2']; ?>

</div>
<h3>GALERIA DE FOTOS DE LA DOTACION</h3>     
<table  class="enhancedtable" border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>Descripcion</th>
		<th>Foto</th>
		<td width="5%"><a href="#" onClick="flash('forma3','forma2')"><img onmouseover='overlib("<strong>Agregar</strong>",WIDTH, 50)' src="./imagenes/seleccionar.ico" onmouseout='return nd();'/></a></td>
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
</div>
<p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
	function flash(a,b)
	{
		document.getElementById(a).style.setProperty("display","inline","")
		document.getElementById(b).style.setProperty("display","none","")
	}
</script>
<script>
	var f15 = new LiveValidation(\'descripcion\'); f15.add( Validate.Presence );
</script>
<script>
	var f5 = new LiveValidation(\'descripcion_mobi\'); f5.add( Validate.Presence );
	var f7 = new LiveValidation(\'empresa\'); f7.add; 
	var f8 = new LiveValidation(\'monto\'); f8.add; 
</script>
'; ?>
