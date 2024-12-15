google.charts.load("current", {
  packages: ["corechart"],
});
google.charts.setOnLoadCallback(dibujarGrafico);

function dibujarGrafico() {
  //solicitud AJAX  para obtener los datos de data.php
  fetch("./script_graficos/data_cilcleChart.php")
    .then((response) => response.json())
    .then((data) => {
      var dataTable = google.visualization.arrayToDataTable(data);

      var options = {
        title: "Suma total de proveedores",
        legend: "none",
        pieSliceText: "label",
        slices: {
          4: {
            offset: 0.2,
          },
          12: {
            offset: 0.3,
          },
          14: {
            offset: 0.4,
          },
          15: {
            offset: 0.5,
          },
        },
      };

      var chart = new google.visualization.PieChart(
        document.getElementById("grafico2")
      );
      chart.draw(dataTable, options);
    });
}
