<?php
require_once 'sys/funciones.php';
require_once 'sys/connect_db.php';

$tipos = new Db_pdo_tipos;
$desc_tipo = $tipos->get_detalle($_GET['tipo']);

if(isset($_GET['tipo'])){
    
    // var_dump($_GET);
    // echo $desc_tipo;

}

$data = [
        'titulo_pagina' => 'Finanzas - Resumen x ' . $desc_tipo
    ];

render_template('header', $data);

echo "<h1>Resumen - $desc_tipo</h1>"
?>

<div>
    <canvas id="myChart"  width="50" height="10"></canvas>
</div>

<table name="resumen">
	<thead>
		<tr>
            <th>Año</th>	
            <th>Mes</th>
			<th>Ingreso</th>
			<th>Egreso</th>
		</tr>
	</thead>
	<tbody>
<?php 
$movimientos = new Db_pdo_movimientos;
$datos_mov = $movimientos->get_tipo($_GET['tipo']);

//inicializo las variables para el grafico
$etiquetas_graf = '';
$contador_graf = 0;
$egreso_graf = '';
$ingresos_graf = '';

if ($datos_mov){
    foreach ($movimientos->resultado as $linea) {
        extract($linea, EXTR_PREFIX_ALL, "mov");

        echo   "<tr><td>$mov_years</td>
                <td>$mov_months</td>
                <td>$ $mov_ingreso</td>
                <td>$ $mov_egreso</td></tr>";

        if ($contador_graf != 12) {
            $etiquetas_graf = '"' . $mov_months . '/' . $mov_years . '", ' . $etiquetas_graf;
            $ingresos_graf = $mov_ingreso . ', ' . $ingresos_graf;
            $egreso_graf = $mov_egreso . ', ' . $egreso_graf;

            $contador_graf += 1;
        }
    }
}

?>
	</tbody>
    <tfoot>
        <td align=right colspan="13" rowspan="1">
            Desarrollado por Mauricio A. Ghilardi
        </td>
    </tfoot>
</table>

<script src="js/chart_js/dist/chart.umd.js"></script>

<script>
    // Obtener una referencia al elemento canvas del DOM
    const $grafica = document.getElementById('myChart');

    // Las etiquetas son las que van en el eje X. 
    const etiquetas = [<?= $etiquetas_graf?>]
    // Podemos tener varios conjuntos de datos. Comencemos con uno
    const datos_01 = {
        label: "Egresos",
        data: [<?= $egreso_graf?>], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
        borderColor: 'rgba(228, 15, 15, 0.8)', // Color del borde
        borderWidth: 1,// Ancho del borde
    };

    const datos_02 = {
        label: "Ingresos",
        data: [<?= $ingresos_graf?>], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
        borderColor: 'rgba(13, 141, 13, 0.8)', // Color del borde
        borderWidth: 1,// Ancho del borde
    };

    new Chart($grafica, {
        type: 'line',// Tipo de gráfica
        data: {
            labels: etiquetas,
            datasets: [
                datos_01,
                datos_02,
            ]
        }
    });
</script>

<?php render_template('footer')?>