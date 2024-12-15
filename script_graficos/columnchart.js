google.charts.load('current', {
    packages: ['corechart', 'bar']
});
google.charts.setOnLoadCallback(dibujarGrafico);

function dibujarGrafico() {

    //solicitud AJAX  para obtener los datos de data.php 
    fetch('./script_graficos/data_columnChart.php')
        .then(response => response.json())
        .then(data => {

            var dataTable = google.visualization.arrayToDataTable(data);

            var options = {
                title: 'Cantidad de productos vendidos',
                chartArea: {
                    width: '50%'
                },
                hAxis: {
                    title: 'Producto',
                    minValue: 0
                },
                vAxis: {
                    title: 'Cantidad'
                },
                colors: ['#4285F4'],
                width: 500,
                height: 300
            };

            var chart = new google.visualization.BarChart(document.getElementById('grafica1'));

            chart.draw(dataTable, options);
        });
}


