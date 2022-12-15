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
        events: {
            url: base_url + 'calendario/listar'
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

            //Opcion del tutorial
            const url = base_url + 'calendario/registrar';
            const http = new XMLHttpRequest();
            http.open('POST', url, true);
            http.send(new FormData(frm));
            http.onreadystatechange = function() {
                if (http.readyState == 4 && http.status == 200) {
                    //http.responseType = 'json';

                    //console.log(this.responseText);
                    const respuesta = JSON.parse(http.responseText);

                    //console.log(respuesta);
                    if (respuesta.estado) {
                        console.log('HOLA');
                    }
                    $('#myModal').modal('hide');
                    Swal.fire(
                        'Aviso',
                        respuesta.msg,
                        respuesta.tipo
                    )
                }
            }

        }
    });
});

function CierreModal() {
    $('#myModal').modal('hide');
}