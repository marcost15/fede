<?php /* Smarty version 2.6.26, created on 2015-06-22 16:42:46
         compiled from ficha_plantel.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'ficha_plantel.html', 69, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => ' Ficha Plantel')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($_SESSION['mensaje']): ?>
</p>
<div id="mensaje"><?php echo $_SESSION['mensaje']; ?>
</div>
<?php endif; ?>
<h3>DATOS DEL PLANTEL</h3>
<table width="100%" border="1">
    <tr>
      <td><strong>Codigo DEA </strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['cod_dea']; ?>
</td>
      <td><strong>Dependencia</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['dependencia']; ?>
</td>
    </tr>
    <tr>
	   <td><strong>Nombre</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['nombre']; ?>
</td>
      <td><strong>Codigo Dependencia</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['cod_dependencia']; ?>
</td>
    </tr>
    <tr>
	  <td><strong>Codigo Estadistico</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['cod_estadistico']; ?>
</td>
      <td><strong>Telefono</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['telf']; ?>
</td>
    </tr>
    <tr>
      <td><strong>Municipio</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['municipio_id']; ?>
</td>
	  <td><strong>Parroquia</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['parroquias_id']; ?>
</td>
    </tr> 
	<tr>
	  <td><strong>Direccion</strong></td>
      <td colspan="3"><?php echo $this->_tpl_vars['ficha']['direccion']; ?>
</td>
	</tr>
    <tr>
      <td><strong>N&ordm; de Aulas</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['nro_aulas']; ?>
</td>
      <td><strong>Matricula</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['matricula']; ?>
</td>
    </tr>
    <tr>
      <td><strong>Latitud</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['coordenadas_latitud']; ?>
</td>
      <td><strong>Altitud</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['coordenadas_altitud']; ?>
</td>
    </tr>
    <tr>
      <td><strong>Longitud</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['coordenadas_longitud']; ?>
</td>
      <td><strong>Nivel</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['nivel_id']; ?>
</td>
    </tr>
    <tr>
      <td><strong>Caracteristicas</strong></td>
      <td colspan="3"><?php echo $this->_tpl_vars['ficha']['caracteristicas']; ?>
</td>
    </tr>
	<tr>
      <td colspan="2" align="center"><a href="modificar_plantel.php?id=<?php echo $this->_tpl_vars['ficha']['id']; ?>
"><img onmouseover='overlib("<strong>Modificar</strong>",WIDTH, 70)' src="./imagenes/boton1.png" onmouseout='return nd();'/></a></td>
      <td colspan="2" align="center"><a href="?id=<?php echo $this->_tpl_vars['ficha']['id']; ?>
&func=delete"><img onclick="return confirm('¿Esta seguro?')" onmouseover='overlib("<strong>Eliminar</strong>",WIDTH, 70)' src="./imagenes/eliminar.png" onmouseout='return nd();'/></a></td>
    </tr>
</table>
<p>
<div id="servicios">   
SERVICIOS DEL PLANTEL
<table border="0" cellspacing="3" cellpadding="3" width="100%">
<tbody>
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['servicios']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<td><?php echo $this->_tpl_vars['servicios'][$this->_sections['p']['index']]['servicio_id']; ?>
</td>
		<td width="10%"><a href="?id=<?php echo $this->_tpl_vars['ficha']['id']; ?>
&servi_id=<?php echo $this->_tpl_vars['servicios'][$this->_sections['p']['index']]['id']; ?>
&func=delete_servicios"><img onclick="return confirm('¿Esta seguro?')" onmouseover='overlib(<strong>Eliminar</strong>",WIDTH, 70)' src="./imagenes/eliminar.png" onmouseout='return nd();'/></a></td>
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
</p>
<div id="consejo">   
CONSEJOS COMUNALES     
<table border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>Nombre</th>
		<th>Vocero</th>
		<th>Cargo</th>
		<th>Correo</th>
		<th>Teléfono</th>
		<td width="5%"><a href="#" onClick="flash('forma1','forma2','forma3')"><img onmouseover='overlib("<strong>Seleccionar</strong>",WIDTH, 50)' src="./imagenes/seleccionar.ico" onmouseout='return nd();'/></a></td>
	</tr>
<thead> 
<tbody>
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['consejo']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<td><?php echo $this->_tpl_vars['consejo'][$this->_sections['p']['index']]['nombre']; ?>
</td>
		<td><?php echo $this->_tpl_vars['consejo'][$this->_sections['p']['index']]['vocero']; ?>
</td>
		<td><?php echo $this->_tpl_vars['consejo'][$this->_sections['p']['index']]['cargo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['consejo'][$this->_sections['p']['index']]['correo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['consejo'][$this->_sections['p']['index']]['telf']; ?>
</td>
		<td width="5%"><a href="?id=<?php echo $this->_tpl_vars['ficha']['id']; ?>
&consejo_id=<?php echo $this->_tpl_vars['consejo'][$this->_sections['p']['index']]['id']; ?>
&func=delete_consejo"><img onclick="return confirm('¿Esta seguro?')" onmouseover='overlib(<strong>Eliminar</strong>",WIDTH, 70)' src="./imagenes/eliminar.png" onmouseout='return nd();'/></a></td>
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
<div id="forma1" style="display:none">
<p>&nbsp;</p>
<?php echo $this->_tpl_vars['f1']; ?>

<p>&nbsp;</p>
</div>
</p>
<div id="director">   
DATOS DEL DIRECTOR / SUB-DIRECTOR     
<table border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>Cedula</th>
		<th>Nombre y Apellido</th>
		<th>Correo</th>
		<th>Telefono</th>
		<th>Cargo</th>
		<td width="5%"><a href="#" onClick="flash('forma2','forma3','forma1')"><img onmouseover='overlib("<strong>Agregar</strong>",WIDTH, 50)' src="./imagenes/seleccionar.ico" onmouseout='return nd();'/></a></td>
	</tr>
<thead> 
<tbody>
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['personal']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<td><?php echo $this->_tpl_vars['personal'][$this->_sections['p']['index']]['cedula']; ?>
</td>
		<td><?php echo $this->_tpl_vars['personal'][$this->_sections['p']['index']]['nombre']; ?>
, <?php echo $this->_tpl_vars['personal'][$this->_sections['p']['index']]['apellido']; ?>
</td>
		<td><?php echo $this->_tpl_vars['personal'][$this->_sections['p']['index']]['correo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['personal'][$this->_sections['p']['index']]['telf']; ?>
</td>
		<td><?php echo $this->_tpl_vars['personal'][$this->_sections['p']['index']]['tipo']; ?>
</td>
		<td width="5%"><a href="?id=<?php echo $this->_tpl_vars['ficha']['id']; ?>
&personal_id=<?php echo $this->_tpl_vars['personal'][$this->_sections['p']['index']]['id']; ?>
&func=delete_personal"><img onclick="return confirm('¿Esta seguro?')" onmouseover='overlib(<strong>Eliminar</strong>",WIDTH, 70)' src="./imagenes/eliminar.png" onmouseout='return nd();'/></a></td>
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
<div id="forma2" style="display:none">
<?php echo $this->_tpl_vars['f2']; ?>

</div>
</p>
<div id="contratos">  
CONTRATOS    
<table border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>Codigo</th>
		<th>Modalidad</th>
		<th>Empresa</th>
		<td align = "center" width="10%" colspan = "3"><a href="registrar_contratos.php?cod_dea=<?php echo $this->_tpl_vars['ficha']['cod_dea']; ?>
"><img onmouseover='overlib("<strong>Agregar</strong>",WIDTH, 50)' src="./imagenes/seleccionar.ico" onmouseout='return nd();'/></a></td>
	</tr>
</thead>
<tbody>
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['contrato']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<td><?php echo $this->_tpl_vars['contrato'][$this->_sections['p']['index']]['codigo_contrato']; ?>
</td>
		<td><?php echo $this->_tpl_vars['contrato'][$this->_sections['p']['index']]['modalidad_atencion']; ?>
</td>
		<td><?php echo $this->_tpl_vars['contrato'][$this->_sections['p']['index']]['empresa_id']; ?>
</td>
		<td><a href="ficha_contrato.php?id=<?php echo $this->_tpl_vars['contrato'][$this->_sections['p']['index']]['id']; ?>
"><img onmouseover='overlib("<strong>Ver Ficha</strong>",WIDTH, 50)' src="./imagenes/checking.png" onmouseout='return nd();'/></a></td>
		<td><a href="registrar_contratos.php?id=<?php echo $this->_tpl_vars['contrato'][$this->_sections['p']['index']]['id']; ?>
"><img onmouseover='overlib("<strong>Modificar</strong>",WIDTH, 50)' src="./imagenes/boton1.png" onmouseout='return nd();'/></a></td>
		<td><a href="?id=<?php echo $this->_tpl_vars['ficha']['id']; ?>
&contrato_id=<?php echo $this->_tpl_vars['contrato'][$this->_sections['p']['index']]['id']; ?>
&func=delete_contrato"><img onclick="return confirm('¿Esta seguro?')" onmouseover='overlib(<strong>Eliminar</strong>",WIDTH, 70)' src="./imagenes/eliminar.png" onmouseout='return nd();'/></a></td>
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
</p>
<div id="convenio">  
CONVENIOS     
<table border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>Codigo</th>
		<th>Tipo</th>
		<th>Descripcion</th>
		<td align = "center" width="10%" colspan = "3" width="10%"><a href="registrar_convenio.php?cod_dea=<?php echo $this->_tpl_vars['ficha']['cod_dea']; ?>
"><img onmouseover='overlib("<strong>Agregar</strong>",WIDTH, 50)' src="./imagenes/seleccionar.ico" onmouseout='return nd();'/></a></td>
	</tr>
<thead>
<tbody>
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['convenio']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<td><?php echo $this->_tpl_vars['convenio'][$this->_sections['p']['index']]['nro_convenio']; ?>
</td>
		<td><?php echo $this->_tpl_vars['convenio'][$this->_sections['p']['index']]['tipo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['convenio'][$this->_sections['p']['index']]['descripcion_trabajos']; ?>
</td>
		<td><a href="ficha_convenio.php?id=<?php echo $this->_tpl_vars['convenio'][$this->_sections['p']['index']]['id']; ?>
"><img onmouseover='overlib("<strong>Ver Ficha</strong>",WIDTH, 50)' src="./imagenes/checking.png" onmouseout='return nd();'/></a></td>
		<td><a href="modificar_convenio.php?id=<?php echo $this->_tpl_vars['convenio'][$this->_sections['p']['index']]['id']; ?>
"><img onmouseover='overlib("<strong>Modificar</strong>",WIDTH, 50)' src="./imagenes/boton1.png" onmouseout='return nd();'/></a></td>
		<td><a href="?id=<?php echo $this->_tpl_vars['ficha']['id']; ?>
&convenio_id=<?php echo $this->_tpl_vars['convenio'][$this->_sections['p']['index']]['id']; ?>
&func=delete_convenio"><img onclick="return confirm('¿Esta seguro?')" onmouseover='overlib(<strong>Eliminar</strong>",WIDTH, 70)' src="./imagenes/eliminar.png" onmouseout='return nd();'/></a></td>
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
</p>
<div id="proye">  
PROYECTOS
<table border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>Responsable</th>
		<th>Estatus</th>
		<th>Descripcion</th>
		<td align = "center" width="10%" colspan = "3" width="10%"><a href="registrar_proyecto.php?cod_dea=<?php echo $this->_tpl_vars['ficha']['cod_dea']; ?>
"><img onmouseover='overlib("<strong>Agregar</strong>",WIDTH, 50)' src="./imagenes/seleccionar.ico" onmouseout='return nd();'/></a></td>
	</tr>
<thead>
<tbody>
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['proyecto']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<td><?php echo $this->_tpl_vars['proyecto'][$this->_sections['p']['index']]['responsable']; ?>
</td>
		<td><?php echo $this->_tpl_vars['proyecto'][$this->_sections['p']['index']]['estatus']; ?>
</td>
		<td><?php echo $this->_tpl_vars['proyecto'][$this->_sections['p']['index']]['desc_solicitado']; ?>
</td>
		<td><a href="ficha_proyecto.php?id=<?php echo $this->_tpl_vars['proyecto'][$this->_sections['p']['index']]['id']; ?>
"><img onmouseover='overlib("<strong>Ver Ficha</strong>",WIDTH, 50)' src="./imagenes/checking.png" onmouseout='return nd();'/></a></td>
		<td><a href="modificar_proyecto.php?id=<?php echo $this->_tpl_vars['proyecto'][$this->_sections['p']['index']]['id']; ?>
"><img onmouseover='overlib("<strong>Modificar</strong>",WIDTH, 50)' src="./imagenes/boton1.png" onmouseout='return nd();'/></a></td>
		<td><a href="?id=<?php echo $this->_tpl_vars['ficha']['id']; ?>
&proyecto_id=<?php echo $this->_tpl_vars['proyecto'][$this->_sections['p']['index']]['id']; ?>
&func=delete_proyecto"><img onclick="return confirm('¿Esta seguro?')" onmouseover='overlib(<strong>Eliminar</strong>",WIDTH, 70)' src="./imagenes/eliminar.png" onmouseout='return nd();'/></a></td>
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
</p>
<div id="eva">  
EVALUACIONES TECNICAS
<table border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>Solicitado Por</th>
		<th>Medio</th>
		<th>Descripcion</th>
		<td align = "center" width="10%" colspan = "3" width="10%"><a href="registrar_evaluacion.php?cod_dea=<?php echo $this->_tpl_vars['ficha']['cod_dea']; ?>
"><img onmouseover='overlib("<strong>Agregar</strong>",WIDTH, 50)' src="./imagenes/seleccionar.ico" onmouseout='return nd();'/></a></td>
	</tr>
<thead>
<tbody>
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['evaluacion']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<td><?php echo $this->_tpl_vars['evaluacion'][$this->_sections['p']['index']]['solicitado_por']; ?>
</td>
		<td><?php echo $this->_tpl_vars['evaluacion'][$this->_sections['p']['index']]['medio']; ?>
</td>
		<td><?php echo $this->_tpl_vars['evaluacion'][$this->_sections['p']['index']]['descripcion_solicitud']; ?>
</td>
		<td><a href="ficha_evaluacion.php?id=<?php echo $this->_tpl_vars['evaluacion'][$this->_sections['p']['index']]['id']; ?>
"><img onmouseover='overlib("<strong>Ver Ficha</strong>",WIDTH, 50)' src="./imagenes/checking.png" onmouseout='return nd();'/></a></td>
		<td><a href="modificar_evaluacion.php?id=<?php echo $this->_tpl_vars['evaluacion'][$this->_sections['p']['index']]['id']; ?>
"><img onmouseover='overlib("<strong>Modificar</strong>",WIDTH, 50)' src="./imagenes/boton1.png" onmouseout='return nd();'/></a></td>
		<td><a href="?id=<?php echo $this->_tpl_vars['ficha']['id']; ?>
&evaluacion_id=<?php echo $this->_tpl_vars['evaluacion'][$this->_sections['p']['index']]['id']; ?>
&func=delete_evaluacion"><img onclick="return confirm('¿Esta seguro?')" onmouseover='overlib(<strong>Eliminar</strong>",WIDTH, 70)' src="./imagenes/eliminar.png" onmouseout='return nd();'/></a></td>
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
</p>
<div id="dota"> 
DOTACIONES
<table border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>Nro de Memo</th>
		<th>Gerencia</th>
		<th>Fecha</th>
		<td align = "center" width="10%" colspan = "3" width="10%"><a href="registrar_dotacion.php?cod_dea=<?php echo $this->_tpl_vars['ficha']['cod_dea']; ?>
"><img onmouseover='overlib("<strong>Agregar</strong>",WIDTH, 50)' src="./imagenes/seleccionar.ico" onmouseout='return nd();'/></a></td>
	</tr>
<thead>
<tbody>
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['dotacion']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<td><?php echo $this->_tpl_vars['dotacion'][$this->_sections['p']['index']]['nro_memo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['dotacion'][$this->_sections['p']['index']]['gerencia']; ?>
</td>
		<td><?php echo $this->_tpl_vars['dotacion'][$this->_sections['p']['index']]['fecha']; ?>
</td>
		<td><a href="ficha_dotacion.php?id=<?php echo $this->_tpl_vars['dotacion'][$this->_sections['p']['index']]['id']; ?>
"><img onmouseover='overlib("<strong>Ver Ficha</strong>",WIDTH, 50)' src="./imagenes/checking.png" onmouseout='return nd();'/></a></td>
		<td><a href="modificar_dotacion.php?id=<?php echo $this->_tpl_vars['dotacion'][$this->_sections['p']['index']]['id']; ?>
"><img onmouseover='overlib("<strong>Modificar</strong>",WIDTH, 50)' src="./imagenes/boton1.png" onmouseout='return nd();'/></a></td>
		<td><a href="?id=<?php echo $this->_tpl_vars['ficha']['id']; ?>
&dotacion_id=<?php echo $this->_tpl_vars['dotacion'][$this->_sections['p']['index']]['id']; ?>
&func=delete_dotacion"><img onclick="return confirm('¿Esta seguro?')" onmouseover='overlib(<strong>Eliminar</strong>",WIDTH, 70)' src="./imagenes/eliminar.png" onmouseout='return nd();'/></a></td>
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
</p>
<h3>GALERIA DE FOTOS DEL PLANTEL</h3>     
<table  class="enhancedtable" border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>Descripción</th>
		<th>Foto</th>
		<td width="5%"><a href="#" onClick="flash('forma3','forma2','forma1')"><img onmouseover='overlib("<strong>Agregar</strong>",WIDTH, 50)' src="./imagenes/seleccionar.ico" onmouseout='return nd();'/></a></td>
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
&func=delete_foto"><img onclick="return confirm('¿Esta seguro?')" onmouseover='overlib(<strong>Eliminar</strong>",WIDTH, 70)' src="./imagenes/eliminar.png" onmouseout='return nd();'/></a></td>
	</tr><?php endfor; endif; ?>
</tbody>
</table>
<div id="forma3" style="display:none">
<?php echo $this->_tpl_vars['f3']; ?>

</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pie.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
	function flash(a,b,c)
	{
		document.getElementById(a).style.setProperty("display","inline","")
		document.getElementById(b).style.setProperty("display","none","");
		document.getElementById(c).style.setProperty("display","none","");
	}
</script>
<script>
	var f1 = new LiveValidation(\'cedula\'); f1.add( Validate.Presence ); f1.add( Validate.Length, { minimum: 7 } );
	var f2 = new LiveValidation(\'nombre\'); f2.add( Validate.Presence );
	var f3 = new LiveValidation(\'apellido\'); f3.add( Validate.Presence );
	var f4 = new LiveValidation(\'correo\'); f4.add( Validate.Email );
	var f5 = new LiveValidation(\'telf\'); f5.add( Validate.Numericality ); f5.add( Validate.Length, { minimum: 7 } );
</script>
<script>
	var f15 = new LiveValidation(\'descripcion\'); f15.add( Validate.Presence );
</script>
'; ?>