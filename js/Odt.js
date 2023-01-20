$(document).ready(function() {
    let funcion = 'listar_reportes';

    $('#tabla_reporte').DataTable({
        ajax: {
            "url": "../controlador/OdtController.php",
            "method": "POST",
            "data": { funcion: funcion }
        },
        columns: [
            { data: 'id_reporte' },
            { data: 'id_interno' },
            { data: 'simulador_id' },
            { data: 'usuario_id' },
            { data: 'averia_reporte' },
            { data: 'comentario_reporte' },
            { data: 'categoria_id' },
            { data: 'fecha_crea' },
            { data: 'estatus_reporte' },
            { data: 'tipo_averia_id' },
        ],
    });
})