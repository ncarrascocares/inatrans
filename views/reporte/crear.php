<?php 
    if (isset($_GET)) {
        $id_simulador = $_GET['id'];
    }

    //Generación de numero de reporte
    $repor = Utils::idInterno();
    $reporte = "SIM".$id_simulador."-".$repor->id + 1;
?>
<section class="card">
    <div class="card-block">
        <?php if (isset($edit) && isset($rep) && is_object($rep)) : ?>
            <h5 class="with-border">Editar ODT</h5>
            <?php $ruta = base_url . "reporte/save/".$rep->id; ?>
        <?php else : ?>
            <h5 class="with-border">Ingreso de nueva ODT</h5>
            <?php $ruta = base_url . "reporte/save"; ?>
        <?php endif; ?>

        <?php 
        $simulador = Utils::showSimulador();
        $usuario = Utils::showUsuario();
        
        // var_dump($usuario);
        // die();
        ?>
        <form action="<?= $ruta ?>" method="post">

            <div class="row">
                <div class="col-lg-2">
                    <fieldset class="form-group">
                        <label class="form-label" for="id_interno">N° ODT</label>
                        <input type="text" readonly class="form-control maxlength-simple" name="id_interno" id="" value="<?= isset($rep) ? $rep->id_interno : $reporte ?>">
                    </fieldset>
                </div>
                <div class="col-xs-2">
                    <fieldset class="form-group">
                        <label class="form-label" for="categoria">Categoria</label>
                        <input type="number" class="form-control maxlength-simple" name="categoria" value="<?= isset($rep) ? $rep->Categoria_id : '' ?>">
                    </fieldset>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="form-group">
                        <label class="form-label" for="tipo_averia">Tipo averia</label>
                        <input type="number" class="form-control" name="tipo_averia" value="<?= isset($rep) ? $rep->Tipo_averia_id : '' ?>">
                    </div>
                </div>

                <div class="col-lg-2">
                        <fieldset class="form-group">
                        <!-- <label class="form-label" for="simulador">Simulador</label> -->
                        <input hidden type="text" name="simulador" class="form-control maxlength-custom-message" id="" value="<?= isset($rep) ? $rep->Simulador_id : $id_simulador ?>">
                        </fieldset>
                </div>
                <?php if (isset($edit) && isset($rep) && is_object($rep)) : ?>
                <div class="col-lg-2">
                    <fieldset class="form-group">
                        <!-- <label class="form-label" for="responsable">Usuario</label> -->
                        <input hidden type="text" name="responsable" class="form-control maxlength-custom-message" id="" value="<?= isset($rep) ? $rep->Usuario_id : '' ?>">
                    </fieldset>
                </div>
                <?php else : ?>
                    <div class="col-lg-2">
                    <fieldset class="form-group">
                    <input hidden type="text" name="responsable" class="form-control maxlength-custom-message" id="" value="<?=$_SESSION['id']?>">
                    </fieldset>
                </div>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <fieldset class="form-group">
                        <label class="form-label" for="reporte_averia">Averia</label>
                        <textarea rows="2" name="reporte_averia" class="form-control maxlength-simple" placeholder="Maximo 50 caracteres" maxlength="50"><?= isset($rep) ? $rep->Averia : '' ?></textarea>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <fieldset class="form-group">
                        <label class="form-label" for="reporte_solucion">Solución</label>
                        <textarea rows="2" name="reporte_solucion" class="form-control maxlength-simple" placeholder="Maximo 50 caracteres" maxlength="50"><?= isset($rep) ? $rep->Solucion : '' ?></textarea>
                    </fieldset>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <div class="form-group">
                        <label class="form-label" for="fecha_inicio">Fecha Inicio</label>
                        <input type="date" class="form-control" name="fecha_inicio" value="<?= isset($rep) ? $rep->Fecha_inicio : '' ?>">
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="form-group">
                        <label class="form-label" for="fecha_termino">Fecha termino</label>
                        <input type="date" class="form-control" name="fecha_termino" value="<?= isset($rep) ? $rep->Fecha_termino : '' ?>">
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="form-group">
                        <label class="form-label" for="hh">Horas Hombre</label>
                        <input type="number" class="form-control" name="hh" value="<?= isset($rep) ? $rep->hh : '' ?>">
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="form-group">
                        <label class="form-label" for="estado">Estado avería</label>
                        <input type="text" class="form-control" name="estado" value="<?= isset($rep) ? $rep->Estado_averia : '' ?>">
                    </div>
                </div>
            </div>
            <?php if (isset($edit) && isset($rep) && is_object($rep)) : ?>
                <button class="btn btn-rounded btn-inline btn-warning-outline" type="submit">Editar</button>
            <?php else : ?>
                <button class="btn btn-rounded btn-inline btn-success" type="submit">Guardar</button>
            <?php endif; ?>
        </form>
    </div>


</section>