<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte de Superhéroes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    table {
      width: 80%;
      border-collapse: collapse;
      margin: 20px 0;
      background-color: #ffffff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #2c3e50;
      color: #fff;
      font-size: 18px;
    }

    td {
      font-size: 16px;
      color: #34495e;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .table-title {
      font-size: 24px;
      margin: 20px;
      font-weight: bold;
      color: #2c3e50;
    }

    @media (max-width: 768px) {
      table {
        width: 100%;
      }

      th, td {
        font-size: 14px;
        padding: 10px;
      }
    }
  </style>
</head>
<body>
  <page backtop="7mm" backbottom="7mm">
  <page_header>
    [[page_cu]]/[[page_nb]]
  </page_header>

  <page_footer>
    Lista de superheroes
  </page_footer>
  <table class="tabla mt-2">
    <colgroup>
      <col style="width:5%;">
      <col style="width:25%;">
      <col style="width:30%;">
      <col style="width:20%;">
      <col style="width:20%;">
    </colgroup>
    <thead>
      <tr class="bg-primary text-light">
        <th>ID</th>
        <th>nombre</th>
        <th>alias</th>
        <th>Casa</th>
        <th>Bando</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $row): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['superhero_name'] ?></td>
          <td><?= $row['full_name'] ?></td>
          <td><?= $row['publisher_name'] ?></td>
          <td><?= $row['alignment'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</page>
</body>
</html>
