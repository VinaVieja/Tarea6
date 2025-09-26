<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Informe 3 - Alineación de Superhéroes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container my-5">
    <h3 class="mb-4">Alineación de Superhéroes</h3>
    <canvas id="lienzo"></canvas>
    <button id="obtener-datos" class="btn btn-primary mt-3">Obtener Datos</button>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const lienzo = document.getElementById("lienzo");
    const btnDatos = document.getElementById("obtener-datos");
    let grafico = null;

    // Función para crear o actualizar el gráfico
    function renderGraphic(labels, data) {
      if (grafico) {
        grafico.destroy(); // Destruir gráfico anterior si existe
      }

      grafico = new Chart(lienzo, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: 'Alineación de Superhéroes',
            data: data,
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                precision: 0 
              }
            }
          }
        }
      });
    }

    // Evento para obtener datos al hacer clic
    btnDatos.addEventListener("click", async () => {
  try {
    const response = await fetch('<?= base_url()?>/public/api/getdatainforme3', { method: 'GET' });

    if (!response.ok) {
      throw new Error("No se pudo conectar al servicio");
    }

    const data = await response.json();

    if (data.success){
      const labels = data.resumen.map(item => item.alignment);
      const values = data.resumen.map(item => item.total);
      renderGraphic(labels, values); // Crear o actualizar el gráfico
    } else {
      alert(data.message);
    }

  } catch (error) {
    console.error("Error:", error);
    alert("Hubo un problema al obtener los datos.");
  }
});

    renderGraphic(); 
  </script>
</body>
</html>
