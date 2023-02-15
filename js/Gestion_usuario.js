$(document).ready(function() {
    buscar_datos();
    var funcion;
    var tipo_usuario = $('#tipo_usuario').val();
    //Este if oculta el boton crear del fichero adm_usuario si el usuario logeado es un mantenedor
    if (tipo_usuario == 2 || tipo_usuario == 3) {
        $('#button-crear').hide();
    }

    function buscar_datos(consulta) {
        funcion = 'buscar_usuario_gestion';
        //console.log(tipo_usuario);
        $.post('../controlador/UsuarioController.php', { consulta, funcion }, (response) => {
            const usuarios = JSON.parse(response);
            let template = '';
            usuarios.forEach(usuarios => {
                template += `
                <div usuarioId="${usuarios.id}" class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
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
                //Este if valida que el usuario es de tipo administrador(1) para mostrar los botones
                if (tipo_usuario == 1) {
                    //Si el usuario ingresa a este punto es por que es administrador y este segundo if oculta el boton para el usuario del tipo 4
                    if (usuarios.id_tipo_usuario != 1) {
                        template += `
                              <button href="#" class="borrar-user btn btn-sm btn-danger mr-1" type="button" data-toggle="modal" data-target="#cambio_tipo_user">
                                <i class="fas fa-window-close"></i> Eliminar
                              </button>`;
                    }
                    if (usuarios.id_tipo_usuario == 2) {
                        template += `
                              <button href="#" class="descender btn btn-sm btn-secondary ml-1" type="button" data-toggle="modal" data-target="#cambio_tipo_user">
                                <i class="fas fa-sort-amount-down mr-1"></i> Descender
                              </button>`;
                    }
                    //Este if valida que el tipo de usuario sea 2 para mostrar el boton de ascender
                    if (usuarios.id_tipo_usuario == 3) {
                        template += `
                                <button href="#" class="ascender btn btn-sm btn-primary ml-1" type="button" data-toggle="modal" data-target="#cambio_tipo_user">
                                  <i class="fas fa-sort-amount-up mr-1"></i> Ascender
                                </button>`;
                    }
                    // if (usuarios.id_tipo_usuario == 3) {
                    //     template += `
                    //           <button href="#" class="ascender btn btn-sm btn-primary ml-1" type="button" data-toggle="modal" data-target="#cambio_tipo_user">
                    //             <i class="fas fa-sort-amount-up mr-1"></i> Ascender
                    //           </button>`;
                    // }

                }
                //solo el user root y admin pueden ver y accionar el boton de eliminar
                else {
                    if (tipo_usuario == 1 && usuarios.id_tipo_usuario != 1 && usuarios.id_tipo_usuario != 4) {
                        template += `
                              <button href="#" class="borrar-user btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#cambio_tipo_user">
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

    //Evento al presionar el boton del formulario con id form-crear-user del fichero adm_usuario.php
    $('#form-crear-user').submit(e => {
        funcion = 'crear_usuario';
        //Asignando valores de los inputs del formulario
        let nombre_us = $('#nombre_us').val();
        let apellido_us = $('#apellido_us').val();
        let correo_us = $('#correo_us').val();
        let cargo_us = $('#cargo_us').val();
        let sucursal_id = $('#sucursal_id').val();
        let password_us = $('#password_us').val();

        //Envio de los datos via ajax
        $.post('../controlador/UsuarioController.php', { nombre_us, apellido_us, correo_us, cargo_us, sucursal_id, password_us, funcion }, (response) => {

            if (response == 'add') {
                $('#new-user').hide('slow');
                $('#new-user').show(1000);
                $('#new-user').hide(2000);

                //Accion para que todos los campos input se reseteen
                $('#form-crear-user').trigger('reset');
                buscar_datos();
            } else {
                $('#no-new-user').hide('slow');
                $('#no-new-user').show(1000);
                $('#no-new-user').hide(2000);

                //Accion para que todos los campos input se reseteen
                $('#form-crear-user').trigger('reset');
            }
        });

        //evento para evitar la actualización por defecto de la página
        e.preventDefault();
    });


    // Acciones para cargar la información al modal

    // 1)Accion para cuando cuando se de click al boton con la clase ascender
    $(document).on('click', '.ascender', (e) => {
        const boton = document.getElementById("boton-modal");
        const titulo = document.getElementById('titulo_modal');
        titulo.textContent = "Cambio de rol de Usuario";
        boton.classList.replace('bg-gradient-danger', 'bg-gradient-primary');
        boton.textContent = "Ascender";

        //Esta linea de codigo me permite llegar hasta el div donde se encuentra el elemento usuarioId
        const elemento = $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;

        //Asignando el valor de usuarioId en la constante (en estos momentos elemento tiene como valor todo el contenido del div del card)
        const id = $(elemento).attr('usuarioId');
        funcion = 'ascender';
        //Modificando el DOM; asignando un valor del input id_user
        $('#id_user').val(id);
        $('#funcion').val(funcion);
    });
    // 2)Accion para cuando cuando se de click al boton con la clase descender
    $(document).on('click', '.descender', (e) => {
        const boton = document.getElementById("boton-modal");
        const titulo = document.getElementById('titulo_modal');
        titulo.textContent = "Cambio de rol de Usuario";
        boton.classList.replace('bg-gradient-danger', 'bg-gradient-primary');
        boton.textContent = "Descender";

        //Esta linea de codigo me permite llegar hasta el div donde se encuentra el elemento usuarioId
        const elemento = $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;

        //Asignando el valor de usuarioId en la constante (en estos momentos elemento tiene como valor todo el contenido del div del card)
        const id = $(elemento).attr('usuarioId');
        funcion = 'descender';
        //Modificando el DOM; asignando un valor del input id_user
        $('#id_user').val(id);
        $('#funcion').val(funcion);
    });
    $(document).on('click', '.borrar-user', (e) => {
        const boton = document.getElementById("boton-modal");
        const titulo = document.getElementById('titulo_modal');
        titulo.textContent = "Borrar Cuenta de usuario";
        boton.classList.replace('bg-gradient-primary', 'bg-gradient-danger');
        boton.textContent = "Eliminar";

        //Esta linea de codigo me permite llegar hasta el div donde se encuentra el elemento usuarioId
        const elemento = $(this)[0].activeElement.parentElement.parentElement.parentElement.parentElement;

        //Asignando el valor de usuarioId en la constante (en estos momentos elemento tiene como valor todo el contenido del div del card)
        const id = $(elemento).attr('usuarioId');
        funcion = 'borrar_user';
        //Modificando el DOM; asignando un valor del input id_user
        $('#id_user').val(id);
        $('#funcion').val(funcion);
    });
    //Pasando los datos al modal
    $('#form_tipo_user').submit(e => {

        let pass_root = $('#pass_root').val();
        let id_user = $('#id_user').val();
        funcion = $('#funcion').val();

        if (pass_root == '') {
            $('#no-pass').hide('slow');
            $('#no-pass').show(1000);
            $('#no-pass').hide(2000);
        } else {
            //Envio de los datos via ajax
            $.post('../controlador/UsuarioController.php', { pass_root, id_user, funcion }, (response) => {
                console.log(response);
                switch (response) {
                    case 'ascendido':
                        $('#update-tipo').hide('slow');
                        $('#update-tipo').show(1000);
                        $('#update-tipo').hide(2000);

                        //Accion para que todos los campos input se reseteen
                        $('#form_tipo_user').trigger('reset');
                        buscar_datos();
                        break;

                    case 'descendido':
                        $('#update-tipo').hide('slow');
                        $('#update-tipo').show(1000);
                        $('#update-tipo').hide(2000);

                        //Accion para que todos los campos input se reseteen
                        $('#form_tipo_user').trigger('reset');
                        buscar_datos();
                        break;
                    case 'no-descendido':
                        $('#no-update-tipo').hide('slow');
                        $('#no-update-tipo').show(1000);
                        $('#no-update-tipo').hide(2000);

                        //Accion para que todos los campos input se reseteen
                        $('#form_tipo_user').trigger('reset');
                        buscar_datos();
                        break;
                    case 'borrado':
                        $('#borrado-user').show(1000);
                        $('#borrado-user').hide(2000);
                        $('#borrado-user').hide('slow');

                        //Accion para que todos los campos input se reseteen
                        $('#form_tipo_user').trigger('reset');
                        buscar_datos();
                        break;
                    default:
                        $('#no-borrado-user').show(1000);
                        $('#no-borrado-user').hide(2000);
                        $('#no-borrado-user').hide('slow');

                        //Accion para que todos los campos input se reseteen
                        $('#form_tipo_user').trigger('reset');
                        buscar_datos();
                        break;
                }

                // if (response == 'ascendido' || response == 'descendido') {
                //     $('#update-tipo').hide('slow');
                //     $('#update-tipo').show(1000);
                //     $('#update-tipo').hide(2000);

                //     //Accion para que todos los campos input se reseteen
                //     $('#form_tipo_user').trigger('reset');
                //     buscar_datos();
                // } else if (response == 'borrado') {
                //     $('#borrado-user').show(1000);
                //     $('#borrado-user').hide(2000);
                //     $('#borrado-user').hide('slow');

                //     //Accion para que todos los campos input se reseteen
                //     $('#form_tipo_user').trigger('reset');

                // } else {
                //     $('#no-update-tipo').hide('slow');
                //     $('#no-update-tipo').show(1000);
                //     $('#no-update-tipo').hide(2000);

                //     //Accion para que todos los campos input se reseteen
                //     $('#form_tipo_user').trigger('reset');
                //     buscar_datos();
                // }
            });
        }

        e.preventDefault();
    })
});