<?php
require_once 'sys/funciones.php';

if(isset($_GET['tipo'])){
    
    // var_dump($_GET);

}

$data = [
        'titulo_pagina' => 'Finanzas - Resumen x ' . $_GET['tipo']
    ];

render_template('header', $data);

?>
<h1>Resumen - <?= $_GET['tipo'] . ' (' .  $_GET['year']?>)</h1>

<?php 

require_once 'sys\connect_db.php';

$tipos = new Db_pdo_tipos;
$tipo_detalle = $tipos->get_detalle('proddd');
var_dump( $tipo_detalle);

?>

</table>
<?php render_template('footer')?>