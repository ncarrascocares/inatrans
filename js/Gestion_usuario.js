$(document).ready(function() {
    buscar_datos();
    var funcion;

    function buscar_datos(consulta) {
        funcion = 'buscar_usuario_gestion';
        var tipo_usuario = $('#tipo_usuario').val();
        //console.log(tipo_usuario);
        $.post('../controlador/UsuarioController.php', { consulta, funcion }, (response) => {
            const usuarios = JSON.parse(response);
            let template = '';
            usuarios.forEach(usuarios => {
                template += `
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    ${usuarios.nombre_tipo_usuario}
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>${usuarios.nombre+' '+usuarios.apellido}</b></h2>
                        <p class="text-muted text-sm"><b>Cargo: </b>${usuarios.cargo_us}</p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Sucursal: ${usuarios.nombre_sucursal}, Chile</li>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-at"></i></span> Correo: ${usuarios.correo_us}</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">`;
                if (tipo_usuario == 4) {
                    if (usuarios.id_tipo_usuario != 4) {
                        template += `
                              <button href="#" class="btn btn-sm btn-danger mr-1">
                                <i class="fas fa-window-close"></i> Eliminar
                              </button>`;
                    }
                    if (usuarios.id_tipo_usuario == 2) {
                        template += `
                                <button href="#" class="btn btn-sm btn-primary ml-1">
                                  <i class="fas fa-window-close mr-1"></i> Ascender
                                </button>`;
                    }
                }
                //Si los usuarios son de tipo mantenedor, en el card aparece un boton de ascender para que puedan pasar a admin
                else {
                    if (tipo_usuario == 1 && usuarios.id_tipo_usuario != 1 && usuarios.id_tipo_usuario != 4) {
                        template += `
                              <button href="#" class="btn btn-sm btn-danger">
                                <i class="fas fa-window-close mr-1"></i> Eliminar
                              </button>`;
                    }
                }
                template += `</div>
                  </div>
                </div>
              </div>
                `;
            });
            $('#usuarios').html(template);
        });
    }

    $(document).on('keyup', '#buscar', function() {
        let valor = $(this).val();
        if (valor != "") {
            buscar_datos(valor);
        } else {
            buscar_datos();
        }
    });
});