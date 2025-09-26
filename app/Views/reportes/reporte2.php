<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte de Ventas</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #f5f5f5;
      color: #333;
      padding: 20px;
    }

    .text-center {
      text-align: center;
    }

    .text-end {
      text-align: right;
    }

    .text-justify {
      text-align: justify;
    }

    .mb-1 { margin-bottom: 5px; }
    .mb-2 { margin-bottom: 10px; }
    .mb-3 { margin-bottom: 15px; }

    .bg-secondary {
      background-color: #ecf0f1;
    }

    .bg-primary {
      background-color: #3498db;
    }

    .bg-danger {
      background-color: #e74c3c;
    }

    .text-light {
      color: #fff;
    }

    .mt-1 { margin-top: 5px; }
    .mt-2 { margin-top: 10px; }
    .mt-3 { margin-top: 15px; }

    h1, h2 {
      color: black;
      font-weight: 700;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table td, th {
      border: 1px solid #ccc;
      padding: 12px;
      text-align: center;
    }

    table th {
      background-color: #3498db;
      color: white;
      font-weight: bold;
    }

    table tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    table tr:hover {
      background-color: #f1f1f1;
      cursor: pointer;
    }

    .footer {
      margin-top: 30px;
      text-align: center;
      font-size: 14px;
      color: #555;
    }

    .footer strong {
      color: gray;
    }
  </style>
</head>
<body>
  <div class="text-center">
    <h1>Reporte de Ventas</h1>
    <h2>Área: <?= $area ?></h2>
  </div>

  <table>
    <colgroup>
      <col style="width: 10%;">
      <col style="width: 60%;">
      <col style="width: 30%;">
    </colgroup>
    <thead>
      <tr>
        <th>#</th>
        <th>Producto</th>
        <th>Precio</th>
      </tr>
    </thead>
    <tbody>
       <?php foreach ($productos as $producto): ?>
        <tr>
          <td><?= $producto['id'] ?></td>
          <td><?= $producto['descripcion'] ?></td>
          <td><?= $producto['precio'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="footer">
    <strong><?= $autor ?></strong>
  </div>
</body>
</html>
