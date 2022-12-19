var ruta_url = 'http://localhost/Pro_Inatrans/Inatrans/';
// var myModal = document.getElementById('myModal')
// let frm = document.getElementById('formulario');

// document.addEventListener('DOMContentLoaded', function() {
//     var calendarEl = document.getElementById('calendar');
//     var calendar = new FullCalendar.Calendar(calendarEl, {
//         initialView: 'dayGridMonth',
//         locale: 'es',
//         headerToolbar: {
//             left: 'prev, next, today',
//             center: 'title',
//             right: 'dayGridMonth, timeGridWeek, listWeek'
//         },
//         events: 'http://localhost/Pro_Inatrans/Inatrans/calendario/listar',
//         editable:  true,
//         dayClick:function

//     });
//     calendar.render();
// });

// function CierreModal() {
//     $('#myModal').modal('hide');
// }

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
        dayClick: function(info) {
            document.getElementById('txtFecha').value = info.event.start;
            $('#modalEventos').modal('show');
        },

        dateClick: function(info) {
            //alert('clicked ' + info.dateStr);
            $('#myModal').modal('show');
        },
        eventClick: function(info) {
            info.jsEvent.preventDefault(); // don't let the browser navigate
            document.getElementById('title').value = info.event.title;
            document.getElementById('start').value = info.event.start;
            document.getElementById('color').value = info.event.color;
            //$('#title').val(info.event.title);
            //$('#start').val(info.event.start);
            //$('#color').val(info.event.color);
            $('#myModal').modal('show');

            if (info.event.url) {
                window.open(info.event.url);
            }
        },
        events: 'http://localhost/Pro_Inatrans/Inatrans/eventos.php',
        /********Opcion para seleccionar rangos de fechas*********/
        //select: function(info) {
        //    alert('selected ' + info.startStr + ' to ' + info.endStr);
        //}
        /*********************************************************/
    });

    calendar.render();
});