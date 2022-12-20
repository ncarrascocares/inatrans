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
            document.getElementById('txtColor').value = info.event.color;
            $('#modalEventos').modal('show');

        },
        events: 'http://localhost/Pro_Inatrans/Inatrans/eventos.php',

    });

    calendar.render();
});