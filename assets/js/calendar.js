var myModal = document.getElementById('myModal')

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev, next, today',
            center: 'title',
            right: 'dayGridMonth, timeGridWeek, listWeek'
        },
        dateClick: function(info) {
            //console.log(info);
            document.getElementById('start').value = info.dateStr;
            document.getElementById('titulo').textContent = 'Registro de eventos';
            $('#myModal').modal('show');
        }

    });
    calendar.render();
});

function CierreModal() {
    $('#myModal').modal('hide');
}