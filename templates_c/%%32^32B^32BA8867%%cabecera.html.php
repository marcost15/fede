<?php /* Smarty version 2.6.26, created on 2016-02-22 15:22:12
         compiled from cabecera.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'cabecera.html', 7, false),)), $this); ?>
<html>
	<head>
		<link rel="icon" href="./imagenes/favicon.ico" type="image/x-icon" /> 
		<link rel="shortcut icon" href="./imagenes/favicon.ico" type="image/x-icon" /> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="robots" content="noindex,nofollow" />
		<title><?php echo ((is_array($_tmp=@$this->_tpl_vars['title'])) ? $this->_run_mod_handler('default', true, $_tmp, 'FEDE') : smarty_modifier_default($_tmp, 'FEDE')); ?>
</title>
		<link rel="stylesheet" type="text/css" href="./estilo/layout.css"/> 
		<link rel="stylesheet" href="./estilo/tinydropdown.css" type="text/css" /><!-- Para el Menú -->
		<link rel="stylesheet" type="text/css" href="./estilo/cnc.css"/> 
		<link rel="stylesheet" type="text/css" href="./estilo/layoutprint.css" media="print"/>
		<script type="text/javascript" src="./js/domtableenhance.js"></script>
		<script type="text/javascript" src="../libreriasphp/FH3/FHTML/overlib/overlib.js"></script>
		<script type="text/javascript" src="./js/tinydropdown.js"></script><!-- Para el Menú -->
		<script type="text/javascript" src="../libreriasjs/sortable/sortable.js"></script>
		<script type="text/javascript" src="./js/livevalidation.js"></script>
	</head> 
	<body background="./imagenes/papel_tapiz.jpg" topmargin="0" leftmargin="0">
		<?php if ($this->_tpl_vars['fondoreporte'] == '1'): ?>
		<div id="fondoreporte">
		<?php else: ?>
		<div id="fondo">
		<?php endif; ?>
		<div id="cintillo"><img src="./imagenes/cintillo.jpg" width="1050" height="70"/></div>
		<div id="banner"><img src="./imagenes/banner1.jpg" width="1050" height="150"/></div>
		<div id="titulo">APLICACIÓN WEB PARA LA GESTION DE PROCESOS ADMINISTRATIVOS FEDE<?php if ($_SESSION['usuario']): ?> Usuario: <?php echo $_SESSION['usuario']['nombre']; ?>
 <?php echo $_SESSION['usuario']['apellido']; ?>
<?php endif; ?></div><!-- titulo -->				
		<div id="menu">
			<?php if ($_SESSION['usuario']): ?><ul id="mimenu" class="mimenu">
				<li title="Consultar / Modificar"><a href="consmod_plantel.php">Inicio</a></li>
				<li><span>Registrar</span>
				<ul>
					<li title="Registrar Plantel"><a href="registrar_plantel.php">Plantel</a></li>
					<li><span>Empresas</span>
						<ul>
							<li title="Agregar Empresa"><a href="registrar_empresa.php">Agregar</a></li>
							<li title="Consultar / Modificar Empresa"><a href="consmod_empresa.php">Consultar / Modificar</a></li>
						</ul>
					</li>
					<li><span>Inspectores </span>
						<ul>
							<li title="Agregar Empresa"><a href="registrar_contratos_personal.php">Agregar</a></li>
							<li title="Consultar / Modificar Empresa"><a href="consmod_personal_inspector.php">Consultar / Modificar</a></li>
						</ul>
					</li>
					<li><span>Consejo Comunal</span>
					<ul>
						<li title="Agregar Consejo"><a href="registrar_consejo.php">Agregar</a></li>
						<li title="Consultar / Modificar Clientes"><a href="consmod_consejo.php">Consultar / Modificar</a></li>
					</ul>
				</li>
				</ul>
				</li>
				<li><span>Admin BD</span>
					<ul>
						<li title="Servicios"><a href="servicios.php">Servicios</a></li>
						<li title="Nivel Educativo"><a href="nivel_educativo.php">Nivel Educativo</a></li>
						<li title="Municipios"><a href="municipios.php">Municipios</a></li>	
						<li title="Parroquias"><a href="parroquias.php">Parroquias</a></li>
						<li title="Niveles de Acceso"><a href="niveles.php">Niveles de Acceso</a></li>
						<li title="Privilegios"><a href="privilegios.php">Privilegios</a></li>
					</ul>
				</li>
				<li><span>Reportes</span>
					<ul>
						<li title="rp_frm_contratos_status"><a href="rp_frm_contratos_status.php">Avance de Obras</a></li>
						<li title="rp_frm_donaciones"><a href="rp_frm_dotacionesxfecha.php">Dotaciones</a></li>
						<li title="rp_frm_evaluaciones"><a href="rp_frm_evaluacionesxfecha.php">Evaluaciones</a></li>	
					</ul>
				</li>
				<li><span>Personal</span>
					<ul>
						<li title="Agregar Usuarios"><a href="registrar_personal.php">Agregar</a></li>
						<li title="Consultar / Modificar Usuarios"><a href="consmod_personal.php">Consultar / Modificar</a></li>
						<li title="Cambiar Clave"><a href="cambiar_clave.php">Cambiar Clave</a></li>
						<li class="topfirst"><a href="manual.pdf">Ayuda</a></li>
					</ul>
				</li>
				<li class="topfirst"><a href="index.php">Salir</a></li>
			<?php endif; ?>
		</div><!-- menudiv -->	
		<?php echo '
			<script type="text/javascript">
				var dropdown=new TINY.dropdown.init("dropdown", {id:\'mimenu\', active:\'menuhover\'});
			</script>
		'; ?>
			
		<div id="contenido">