let url = 'http://localhost/Pro_Inatrans/Inatrans/';

document.addEventListener('DOMContentLoaded', function() {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        selectable: true,
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev, next, today',
            center: 'title',
            right: 'dayGridMonth, timeGridWeek, listWeek'
        },


        dateClick: function(info) {

            document.getElementById('txtFecha').value = info.dateStr;
            document.getElementById('txtTitulo').value = "";
            document.getElementById('txtDescripcion').value = "";
            document.getElementById('txtColor').value = "";
            document.getElementById('txtEnd').value = "";
            $('#modalEventos').modal('show');
            //location.reload();

        },
        eventClick: function(info) {
            $('#modalEventos').removeData();
            //alert(info.publicId);
            //alert(info.event.ui.backgroundColor);
            //console.log(info)
            info.jsEvent.preventDefault(); // don't let the browser navigate
            document.getElementById('txtId').value = info.event.id;
            document.getElementById('txtFecha').value = info.event.startStr;
            document.getElementById('txtTitulo').value = info.event.title;
            document.getElementById('txtDescripcion').value = info.event.extendedProps.descripcion;
            //document.getElementById('txtColor').value = info.event.color;
            //document.getElementById('txtEnd').value = info.event.end;
            $('#modalEventos').modal('show');

        },
        events: 'http://localhost/Pro_Inatrans/Inatrans/eventos.php',

    });

    $('#btnEditar').click(function() {
        console.log('Enviando!');
        var id = $('#txtId').val();
        var fecha_inicio = $('#txtFecha').val();
        var titulo = $('#txtTitulo').val();
        var descripcion = $('#txtDescripcion').val();
        var datos = {
            id: id,
            fecha_inicio: fecha_inicio,
            titulo: titulo,
            descripcion: descripcion,
        }

        //console.log(datos);

        $.ajax({
            type: "POST",
            url: url + 'calendario/editar',
            data: datos,
            success: function(data) {
                $('#resp').html(data);
            }
        });
        // var json = JSON.stringify(datos);
        // $.post("prueba.php", { data: datos }, function() {

        // }).done(function(data) {
        //     $('#resultado').html(data)
        // }).fail(function(error) {
        //     $('#resultado').html(error)
        // })


        // $.ajax(
        //         {
        //             url: 'get_var.php?var=<?php echo $var; ?>',
        //             success: function( data ) {
        //                 alert( 'El servidor devolvio "' + data + '"' );
        //             }
        //         }
        //     )
    });

    calendar.render();
});