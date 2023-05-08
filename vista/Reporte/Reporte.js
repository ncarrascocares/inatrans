$(document).ready(function() {






    // Obtén una referencia al elemento canvas
    var canvas = document.getElementById('miGrafico');

    // Crea el contexto del gráfico
    var ctx = canvas.getContext('2d');

    // Define los datos del gráfico
    const data = {
        labels: [
            'Red',
            'Blue',
            'Yellow'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 10
        }]
    };

    // Crea el gráfico
    var grafico = new Chart(ctx, {
        type: 'pie',
        data: data,
    });
})