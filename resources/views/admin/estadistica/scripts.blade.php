<script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
<script>
    let SITEURL = '{{ url("/") }}';

    $(document).ready(function () {
        $.ajax({
            url: SITEURL + '/stats',
            type: 'GET',
            success: function (data) {
                showCharts(data);
            },
            error: function (data) {
                errorMessage('Error del servidor.');
            }
        });
    });

    function showCharts(data) {
        let perrosTamañoCtx = document.getElementById('perros_por_tamanio').getContext('2d');
        let perrosTamañoChart = new Chart(perrosTamañoCtx, {
            type: 'bar',
            data: {
                labels: ['Chico', 'Mediano', 'Grande'],
                datasets: [
                    {   
                        data: [data.cantPerrosPequeños, 0, 0],
                        backgroundColor: [
                            'rgba(255, 1, 1, 0.8)',
                            'rgba(54, 1, 235, 0.8)',
                            'rgba(1, 255, 86, 0.8)'
                        ],
                        borderColor: [
                            'rgba(255, 1, 1, 1)',
                            'rgba(54, 1, 235, 1)',
                            'rgba(1, 255, 86, 1)'
                        ],
                        borderWidth: 3
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontSize: 15
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Cantidad de perros',
                            fontSize: 20
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontSize: 15
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Tamaño del perro',
                            fontSize: 20
                        }
                    }]
                }
            }
        });
    }
</script>