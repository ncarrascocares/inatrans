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
                    <th>Solucion</th>
                    <th>Inicio</th>
                    <th>Termino</th>
                    <th>Estado ODT</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($rep = $reportes->fetch_object()): ?>
                <tr>
                    <td><?=$rep->id_interno;?></td>
                    <td><?=$rep->Simulador;?></td>
                    <td><?=$rep->Tecnico;?></td>
                    <td><?=$rep->Averia;?></td>
                    <td><?=$rep->Solucion;?></td>
                    <td><?=$rep->Fecha_inicio;?></td>
                    <td><?=$rep->Fecha_termino;?></td>
                    <td><?=$rep->Estado_averia;?></td>
                    <td>
                        <?php if($rep->Estado_averia != "Cerrada"): ?>
                        <a class="btn btn-rounded btn-inline btn-warning-outline" href="<?=base_url?>reporte/edit/<?=$rep->id?>">Editar</a>
                        <?php endif;?>
                        <a class="btn btn-rounded btn-inline btn-info-outline" href="#">+ Info</a>
                    </td>
                </tr>
                <?php endwhile;?>
        </table>
    </div>
</section>