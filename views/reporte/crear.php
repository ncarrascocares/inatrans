<section class="card">
    <div class="card-block">
    <?php if (isset($edit) && isset($rep) && is_object($rep)):?>
        <h5 class="with-border">Editar reporte</h5>
        <?php $ruta = base_url."reporte/save/".$rep->id; ?>
    <?php else:?>
        <h5 class="with-border">Ingreso de nuevo reporte</h5>
        <?php $ruta = base_url."reporte/save"; ?>
    <?php endif;?>
        <form action="<?=$ruta?>" method="post">
        <div class="row">
            <div class="col-lg-2">
                <fieldset class="form-group">
                    <label class="form-label" for="id_interno">Id Interno</label>
                    <input type="text" class="form-control maxlength-simple" name="id_interno" id="" value="<?=isset($rep) ? $rep->id_interno : '' ?>">
                    <small class="text-muted">N° Reporte</small>
                </fieldset>
            </div>
            <div class="col-lg-2">
                <fieldset class="form-group">
                    <label class="form-label" for="simulador">Simulador</label>
                    <input type="number" name="simulador" value="<?=isset($rep) ? $rep->Simulador_id : '' ?>" class="form-control maxlength-custom-message" id="" >
                    <small class="text-muted">Ingresa el número de simulador</small>
                </fieldset>
            </div>
            <div class="col-lg-2">
                <fieldset class="form-group">
                    <label class="form-label" for="responsable">Responsable</label>
                    <input type="number" name="responsable" class="form-control maxlength-custom-message" id="" value="<?=isset($rep) ? $rep->Usuario_id : '' ?>" >
                    <small class="text-muted">Ingrese responsable del reporte</small>
                </fieldset>
            </div>        
        </div>

        <div class="row">
            <div class="col-xs-12">
                <fieldset class="form-group">
                    <label class="form-label" for="reporte_averia">Reporte de averia</label>
                    <textarea rows="2" name="reporte_averia" class="form-control maxlength-simple" placeholder="Maximo 50 caracteres" maxlength="50"><?=isset($rep) ? $rep->Reporte_averia : '' ?></textarea>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <fieldset class="form-group">
                    <label class="form-label" for="reporte_solucion">Reporte de solución</label>
                    <textarea rows="2" name="reporte_solucion" class="form-control maxlength-simple" placeholder="Maximo 50 caracteres" maxlength="50"><?=isset($rep) ? $rep->Reporte_solucion : '' ?></textarea>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <fieldset class="form-group">
                    <label class="form-label" for="observacion">Observacion</label>
                    <textarea rows="2" name="observacion" class="form-control maxlength-simple" placeholder="Maximo 50 caracteres" maxlength="50"><?=isset($rep) ? $rep->Observacion : '' ?></textarea>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <label class="form-label" for="fecha_inicio">Fecha Inicio</label>
                    <input type="date" class="form-control" name="fecha_inicio" value="<?=isset($rep) ? $rep->Fecha_inicio : '' ?>">
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <label class="form-label" for="fecha_termino">Fecha termino</label>
                    <input type="date" class="form-control" name="fecha_termino" value="<?=isset($rep) ? $rep->Fecha_termino : '' ?>">
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <label class="form-label" for="hh">Horas Hombre</label>
                    <input type="number" class="form-control" name="hh" value="<?=isset($rep) ? $rep->hh : '' ?>">
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <label class="form-label" for="estado">Estado avería</label>
                    <input type="text" class="form-control" name="estado" value="<?=isset($rep) ? $rep->Estado_averia : '' ?>">
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <label class="form-label" for="uso_repuesto">Uso de repuesto</label>
                    <input type="text" class="form-control" name="uso_repuesto" value="<?=isset($rep) ? $rep->Uso_repuesto : '' ?>">
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                <div class="form-group">
                    <label class="form-label" for="inventario_id">N° de inventario</label>
                    <input type="number" class="form-control" name="inventario_id" value="<?=isset($rep) ? $rep->Inventario_id : '' ?>">
                </div>
            </div>
        </div>
        <?php if (isset($edit) && isset($rep) && is_object($rep)):?>
            <button class="btn btn-rounded btn-inline btn-warning-outline" type="submit">Editar</button>
        <?php else:?>
            <button class="btn btn-rounded btn-inline btn-success" type="submit">Guardar</button>
        <?php endif;?>
        </form>
    </div>

   
</section>