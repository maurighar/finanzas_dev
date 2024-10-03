<?php
require_once 'sys/funciones.php';

$data = [
        'titulo_pagina' => 'Finanzas - Resumen'
    ];

render_template('header', $data);

$year_post = isset($_POST['year'])?intval($_POST['year']):intval(date("Y"));

// if($_SERVER['REQUEST_METHOD']=='POST'){
    
//     // var_dump($_POST);

// }
?>
<h1>Resumen</h1>

<div>

    <form action="#" method="post">

        <div>
            <label class="form-label">Año</label>
            <input
                type="text"
                class="form-control"
                name="year"
                id="year"
                placeholder="Año a buscar"
                required
                value='<?= $year_post?>'
            />
        </div>

        <input type="submit" class="btn btn-primary" value="Generar Resumen">
    </form>

</div>

<table name="resumen">
	<thead>
		<tr>
			<th>tipo</th>
			<th>1</th>
			<th>2</th>
			<th>3</th>
			<th>4</th>
			<th>5</th>
			<th>6</th>
			<th>7</th>
			<th>8</th>
			<th>9</th>
			<th>10</th>
			<th>11</th>
            <th>12</th>
		</tr>
	</thead>
	<tbody>
        <tr>
<?php 
require_once 'sys\connect_db.php';

$movimientos = new Db_pdo_movimientos;
$datos_mov = $movimientos->get_tipo_x_mes($year_post);

if ($datos_mov){
    $tipo_actual = '';
    $cerrar_linea = '';
    $mes_actual = 0;
    $dirc_raiz = RAIZ_SITIO;
    foreach ($movimientos->resultado as $linea) {
        extract($linea, EXTR_PREFIX_ALL, "mov");

        // echo "[($mov_tipo)$mov_mes-$mes_actual]";
        if ($mov_tipo != $tipo_actual) {
            // antes de cerrar la linea completo las celdas
            if ($mes_actual != 0 && $mes_actual <= 12){
                for ($x = $mes_actual; $x <= 12; $x++) { echo "<td>0 (0)</td>" ;}
            }

            $tipo_actual = $mov_tipo;
            $mes_actual = 1;

            echo "$cerrar_linea<td>
            $mov_tipo
            <a href='resumen_tipo.php?tipo=$mov_tipo&year=$year_post'>(Ver)</a>
            </td>";
            // <img src='$dirc_raiz/img/ver_info.png' alt='info' width='15' height='15'>
        }

        if ($mov_mes = $mes_actual){
            echo "<td>I:$ $mov_ingreso <br>E: $ $mov_egreso</td>";
        } else{
            echo "<td>0 (0)</td>";
        }

        $mes_actual++;
        $cerrar_linea = "</tr><tr>";





    }
    for ($x = $mes_actual; $x <= 12; $x++) { echo "<td>0 (0)</td>";}
}

?>
    </tr>
	</tbody>
<tfoot>
    <td align=right colspan="13" rowspan="1">
        Desarrollado por Mauricio A. Ghilardi
    </td>
</tfoot>

</table>
<?php render_template('footer')?>