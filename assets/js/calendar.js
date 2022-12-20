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
        // dayClick: function(date, jsEvent, view) {
        //     //document.getElementById('txtFecha').value = info.event.start;
        //     alert('hola mundo');
        //     $('#modalEventos').modal('show');
        // },

        select: function(info) {
            alert('hola mundo select');
            alert('selected ' + info.startStr + ' to ' + info.endStr);
        },
        dateClick: function(info) {
            $('#modalEventos').modal('show');
            document.getElementById('title').value = info.event.title;
            document.getElementById('start').value = info.event.start;

        },
        eventClick: function(info) {
            alert('hola mundo 2');
            info.jsEvent.preventDefault(); // don't let the browser navigate
            document.getElementById('title').value = info.event.title;
            document.getElementById('start').value = info.event.start;
            document.getElementById('color').value = info.event.color;

            $('#myModal').modal('show');

            if (info.event.url) {
                window.open(info.event.url);
            }
        },
        events: 'http://localhost/Pro_Inatrans/Inatrans/eventos.php',
    });

    calendar.render();
});