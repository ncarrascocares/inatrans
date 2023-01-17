$(document).ready(function() {
    var funcion = '';
    //Capturando el id desde el fichero editar_datospersonales.php
    var id_usuario = $('#id_usuario').val();
    var edit = false;

    buscar_usuario(id_usuario);

    function buscar_usuario(dato) {
        funcion = 'buscar_usuario';

        //ajax de tipo post
        $.post('../controlador/UsuarioController.php', { dato, funcion }, (response) => {
            //console.log(response);
            let nombre = '';
            let apellido = '';
            let correo_us = '';
            let cargo_us = '';
            let sucursal_id = '';
            let password_us = '';
            let status_us = '';
            let usuario_tipo = '';
            let id_tipo_usuario = '';
            let nombre_tipo_usuario = '';
            let id_sucursal = '';
            let nombre_sucursal = '';
            const usuario = JSON.parse(response);
            nombre += `${usuario.nombre}`;
            apellido += `${usuario.apellido}`;
            correo_us += `${usuario.correo_us}`;
            cargo_us += `${usuario.cargo_us}`;
            sucursal_id += `${usuario.sucursal_id}`;
            password_us += `${usuario.password_us}`;
            status_us += `${usuario.status_us}`;
            usuario_tipo += `${usuario.usuario_tipo}`;
            id_tipo_usuario += `${usuario.id_tipo_usuario}`;
            nombre_tipo_usuario = `${usuario.nombre_tipo_usuario}`;
            id_sucursal += `${usuario.id_sucursal}`;
            nombre_sucursal += `${usuario.nombre_sucursal}`;
            $('#nombre_us').html(nombre);
            $('#apellido_us').html(apellido);
            $('#nombre_tipo_usuario').html(nombre_tipo_usuario);
            $('#nombre_sucursal').html(nombre_sucursal);
            $('#cargo_us').html(cargo_us);
            $('#correo_us').html(correo_us);

        });
    }

    //para capturar eventos de click
    $(document).on('click', '.edit', (e) => {
        funcion = 'capturar_datos';

        edit = true;

        //peticion ajax
        $.post('../controlador/UsuarioController.php', { funcion, id_usuario }, (response) => {
            //console.log(response);
            const usuario = JSON.parse(response);
            $('#sucursal').val(usuario.nombre_sucursal);
            $('#cargo').val(usuario.cargo_us);
            $('#correo').val(usuario.correo_us);
        });
    });

    //evento que se produce al presionar el boton editar del formulario con id form-usuario
    $('#form-usuario').submit(e => {
        if (edit == true) {
            let sucursal = $('#sucursal').val();
            let cargo = $('#cargo').val();
            let correo = $('#correo').val();
            funcion = 'editar-usuario';
            //petición ajax
            $.post('../controlador/UsuarioController.php', { id_usuario, funcion, sucursal, cargo, correo }, (response) => {
                if (response == 'user-editado') {
                    $('#editado').hide('slow');
                    $('#editado').show(1000);
                    $('#editado').hide(2000);

                    //Accion para que todos los campos input se reseteen
                    $('#form-usuario').trigger('reset');
                }
                /* *Una vez recibida la respuesta desde el controlador, nuestra bandera pasara a false 
                    para que no se pueda volver a realizar una edición de los datos
                    ademas de borar los campos del formulario a traves de la función buscar_usuario
                */
                edit = false;
                buscar_usuario(id_usuario);
            })
        } else {
            $('#no-editado').hide('slow');
            $('#no-editado').show(1000);
            $('#no-editado').hide(2000);
            //Accion para que todos los campos input se reseteen
            $('#form-usuario').trigger('reset');
        }

        e.preventDefault();
    });

    //Evento para para cuando se presione el boton de cambiar contraseña
    $('#form-pass').submit(e => {

        funcion = 'cambiar-contra'
            //Iniciando 2 variables con los valores de los input mediante su id + el correo
        let oldpass = $('#old-pass').val();
        let newpass = $('#new-pass').val();
        let correo = $('#correo_us').val();
        //console.log(oldpass + ' ' + newpass);
        $.post('../controlador/UsuarioController.php', { id_usuario, funcion, oldpass, newpass, }, (response) => {
            //console.log(response);
            if (response == 'update') {
                $('#update-pass').hide('slow');
                $('#update-pass').show(1000);
                $('#update-pass').hide(2000);

                //Accion para que todos los campos input se reseteen
                $('#form-pass').trigger('reset');
            } else {
                $('#no-update-pass').hide('slow');
                $('#no-update-pass').show(1000);
                $('#no-update-pass').hide(2000);

                //Accion para que todos los campos input se reseteen
                $('#form-pass').trigger('reset');
            }
        });
        e.preventDefault();

    })
});