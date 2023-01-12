<?php
if (isset($_GET)) {
    $id_simulador = $_GET['id'];
}

//Generación de numero de reporte
$repor = Utils::idInterno();
$reporte = "SIM" . $id_simulador . "-" . $repor->id + 1;
?>
<section class="card">
    <div class="card-block">
        <?php if (isset($edit) && isset($rep) && is_object($rep)) : ?>
            <h5 class="with-border">Editar ODT</h5>
            <?php $ruta = base_url . "reporte/save/" . $rep->id; ?>
        <?php else : ?>
            <h5 class="with-border">Ingreso de nueva ODT</h5>
            <?php $ruta = base_url . "reporte/save"; ?>
        <?php endif; ?>

        <?php
        $simulador = Utils::showSimulador();
        $usuario = Utils::showUsuario();
        $categorias = Utils::Categoria();
        $averias = Utils::Averia();
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
                        <label class="form-label" for="categoria_id">Categoria</label>
                        <select name="categoria_id" class="form-control">
                            <?php while ($cat = $categorias->fetch_object()): ?>
                               <option value="<?= $cat->id?>" <?=isset($rep) && $cat->id == $rep->Categoria_id ? 'selected' : ''?>><?= $cat->Nombre_categoria ?></option>
                            <?php endwhile;?>
                        </select>                  
                    </fieldset>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="form-group">
                        <label class="form-label" for="tipo_averia">Clasificación</label>
                        <select name="tipo_averia" class="form-control">
                            <?php while ($ave = $averias->fetch_object()): ?>
                               <option value="<?= $ave->id?>" <?=isset($rep) && $ave->id == $rep->Tipo_averia_id ? 'selected' : ''?>><?= $ave->Nombre_averia ?></option>
                            <?php endwhile;?>
                        </select>   
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
                            <input hidden type="text" name="usuario_id" class="form-control maxlength-custom-message" id="" value="<?= isset($rep) ? $rep->Usuario_id : '' ?>">
                        </fieldset>
                    </div>
                <?php else : ?>
                    <div class="col-lg-2">
                        <fieldset class="form-group">
                            <input hidden type="text" name="usuario_id" class="form-control maxlength-custom-message" id="" value="<?= $_SESSION['id'] ?>">
                        </fieldset>
                    </div>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <fieldset class="form-group">
                        <label class="form-label" for="averia">Averia</label>
                        <textarea rows="2" name="averia" class="form-control maxlength-simple" placeholder="Maximo 50 caracteres" maxlength="50"><?= isset($rep) ? $rep->Averia : '' ?></textarea>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <fieldset class="form-group">
                        <label class="form-label" for="comentario">Comentario</label>
                        <textarea rows="2" name="comentario" class="form-control maxlength-simple" placeholder="Maximo 50 caracteres" maxlength="50"><?= isset($rep) ? $rep->Comentario : '' ?></textarea>
                    </fieldset>
                </div>

            </div>
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <div class="form-group">
                        <label class="form-label" for="fecha_crea">Fecha ODT</label>
                        <input type="datetime-local" class="form-control" name="fecha_crea" value="<?= isset($rep) ? $rep->Fecha_crea : '' ?>">
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