<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Informe 4 - Género</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container mt-5">
    <h3 class="mb-4">Distribución de Género de Superhéroes</h3>
    <canvas id="graficoGenero" width="400" height="400"></canvas>
    <button id="btnGenero" class="btn btn-success mt-4">Obtener Datos de Género</button>
    <span id="cargandoGenero" class="d-none">Cargando datos...</span>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const canvasGenero = document.getElementById("graficoGenero");
      const btnGenero = document.getElementById("btnGenero");
      const aviso = document.getElementById("cargandoGenero");

      let graficoGenero = new Chart(canvasGenero, {
        type: 'doughnut',  // o 'pie' si prefieres
        data: {
          labels: [],
          datasets: [{
            label: 'Género',
            data: [],
            backgroundColor: [
              'rgba(52, 152, 219, 0.7)',   // Azul
              'rgba(231, 76, 60, 0.7)',    // Rojo
              'rgba(149, 165, 166, 0.7)'   // Gris
            ],
            borderColor: [
              'rgba(41, 128, 185, 1)',
              'rgba(192, 57, 43, 1)',
              'rgba(127, 140, 141, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'bottom',
            },
            tooltip: {
              callbacks: {
                label: function(context) {
                  let label = context.label || '';
                  let value = context.raw || 0;
                  return `${label}: ${value}`;
                }
              }
            }
          }
        }
      });

      btnGenero.addEventListener("click", async () => {
        try {
          aviso.classList.remove("d-none");

          const response = await fetch('/public/api/getdatainforme4');
          if (!response.ok) throw new Error("Error en la respuesta del servidor.");

          const data = await response.json();
          aviso.classList.add("d-none");

          if (data.success && Array.isArray(data.resumen)) {
            const labels = data.resumen.map(row => row.genero);
            const valores = data.resumen.map(row => row.total);

            graficoGenero.data.labels = labels;
            graficoGenero.data.datasets[0].data = valores;
            graficoGenero.update();
          } else {
            alert("Los datos recibidos no son válidos.");
          }
        } catch (err) {
          console.error(err);
          alert("Error al obtener los datos del género.");
        }
      });
    });
  </script>
</body>
</html>
