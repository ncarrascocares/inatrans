$(document).ready(function() {

    lista_ordenador();



    function lista_ordenador() {
        let template_stgo = '';
        let template_anto = '';
        let template_iqq = '';
        funcion = 'lista_ordenador';

        $.post('../controlador/OrdenadorController.php', { funcion }, (response) => {
            //console.log(response);
            const lista_ord = JSON.parse(response);

            lista_ord.forEach(lista_ord => {
                //console.log(lista_ord.laboratorio_id)
                switch (lista_ord.laboratorio_id) {
                    case 3:
                        template_stgo += `<tr>
                                 <td style="border:1px solid black;">${lista_ord.identificador}</td>
                                 <td style="border:1px solid black;">${lista_ord.marca_ord}</td>
                                 <td style="border:1px solid black;">${lista_ord.mod_ord}</td>
                                 <td style="border:1px solid black;">${lista_ord.sis_ope}</td>
                                 <td style="border:1px solid black;">`;
                        if (lista_ord.antivirus == 0) {
                            template_stgo += `Sin antivirus`;
                        } else {
                            template_stgo += `Antivirus activo`;
                        }
                        template_stgo += `</td>
                                 <td style="border:1px solid black;">${lista_ord.detalle}</td>
                                 <td style="border:1px solid black;">`;
                        if (lista_ord.consola_id == 0) {
                            template_stgo += `No aplica`;
                        } else {
                            template_stgo += `${lista_ord.serial_consola}`;
                        }

                        template_stgo += `</td>
                                 <td style="border:1px solid black;">Editar - Borrar - Detalles</td>
                                 </tr>`;
                        //console.log(template_stgo);
                        break;
                    case 2:
                        template_iqq += `<tr>
                                 <td style="border:1px solid black;">${lista_ord.identificador}</td>
                                 <td style="border:1px solid black;">${lista_ord.marca_ord}</td>
                                 <td style="border:1px solid black;">${lista_ord.mod_ord}</td>
                                 <td style="border:1px solid black;">${lista_ord.sis_ope}</td>
                                 <td style="border:1px solid black;">`;
                        if (lista_ord.antivirus == 0) {
                            template_iqq += `Sin antivirus`;
                        } else {
                            template_iqq += `Antivirus activo`;
                        }
                        template_iqq += `</td>
                                 <td style="border:1px solid black;">${lista_ord.detalle}</td>
                                 <td style="border:1px solid black;">`;
                        if (lista_ord.consola_id == 0) {
                            template_iqq += `No aplica`;
                        } else {
                            template_iqq += `${lista_ord.serial_consola}`;
                        }

                        template_iqq += `</td>
                                 <td style="border:1px solid black;">Editar - Borrar - Detalles</td>
                                 </tr>`;
                        break

                    case 1:
                        template_anto += `<tr>
                                 <td style="border:1px solid black;">${lista_ord.identificador}</td>
                                 <td style="border:1px solid black;">${lista_ord.marca_ord}</td>
                                 <td style="border:1px solid black;">${lista_ord.mod_ord}</td>
                                 <td style="border:1px solid black;">${lista_ord.sis_ope}</td>
                                 <td style="border:1px solid black;">`;
                        if (lista_ord.antivirus == 0) {
                            template_anto += `Sin antivirus`;
                        } else {
                            template_anto += `Antivirus activo`;
                        }
                        template_anto += `</td>
                                 <td style="border:1px solid black;">${lista_ord.detalle}</td>
                                 <td style="border:1px solid black;">`;
                        if (lista_ord.consola_id == 0) {
                            template_anto += `No aplica`;
                        } else {
                            template_anto += `${lista_ord.serial_consola}`;
                        }

                        template_anto += `</td>
                                 <td style="border:1px solid black;">Editar - Borrar - Detalles</td>
                                 </tr>`;
                        break;
                }

            })

            $('#contenido_tabla_stgo').append(template_stgo);
            $('#contenido_tabla_iqq').append(template_iqq);
            $('#contenido_tabla_anto').append(template_anto);

        })


    }


})