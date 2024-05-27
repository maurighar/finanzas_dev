<?php
// require_once '../sys/funciones.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<link rel="icon" image="type/ico" href="<?php sitio(); ?>favicon.ico" />
	<meta charset="UTF-8">

	<title>
		<?= (isset($titulo_pagina))?$titulo_pagina:'Documento'; ?> 
	</title>

	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<meta name="author" content="Mauricio Antonio Ghilardi" />

	<link rel="stylesheet" href="<?php sitio(); ?>css/normalize.css" />
	<link rel="stylesheet" href="<?php sitio(); ?>css/menu.css" />
	<link rel="stylesheet" href="<?php sitio(); ?>css/table.css" />
	<link rel="stylesheet" href="<?php sitio(); ?>css/input.css" />
	<link rel="stylesheet" href="<?php sitio(); ?>css/imprimir.css" />
	<link rel="stylesheet" href="<?php sitio(); ?>css/main.css" />

	<!-- <link rel="stylesheet" href="<?php sitio(); ?>css/okayNav.css" media="screen"> -->

	<script src="<?php sitio(); ?>js/moment.min.js"></script>
	<!-- <script src="<?php sitio(); ?>js/jquery.okayNav.min.js"></script> -->
	<script src="<?php sitio(); ?>js/main.js"> </script>

	<script>
		window.onload = function() {
			var pos = window.name || 0;
			window.scrollTo(0, pos);
		}
		window.onunload = function() {
			window.name = self.pageYOffset || (document.documentElement.scrollTop + document.body.scrollTop);
		}
	</script>

</head>

<body onload="inicializar()">
	<nav role="navigation" id="nav-main" class="nav">
		<ul class="menus" role="navigation">
			<li><a href="<?php sitio(); ?>">#</a></li>
			<li><a href="<?php sitio(); ?>sistema/tempo_control.php">Tempo</a></li>
			<li>
				<a href="<?php sitio(); ?>sistema/rechazos.php?tipo=solucionado">Rechazados</a>
				<ul class="menus">
					<a href="<?php sitio(); ?>sistema/rechazos.php?tipo=completo">Completo</a>
					<li><a href="<?php sitio(); ?>sistema/consulta.php?Tipo=6&valorconsulta=Rechazos">Listado rechazados</a></li>
				</ul>
			</li>

			<li><a href="<?php sitio(); ?>certif/">Carga de certificados</a></li>
			<li><a href="<?php sitio(); ?>sistema/liquidacion.php">Liquidación</a></li>
			<li><a href="<?php sitio(); ?>sistema/config.php">Config</a></li>
			<li><a href="<?php sitio(); ?>asociados/index.php">Asociados</a></li>
			<!-- <li><a href="<?php sitio(); ?>sistema/turnos.php?op=consulta">Turnos</a></li> -->
			<li><a href="<?php sitio(); ?>sistema/Documentacion.html">Doc</a></li>
		</ul>

		<div class="version">
			<?php
			// if ($_SESSION["autentificado"] = 'SI') {
			//  	echo $_SESSION["usuario"]. '  ';
			// } else {
			// 	echo '<a href="' . RAIZ_SITIO . 'sistema/login.php"></a>  ';
			// }
			echo date("D  d-m-Y");
			?>
			<br>
			Ver: 3.1.1
		</div>
	</nav>

	<header>
		<div class="encabezado">
			<a href="<?php sitio(); ?>">
				<img src="<?php sitio(); ?>image/aprocam_logo.png" alt="APROCAM" height=81px width=159px />
			</a>
			<?php echo (MODO_LOCAL)?'<br><strong>local</strong>':'';?>
		</div>
		<div id="fecha"></div>
	</header>