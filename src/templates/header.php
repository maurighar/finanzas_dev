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

	<?php render_template('nav'); ?>

	<header>
		<div class="encabezado">
			<a href="<?php sitio(); ?>">
				Finanzas
			</a>
			<?php echo (MODO_LOCAL)?'<br><strong>local</strong>':'';?>
		</div>
	</header>