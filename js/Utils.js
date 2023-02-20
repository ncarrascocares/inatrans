function botones(estado) {

    template_btn = `
        <button type="button" class="ver btn btn-success" style="font-size:50%"><i class="fas fa-search"></i></button>
        <button type="button" class="generar btn btn-info" style="font-size:50%"><i class="fa fa-file-pdf"></i></button>`;

    if (estado === '1') {
        template_btn += ` <button type="button" class="editar btn btn-warning" data-toggle="modal" data-target="#editar-odt" style="font-size:50%"><i class="fas fa-edit"></i></button>`;
    }

    return template_btn;
}

function modal(datos) {

    let dato = datos;
    template = '';
    switch (dato) {
        case 'Preventivo':
            template += `<option value="Preventivo" selected>Preventivo</option>
                        <option value="Correctivo">Correctivo</option>
                        <option value="Otro">Otro</option>`;
            break;
        case 'Correctivo':
            template += `<option value="Correctivo" selected>Correctivo</option>
                        <option value="Preventivo">Preventivo</option>
                        <option value="Otro">Otro</option>`;
            break;
        case 'Otro':
            template += `<option value="Otro" selected>Otro</option>
                        <option value="Preventivo">Preventivo</option>
                        <option value="Correctivo">Correctivo</option>`;
            break;
        case 'Leve':
            template += `<option value="1" selected>Leve</option>
                                        <option value="2">Grave</option>
                                      <option value="3">Critico</option>`;
            break;
        case 'Grave':
            template += `<option value="2" selected>Grave</option>
                                      <option value="1">Leve</option>
                                      <option value="3">Critico</option>`;
            break;
        case 'Critico':
            template += `<option value="3" selected>Critico</option>
                                            <option value="2">Grave</option>
                                            <option value="1">Leve</option>`;
            break;

    }

    return template;
}

function modal_(datos) {

    let datos_ = datos;
    template_ = '';
    switch (datos_) {
        case 'Software':
            template_ += `<option value="1" selected>Software</option>
                            <option value="2">Hardware</option>
                            <option value="3">Electrico</option>
                            <option value="4">Otro</option>`;
            break;
        case 'Hardware':
            template_ += `<option value="2" selected>Hardware</option>
                        <option value="1">Software</option>
                        <option value="3">Electrico</option>
                        <option value="4">Otro</option>`;
            break;
        case 'Electrico':
            template_ += `<option value="3" selected>Electrico</option>
                        <option value="2">Hardware</option>
                        <option value="1">Software</option>
                        <option value="4">Otro</option>`;
            break;
        case 'Otro':
            template_ += `<option value="4" selected>Otro</option>
                        <option value="2">Hardware</option>
                        <option value="3">Electrico</option>
                        <option value="1">Software</option>`;
            break;
    }

    return template_;
}

function idiomaDataTable() {
    espanol = {
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

    return espanol;
}