<h3>Calendario de mantenimiento</h3>

<div id='calendar'></div>

<!-- Modal para agegar, editar o eliminar -->
<div class="modal fade" id="modalEventos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="titulo"></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span class="aria-hidden">&times;</span>
                </button>
            </div>
            <form action="<?= base_url . "calendario/registrar" ?>" class="center" id="formulario" method="POST">

                <div class="modal-body">
                    <div class="mb-3 row">
                        <div class="col-sm-10">
                            <input hidden type="text" value="txtId" id="txtId" name="txtId">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="txtFecha" class="col-sm-2 col-form-label">Fecha</label>
                        <div class="col-sm-10">
                            <input type="text" id="txtFecha" name="txtFecha">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="txtTitulo" class="col-sm-2 col-form-label">Titulo</label>
                        <div class="col-sm-10">
                            <input type="text" id="txtTitulo" name="txtTitulo">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="txtDescripcion" class="col-sm-2 col-form-label">Descripción</label>
                        <div class="col-sm-10">
                            <textarea id="txtDescripcion" name="txtDescripcion" rows="3" cols="40"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btnRegistrar" class="btn btn-success">Registrar</button>
                    <button type="button" id="btnEditar" name="btnEditar" class="btn btn-warning">Editar</button>
                    <button type="button" name="btnEliminar" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>