<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Informe 5 - Publisher</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container mt-5">
    <h3 class="mb-4">Distribución de Publishers de Superhéroes</h3>
    <canvas id="graficoPublisher" width="400" height="400"></canvas>
    <button id="btnPublisher" class="btn btn-primary mt-4">Obtener Datos de Publisher</button>
    <span id="cargandoPublisher" class="d-none">Cargando datos...</span>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const canvasPublisher = document.getElementById("graficoPublisher");
      const btnPublisher = document.getElementById("btnPublisher");
      const aviso = document.getElementById("cargandoPublisher");

      let graficoPublisher = new Chart(canvasPublisher, {
        type: 'bar',
        data: {
          labels: [],
          datasets: [{
            label: 'Total por Publisher',
            data: [],
            backgroundColor: 'rgba(54, 162, 235, 0.7)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true,
              precision: 0
            }
          },
          plugins: {
            legend: { position: 'top' },
            tooltip: {
              callbacks: {
                label: context => `${context.parsed.y}`
              }
            }
          }
        }
      });

      btnPublisher.addEventListener("click", async () => {
        try {
          aviso.classList.remove("d-none");

          const response = await fetch('/dashboard/getDataInforme5');
          if (!response.ok) throw new Error("Error en la respuesta del servidor.");

          const data = await response.json();
          aviso.classList.add("d-none");

          console.log(data); // Para depurar

          if (data.success && Array.isArray(data.resumen)) {
            const labels = data.resumen.map(row => row.publisher);
            const valores = data.resumen.map(row => parseInt(row.total));

            graficoPublisher.data.labels = labels;
            graficoPublisher.data.datasets[0].data = valores;
            graficoPublisher.update();
          } else {
            alert("Los datos recibidos no son válidos.");
          }
        } catch (err) {
          console.error(err);
          alert("Error al obtener los datos de publishers.");
        }
      });
    });
  </script>
</body>
</html>
