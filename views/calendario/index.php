<h3>Calendario de mantenimiento</h3>

<div id='calendar'></div>

<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="titulo"></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span class="aria-hidden">&times;</span>
                </button>
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
                    <button type="submit" id="btnAccion" class="btn btn-success">Registrar</button>
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
            <form action="" id="formulario">
                <div class="modal-body">
                   <div id="descripcionEvento">
                        Fecha: <input type="text" id="txtFecha" name="txtFecha">
                        Título: <input type="text" id="txtTitulo" name="txtTitulo">
                        Hora: <input type="text" id="txtHora" name="txtHora" value="10:30">
                        Descripción: <textarea id="txtDescripcion" rows="3"></textarea>
                        Color: <input type="color" value="#fff000" id="txtColor"><br>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnAccion" class="btn btn-success">Registrar</button>
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>