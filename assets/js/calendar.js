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
<<<<<<< HEAD
        dayClick: function(info) {
            document.getElementById('txtFecha').value = info.event.start;
            $('#modalEventos').modal('show');
        },

=======
        events: {
            url: base_url + 'calendario/listar'
        },
>>>>>>> e665d40ac71c51d4e612b292cec1db8b2c6ae3fa
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
<<<<<<< HEAD

            if (info.event.url) {
                window.open(info.event.url);
=======
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
>>>>>>> e665d40ac71c51d4e612b292cec1db8b2c6ae3fa
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