google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(dibujarGrafico);

function dibujarGrafico() {
  // Solicitud AJAX para obtener los datos de data.php
  fetch("./script_graficos/areasChart.php")
    .then((response) => response.json())
    .then((data) => {
      var dataTable = google.visualization.arrayToDataTable(data);

      var options = {
        title: "Total de Préstamos y Regresos",
        hAxis: { title: "Tipo de Movimiento", titleTextStyle: { color: "#333" } },
        vAxis: { minValue: 0 },
        series: {
          0: { color: "red" }, // Color para Prestamo
          1: { color: "blue" } // Color para Regreso
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById("grafico3")
      );
      chart.draw(dataTable, options);
    });
}
