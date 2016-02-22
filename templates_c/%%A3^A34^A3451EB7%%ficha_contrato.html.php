<?php /* Smarty version 2.6.26, created on 2015-06-25 19:09:08
         compiled from ficha_contrato.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'ficha_contrato.html', 121, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cabecera.html", 'smarty_include_vars' => array('title' => ' Ficha Contrato')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($_SESSION['mensaje']): ?>
</p>
<div id="mensaje"><?php echo $_SESSION['mensaje']; ?>
</div>
<?php endif; ?>
<h3>DATOS DEL CONTRATO</h3>
<table width="700" border="1" align="center">
    <tr>
      <td><strong>Codigo DEA </strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['codigo_dea']; ?>
</td>
	</tr>
	<tr>
      <td><strong>Nombre del Plantel</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['nombre_plantel']; ?>
</td>
    </tr>
    <tr>
      <td><strong>Contrato Nº</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['codigo_contrato']; ?>
</td>
	 </tr>
	 <tr>
      <td><strong>Tiempo de Ejecucion</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['tiempo_ejec']; ?>
</td>
    </tr>
    <tr>
	  <td><strong>Descripcion</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['desc_trabajo']; ?>
</td>
	</tr>
	<tr>
      <td><strong>Plan</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['plan']; ?>
</td>
	</tr>
	<tr>
      <td><strong>Modalidad</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['modalidad_atencion']; ?>
</td>
    </tr> 
    <tr>
      <td><strong>Fecha de Inicio</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['fecha_inicio']; ?>
</td>
	</tr>
	<tr>
      <td><strong>Fecha de Terminacion</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['fecha_terminacion']; ?>
</td>
    </tr> 
    <tr>
      <td><strong>Fecha de Paralizacion</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['fecha_paralizacion']; ?>
</td>
	</tr>
	<tr>
      <td><strong>Motivo de Paralizacion</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['motivo_paralizacion']; ?>
</td>
    </tr>
    <tr>
      <td><strong>Fecha de Reinicio</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['fecha_reinicio']; ?>
</td>
	</tr>
	<tr>
      <td><strong>Fecha de Prorroga</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['fecha_prorroga']; ?>
</td>
    </tr>
    <tr>
      <td><strong>Dias de Prorroga</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['nro_dias_prorroga']; ?>
</td>
	</tr>
	<tr>
	  <td><strong>Motivo Prorroga</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['motivo_prorroga']; ?>
</td>
	</tr>
	<tr>
      <td><strong>Fecha de Culminacion</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['fecha_culminacion']; ?>
</td>
    </tr>
	<tr>
      <td><strong>Monto Pagado</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['monto_val_pagadas']; ?>
</td>
    </tr>
	<tr>
      <td><strong>Porcentaje de Ejecuci?n Financiero</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['poc_ejec_financiero']; ?>
</td>
    </tr>
	<tr>
      <td><strong>Porcentaje de Ejecuci?n F?sico</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['poc_ejec_fisico']; ?>
</td>
    </tr>
	<tr>
      <td><strong>Estatus</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['estatus']; ?>
</td>
    </tr>
	<tr>
      <td><strong>Monto Contratado</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['monto_contratado']; ?>
</td>
    </tr>
	<tr>
      <td><strong>Aumento</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['aumento']; ?>
</td>
	</tr>
	<tr>
      <td><strong>Empleos Directos</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['empleos_directos']; ?>
</td>
    </tr>
	<tr>
      <td><strong>Empleos Indirectos</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['empleos_indirectos']; ?>
</td>
    </tr>
	<tr>
      <td><strong>Observacion</strong></td>
      <td><?php echo $this->_tpl_vars['ficha']['observacion']; ?>
</td>
    </tr>
</table>
<p>
<h3>GALERIA DE FOTOS DEL CONTRATO</h3>     
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
  <h4><B><I>DATOS DE LA EMPRESA</I></B></h4>     
<div id="resultados">
<table  class="enhancedtable" border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr>
		<th>RIF</th>
		<th>Nombre</th>
		<th>Telefono</th>
		<th>Representante</th>
		<th>Cedula</th>
		<th>Telefono</th>
		<th>Correo</th>
		<th>&nbsp;</th>
	</tr>
<thead>
<tbody>
	<tr>
		<td><?php echo $this->_tpl_vars['empresa']['rif']; ?>
</td>
		<td><?php echo $this->_tpl_vars['empresa']['nombre']; ?>
</td>
		<td><?php echo $this->_tpl_vars['empresa']['tlf']; ?>
</td>
		<td><?php echo $this->_tpl_vars['empresa']['repre_legal']; ?>
</td>
		<td><?php echo $this->_tpl_vars['empresa']['cedula']; ?>
</td>
		<td><?php echo $this->_tpl_vars['empresa']['tlf_repre']; ?>
</td>
		<td><?php echo $this->_tpl_vars['empresa']['correo']; ?>
</td>
		<td><a href="modificar_empresa.php?id=<?php echo $this->_tpl_vars['empresa']['id']; ?>
"><img onmouseover='overlib("<strong>Modificar</strong>",WIDTH, 70)' src="./imagenes/boton1.png" onmouseout='return nd();'/></a></td>
	</tr>
</tbody>
</table>
<h4><B><I>DATOS DEL ING. INSPECTOR / ING. RESIDENTE</I></B></h4>     
<table  class="enhancedtable" border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>Cedula</th>
		<th>Apellidos y Nombres</th>
		<th>CIV</th>
		<th>Tipo</th>
		<th>Telefono</th>
		<th>Correo</th>
		<th>Modalidad</th>
		<th>&nbsp;</th>
	</tr>
<thead>
<tbody>
	<tr class="linea<?php echo smarty_function_cycle(array('values' => '1,2'), $this);?>
">
		<td><?php echo $this->_tpl_vars['inspector']['cedula']; ?>
</td>
		<td><?php echo $this->_tpl_vars['inspector']['apellido']; ?>
, <?php echo $this->_tpl_vars['inspector']['nombre']; ?>
</td>
		<td><?php echo $this->_tpl_vars['inspector']['civ']; ?>
</td>
		<td>INSPECTOR</td>
		<td><?php echo $this->_tpl_vars['inspector']['tlf']; ?>
</td>
		<td><?php echo $this->_tpl_vars['inspector']['correo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['inspector']['modalidad']; ?>
</td>
		<td><a href="modificar_contratos_personal.php?id=<?php echo $this->_tpl_vars['inspector']['id']; ?>
"><img onmouseover='overlib("<strong>Modificar</strong>",WIDTH, 70)' src="./imagenes/boton1.png" onmouseout='return nd();'/></a></td>
	</tr>
	<tr class="linea<?php echo smarty_function_cycle(array('values' => '2,1'), $this);?>
">
		<td><?php echo $this->_tpl_vars['ing_residente']['cedula']; ?>
</td>
		<td><?php echo $this->_tpl_vars['ing_residente']['apellido']; ?>
, <?php echo $this->_tpl_vars['ing_residente']['nombre']; ?>
</td>
		<td><?php echo $this->_tpl_vars['ing_residente']['civ']; ?>
</td>
		<td>ING RESIDENTE</td>
		<td><?php echo $this->_tpl_vars['ing_residente']['tlf']; ?>
</td>
		<td><?php echo $this->_tpl_vars['ing_residente']['correo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['ing_residente']['modalidad']; ?>
</td>
		<td><a href="modificar_contratos_personal.php?id=<?php echo $this->_tpl_vars['ing_residente']['id']; ?>
"><img onmouseover='overlib("<strong>Modificar</strong>",WIDTH, 70)' src="./imagenes/boton1.png" onmouseout='return nd();'/></a></td>
	</tr>
</tbody>
</table>
</table>
</div>
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