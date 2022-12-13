var myModal = document.getElementById('myModal')
let frm = document.getElementById('formulario');

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
    frm.addEventListener('submit', function(e) {
        e.preventDefault();
        const title = document.getElementById('title').value;
        const fecha = document.getElementById('start').value;
        const color = document.getElementById('color').value;
        if (title == '' || fecha == '' || color == '') {
            Swal.fire(
                'Aviso',
                'Todos los campos son requeridos',
                'warning'
            )
        } else {

            var formulario = document.getElementById('formulario');

            formulario.addEventListener('submit', function(e) {
                e.preventDefault();

                var datos = new FormData(formulario);

                fetch(base_url + 'calendario/registrar', {
                    method: 'POST',
                    body: datos
                });
            })


        }
    });
});

function CierreModal() {
    $('#myModal').modal('hide');
}