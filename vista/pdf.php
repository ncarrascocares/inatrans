<?php
$id_repo = (int)$_GET['reporte'];
require_once '../modelo/Odt.php';
$objeto = new Odt();
$obj = $objeto->listar_reporte_id($id_repo);

ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ODT</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            align-items: center;
        }
    </style>
</head>

<body>
    <input type="hidden" id="id_repo" value="<?= $id_repo ?>" name="">
    <div id="reporte" class="container card w-75 mt-5">
        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center;background:royalblue;color:aliceblue;">
                    <th scope="col" colspan="1">INATRANS</th>
                    <th scope="col" colspan="2">SISTEMA DE GSTION DE CALIDAD</th>
                </tr>
                <tr>
                    <th scope="col" colspan="3" style="text-align:center;background:royalblue;color:aliceblue;">Mantenimiento inatrans</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">N° Interno</th>
                    <td colspan="2"><?= $id_repo ?></td>
                </tr>
                <tr>
                    <th scope="row">Responsable de aviso</th>
                    <td colspan="2"><?= $obj[0]->instructor ?></td>
                </tr>
                <tr>
                    <th scope="row">Problema informado</th>
                    <td colspan="2"><?= $obj[0]->averia_reporte ?></td>
                </tr>
                <tr>

                    <th scope="row">Comentarios</th>
                    <td colspan="2">
                        <ul>
                            <?php foreach ($obj as $a) : ?>
                                <li><?= $a->fecha_crea_historial_reporte . ' - ' . $a->comentario_historial_reporte . '<br>' ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Simulador</th>
                    <td colspan="2"><?= $obj[0]->simulador_id ?></td>
                </tr>
                <tr>
                    <th scope="row">Estado:</th>
                    <td colspan="2"><?php if ($obj[0]->estatus_reporte == 1) {
                                        echo 'Abierto';
                                    } else {
                                        echo 'Cerrado';
                                    } ?></td>
                </tr>
                <tr>
                    <th scope="row">Mantenimiento</th>
                    <td colspan="2"><?= $obj[0]->clasificacion ?></td>
                </tr>
                <tr>
                    <th scope="row">Fecha creación</th>
                    <td colspan="2"><?= $obj[0]->fecha_crea ?></td>
                </tr>
                <?php if ($obj[0]->estatus_reporte == 0) : ?>
                    <tr>
                        <th scope="row">Fecha de Cierre</th>
                        <td colspan="2"><?= $obj[0]->fecha_cierre ?></td>
                    </tr>
                <?php endif; ?>
                <tr style="text-align: center;background:royalblue;color:aliceblue;">
                    <th scope="col" colspan="3">MANTENGAMONOS SIEMPRE EN CONTACTO</th>
                </tr>
                <tr style="text-align: center;background:royalblue;color:aliceblue;">
                    <th scope="col" colspan="3">ncarrasco@inatrans.cl</th>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php

$html = ob_get_clean();
//echo $html;
require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$option = $dompdf->getOptions();
$option->set(array('isRemoteEnable' => true));
$dompdf->setOptions($option);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'Landscape');
$dompdf->render();
$dompdf->stream("ODT-" . $id_repo, array("attachment" => true));
?>