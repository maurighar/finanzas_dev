<?php
require_once 'sys/funciones.php';

$data = [
        'titulo_pagina' => 'Finanzas - Principal'
    ];

render_template('header', $data);
?>
<h1>Main</h1>

<div class="container2col">
    <div>
        Resumen de los movientos mensuales.
        <a class="enlace_boton" href="resumen.php">Entrar</a>
    </div>
    <div>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni
        eius nam vel non, facilis nihil neque velit, nemo, eum officiis
        voluptatibus cumque! Fugiat tempora facere quos? Expedita
        deserunt nulla incidunt.
    </div>
    <div>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni
        eius nam vel non, facilis nihil neque velit, nemo, eum officiis
        voluptatibus cumque! Fugiat tempora facere quos? Expedita
        deserunt nulla incidunt.
    </div>
    <div>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni
        eius nam vel non, facilis nihil neque velit, nemo, eum officiis
        voluptatibus cumque! Fugiat tempora facere quos? Expedita
        deserunt nulla incidunt.
    </div>
</div>



<?php render_template('footer')?>