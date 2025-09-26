<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container mt-2">
    <canvas id="lienzo" width="400" height="200"></canvas>
    <button id="obtener-datos" class="btn btn-primary mt-3">Obtener Datos</button>
    <span id="aviso" class="d-none">Espere por favor</span>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const lienzo = document.getElementById("lienzo");
      const btnDatos = document.getElementById("obtener-datos");
      let grafico = null;

      // Colores para las barras
      const backgroundColors = [
        'rgba(46, 204, 113, 0.7)',   
        'rgba(52, 152, 219, 0.7)',  
        'rgba(241, 196, 15, 0.7)',  
        'rgba(231, 76, 60, 0.7)', 
        'rgba(52, 73, 94, 0.7)'     
      ];
      const borderColor = [
        'rgba(46, 204, 113, 0.7)',
        'rgba(52, 152, 219, 0.7)', 
        'rgba(241, 196, 15, 0.7)',   
        'rgba(231, 76, 60, 0.7)',   
        'rgba(52, 73, 94, 0.7)'    
      ];

      function renderGraphic() {
        grafico = new Chart(lienzo, {
          type: 'bar',
          data: {
            labels: [],
            datasets: [{
              label: 'Popularidad de Superhéroes',
              data: [],
              backgroundColor: [],  // se asignará al obtener datos
              borderColor: [],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
          
        });
      }

      btnDatos.addEventListener("click", async () => {
        try {
          aviso.classList.remove("d-none");
          const response = await fetch('/public/api/getdatainforme2');

          if (!response.ok) {
            throw new Error('No se pudo establecer comunicación con el servidor.');
          }

          const data = await response.json();
          aviso.classList.add("d-none");

          if (data.success && Array.isArray(data.resumen)) {
            const labels = data.resumen.map(row => row.superhero);
            const valores = data.resumen.map(row => row.popularidad);

            // Para asignar colores, repetimos el array si hay más datos que colores disponibles
            const colors = valores.map((_, i) => backgroundColors[i % backgroundColors.length]);

            grafico.data.labels = labels;
            grafico.data.datasets[0].data = valores;
            grafico.data.datasets[0].backgroundColor = colors;
            grafico.update();
          } else {
            alert("Los datos recibidos no son válidos.");
          }

        } catch (error) {
          console.error(error);
          alert("Ocurrió un error al obtener los datos.");
        }
      });

      renderGraphic();

      // Mejora de la función que procesa el arreglo amigos
      const amigos = [
        { amigos: 'Luis', edad: 25, ciudad: 'Lima' },
        { amigos: 'Ana', edad: 30, ciudad: 'Arequipa' },
        { amigos: 'Carlos', edad: 28, ciudad: 'Cusco' },
        { amigos: 'Maria', edad: 22, ciudad: 'Trujillo' },
        { amigos: 'Jose', edad: 35, ciudad: 'Chiclayo' }
      ];

      // Extraer nombres correctamente
      let nombres = amigos.map(element => element.amigos);

      // Extraer edades correctamente
      const edades = amigos.map(element => element.edad);

      console.log("Nombres:", nombres);
      console.log("Edades:", edades);
    });
  </script>
</body>
</html>
