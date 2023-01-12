<section class="card">
    <div class="card-block">
        <h3>Ordenes de Trabajo</h3>

        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>N° ODT</th>
                    <th>Simulador</th>
                    <th>Responsable</th>
                    <th>Averia</th>
                    <th>Comentario</th>
                    <th>Fecha creación</th>
                    <th>Estado ODT</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($rep = $reportes->fetch_object()) : ?>
                    <tr>
                        <td><?= $rep->id_interno; ?></td>
                        <td><?= $rep->Simulador; ?></td>
                        <td><?= $rep->Tecnico; ?></td>
                        <td><?= $rep->Averia; ?></td>
                        <td><?= $rep->Comentario; ?></td>
                        <td><?= $rep->Fecha_crea; ?></td>
                        <td>
                            <?php 
                                if ($rep->Estatus == 1) {
                                    echo "Abierto";
                                } else {
                                    echo "Cerrado";
                                }
                            ?>
                        </td>
                        <td>

                            <a class="btn btn-rounded btn-inline btn-warning-outline" href="<?= base_url ?>reporte/edit/<?= $rep->id ?>">Editar</a>

                            <a class="btn btn-rounded btn-inline btn-info-outline" href="<?= base_url ?>reporte/historial/<?= $rep->id ?>">+ Info</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
        </table>
    </div>
</section>