<h3>Calendario de mantenimiento</h3>

<div id='calendar'></div>

<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="titulo"></h5>
                <button type="button" onclick="CierreModal()" class="btn btn-secondary" data-bs-dismiss="modalClose">Cerrar</button>
            </div>
            <form action="" id="formulario">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" name="title" id="title" class="form-control">
                        <label for="title" class="form-label">Evento</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" name="start" id="start" class="form-control">
                        <label for="start" class="form-label">Fecha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="color" name="color" id="color" class="form-control">
                        <label for="color" class="form-label">Color</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Eliminar</button>
                    <button type="submit" id="btnAccion" class="btn btn-success">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>