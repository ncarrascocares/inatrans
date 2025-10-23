$(document).ready(function() {

    cargarsimulador();
    cargarmantencion();
    listar();

    function cargarsimulador() {
        const funcion = 'listar_simuladores';
        $.post('../controlador/SimuladorController.php', { funcion }, (response) => {
            const simulador = JSON.parse(response);
            let template = '<option>Selecciona simulador</option>';
            simulador.forEach(simulador => {
                template += `<option value="${simulador.id_simulador}">${simulador.nombre_simulador}</option>`;
            });

            selectsimulador.innerHTML = template;
        });
    }

    function cargarmantencion() {
        const funcion = 'listar_mantencion';
        $.post('../controlador/MantencionController.php', { funcion }, (response) => {
            const manten = JSON.parse(response);
            let template = '<option>Selecciona mantención</option>';
            manten.forEach(manten => {
                template += `<option value="${manten.id_manten}">${manten.nom_manten}</option>`;
            });

            tipo_mant.innerHTML = template;
        });
    }

    function listar(){
        const funcion = 'listar_sub';
        $.post('../controlador/SubEquipoController.php', { funcion }, (response) => {
            const datos = JSON.parse(response);
            llenarTabla(datos, 'cuerpoTabla');
        });
    }


    // Este es el submit del formulario para agregar un nuevo sub-equipo
    // Se activa al presionar el btn crear del tipo submit del modal
     $('#form_new_sub').submit(e => {

        const funcion = 'nuevo_sub';
        let name = $('#name_equipo').val();
        let sim = $('#selectsimulador').val();
        let manten = $('#tipo_mant').val();
        let detalle = $('#detalle_sub').val();

        // Validación de los campos del formulario
        if (name == '' || sim == '' || manten == '' || detalle == '') {
            $('#no-datos-sub').hide('slow');
            $('#no-datos-sub').show(1000);
            $('#no-datos-sub').hide(2000);
        } else {
            // Aquí va la llamada al controlador para enviar los datos al modelo y la base de datos
            $.post('../controlador/SubEquipoController.php', { name, sim, manten, detalle, funcion }, (response) => {
                if (response == 'add') {
                    $('#add-sub').hide('slow');
                    $('#add-sub').show(1000);
                    $('#add-sub').hide(2000);
                    $('#form_new_sub').trigger('reset');
                    $('#modal_sub').modal('hide');

                }   else {
                    $('#no-add-sub').hide('slow');
                    $('#no-add-sub').show(1000);
                    $('#no-add-sub').hide(2000);
                    $('#form_new_sub').trigger('reset');
                    $('#modal_sub').modal('hide');
                    
                }
            });
        } 

        e.preventDefault();
    });

    $('#new_element').submit(e => {
        let name = $('#name_equipo').val();
        let periocidad = $('#periocidad').val();
        let codigo = $('#codigo_elemento').val();
        let sub = $('#sub_equipo').val();
        let tipo = $('#tipo_mant').val();
        let detalles = $('#detalle_sub').val();
        
        console.log(name,periocidad,codigo,sub,tipo,detalles);

        e.preventDefault();
    });

    function llenarTabla(datos, idCuerpoTabla) {
        const cuerpoTabla = document.getElementById(idCuerpoTabla);
        cuerpoTabla.innerHTML = '';

        datos.forEach(item => {
            const fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${item.nombre}</td>
                <td>${item.detalle}</td>
                <td>${item.sim}</td>
                <td>${item.mante}</td>
                <td>${item.descrip}</td>
            `;
            cuerpoTabla.appendChild(fila);
        });
    }


})
