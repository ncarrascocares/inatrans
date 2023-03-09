$(document).ready(function() {

    let id_lab = $('#id_laboratorio').val();
    let funcion = '';

    function view_lab() {
        funcion = 'listar_lab';
        $.post('../controlador/LaboratorioController.php', funcion, (response) => {
            console.log(response);
        })
    }

    $('#form-new-ordenador').submit(e => {
        let marca_ordenador = $('#marca_ordenador').val();
        let modelo_ordenado = $('#modelo_ordenado').val();
        let sis_operativo = $('#sis_operativo').val();
        let antivirus = $('#antivirus').val();
        let consola_psico = $('#consola_psico').val();
        let laboratorio = $('laboratorio').val();
        let desc_ordenador = $('#desc_ordenador').val();
    })



})