<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRTl4kQwS8fGpvh8/Jk3MdiOLPImjw1ttb+Kt+4kpj+9hb7jqk0ZHYJk0YHaq9gk" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvvx9HJy7GEO5lD9ga9+5LgA9skulKvR0auWTprUpzp26SO9l8Af9" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <canvas id="grafico"></canvas>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Objetos de referencia lienzo
    const lienzo = document.getElementById('lienzo');
    const otroLienzo = document.getElementById('otro-lienzo');
    
    // Paquete de datos recibido por servicio "FETCH ASYNC AWAIT"
    const data = [
        { year: 2010, total: 420 },
        { year: 2011, total: 492 },
        { year: 2012, total: 470 },
        { year: 2013, total: 510 },
        { year: 2014, total: 410 },
        { year: 2015, total: 620 },
        { year: 2016, total: 600 },
        { year: 2017, total: 750 }
    ];

    const grafico1 = new Chart(lienzo, {
        type: 'bar',
        data: {
            labels: data.map(row => row.year),
            datasets: [{
                data: data.map(row => row.total),
                label: 'Egresados Ing. Software'
            }]
        }
    });

    const grafico2 = new Chart(otroLienzo, {
        type: 'line',
        data: {
            labels: data.map(row => row.year),
            datasets: [{
                data: data.map(row => row.total),
                label: 'Egresados Ing. Software'
            }]
        }
    });
});
</script>
</body>
<script></script>