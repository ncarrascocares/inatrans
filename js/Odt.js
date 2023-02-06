$(document).ready(function() {

    let id_usuario = $('#id_usuario').val();

    let funcion = 'listar_reportes';
    let tabla_tarea = $('#tabla_reporte').DataTable({

        ajax: {
            "url": "../controlador/OdtController.php",
            "method": "POST",
            "data": { funcion: funcion },
        },

        columns: [
            { data: 'id_reporte' },
            { data: 'simulador_id' },
            { data: 'averia_reporte' },
            { data: 'clasificacion' },
            { data: 'fecha_crea' },
            { data: 'responsable' },
            { data: 'nombre_categoria' },
            { data: 'nombre_averia' },
            { "defaultContent": `<button type="button" class="ver btn btn-success" style="font-size:50%"><i class="fas fa-search"></i></button>
                                 <button type="button" class="generar btn btn-info" style="font-size:50%"><i class="fa fa-file-pdf"></i></button>` }
        ],
        "language": espanol
    });

    $('#tabla_reporte tbody').on('click', '.ver', function() {
        let datos = tabla_tarea.row($(this).parents()).data();
        let id = datos.id_reporte;
        location.href = "../vista/adm_odt_detalles.php?reporte=" + id;
    });

    $('#tabla_reporte tbody').on('click', '.generar', function() {
        let datos = tabla_tarea.row($(this).parents()).data();
        let id = datos.id_reporte;
        location.href = "../vista/pdf.php?reporte=" + id;
    });

    //Listando los valores del select para seleccionar el simulador
    let select = document.getElementById("simulador_id");
    for (i = 1; i <= 11; i++) {
        option = document.createElement("option");
        option.value = i;
        option.text = "Simulador " + i;
        select.appendChild(option);
    }

    $('#form-crear-reporte').submit(e => {
        //Recibiendo los datos del formulario
        let id_usuario = $('#id_usuario').val();
        let simulador_id = $('#simulador_id').val();
        let instructor = $('#instructor').val();
        let averia_reporte = $('#averia_reporte').val();
        let categoria_id = $('#categoria_id').val();
        let fecha_crea = $('#fecha_crea').val();
        let tipo_averia_id = $('#tipo_averia_id').val();
        let tipo_odt = $('#tipo_odt').val();

        let funcion = "guardar_reporte";
        $.post('../controlador/OdtController.php', { id_usuario, simulador_id, instructor, averia_reporte, categoria_id, fecha_crea, tipo_averia_id, tipo_odt, funcion }, (response) => {
            //console.log(response);
            if (response == 'odt-insertada') {
                $('#new-report').hide('slow');
                $('#new-report').show(1000);
                $('#new-report').hide(2000);

                //Accion para que todos los campos input se reseteen
                $('#form-crear-reporte').trigger('reset');
            } else {
                $('#no-new-report').hide('slow');
                $('#no-new-report').show(1000);
                $('#no-new-report').hide(2000);

                //Accion para que todos los campos input se reseteen
                $('#form-crear-reporte').trigger('reset');
            }
        })

        e.preventDefault();
    });


});

let espanol = {
    "aria": {
        "sortAscending": ": orden ascendente",
        "sortDescending": ": orden descendente"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Llenar todas las celdas con <i>%d&lt;\\\/i&gt;<\/i>",
        "fillHorizontal": "Llenar celdas horizontalmente",
        "fillVertical": "Llenar celdas verticalmente"
    },
    "buttons": {
        "collection": "Colección <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
        "colvis": "Visibilidad de la columna",
        "colvisRestore": "Restaurar visibilidad",
        "copy": "Copiar",
        "copyKeys": "Presiona ctrl or u2318 + C para copiar los datos de la tabla al portapapeles.<br \/><br \/>Para cancelar, haz click en este mensaje o presiona esc.",
        "copySuccess": {
            "_": "Copió %ds registros al portapapeles",
            "1": "Copió un registro al portapapeles"
        },
        "copyTitle": "Copiado al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "_": "Mostrar %ds registros",
            "-1": "Mostrar todos los registros"
        },
        "pdf": "PDF",
        "print": "Imprimir"
    },
    "datetime": {
        "amPm": [
            "AM",
            "PM"
        ],
        "hours": "Horas",
        "minutes": "Minutos",
        "months": {
            "0": "Enero",
            "1": "Febrero",
            "10": "Noviembre",
            "11": "Diciembre",
            "2": "Marzo",
            "3": "Abril",
            "4": "Mayo",
            "5": "Junio",
            "6": "Julio",
            "7": "Agosto",
            "8": "Septiembre",
            "9": "Octubre"
        },
        "next": "Siguiente",
        "previous": "Anterior",
        "seconds": "Segundos",
        "weekdays": [
            "Dom",
            "Lun",
            "Mar",
            "Mie",
            "Jue",
            "Vie",
            "Sab"
        ]
    },
    "decimal": ",",
    "editor": {
        "close": "Cerrar",
        "create": {
            "button": "Nuevo",
            "submit": "Crear",
            "title": "Crear nuevo registro"
        },
        "edit": {
            "button": "Editar",
            "submit": "Actualizar",
            "title": "Editar registro"
        },
        "error": {
            "system": "Ocurrió un error de sistema (&lt;a target=\"\\\" rel=\"nofollow\" href=\"\\\"&gt;Más información)."
        },
        "multi": {
            "info": "Los elementos seleccionados contienen diferentes valores para esta entrada. Para editar y configurar todos los elementos de esta entrada con el mismo valor, haga clic o toque aquí, de lo contrario, conservarán sus valores individuales.",
            "noMulti": "Esta entrada se puede editar individualmente, pero no como parte de un grupo.",
            "restore": "Deshacer cambios",
            "title": "Múltiples valores"
        },
        "remove": {
            "button": "Eliminar",
            "confirm": {
                "_": "¿Está seguro de que desea eliminar %d registros?",
                "1": "¿Está seguro de que desea eliminar 1 registro?"
            },
            "submit": "Eliminar",
            "title": "Eliminar registro"
        }
    },
    "emptyTable": "Sin registros",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
    "infoFiltered": "(filtrado de _MAX_ registros)",
    "infoThousands": ".",
    "lengthMenu": "Mostrar _MENU_ registros",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "processing": "Procesando...",
    "search": "Buscar:",
    "searchBuilder": {
        "add": "Agregar Condición",
        "button": {
            "_": "Filtros (%d)",
            "0": "Filtrar"
        },
        "clearAll": "Limpiar Todo",
        "condition": "Condición",
        "conditions": {
            "array": {
                "contains": "Contiene",
                "empty": "Vacío",
                "equals": "Igual",
                "not": "Distinto",
                "notEmpty": "No vacío",
                "without": "Sin"
            },
            "date": {
                "after": "Mayor",
                "before": "Menor",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual",
                "not": "Distinto",
                "notBetween": "No entre",
                "notEmpty": "No vacío"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual",
                "gt": "Mayor",
                "gte": "Mayor o igual",
                "lt": "Menor",
                "lte": "Menor o igual",
                "not": "Distinto",
                "notBetween": "No entre",
                "notEmpty": "No vacío"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina con",
                "equals": "Igual",
                "not": "Distinto",
                "notEmpty": "No vacío",
                "startsWith": "Comienza con"
            }
        },
        "data": "Datos",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Filtros anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Filtro",
        "title": {
            "_": "Filtros (%d)",
            "0": "Filtrar"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Limpiar todo",
        "collapse": {
            "_": "Paneles de búsqueda (%d)",
            "0": "Paneles de búsqueda"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda...",
        "title": "Filtros activos - %d"
    },
    "select": {
        "cells": {
            "_": "%d celdas seleccionadas",
            "1": "Una celda seleccionada"
        },
        "columns": {
            "_": "%d columnas seleccionadas",
            "1": "Una columna seleccionada"
        },
        "rows": {
            "1": "Una fila seleccionada",
            "_": "%d filas seleccionadas"
        }
    },
    "thousands": ".",
    "zeroRecords": "No se encontraron registros"
}