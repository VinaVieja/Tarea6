<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Películas o Filtrar Lista de Superhéroes</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      flex-direction: column;
      margin: 0;
    }

    .container {
      text-align: center;
      width: 80%;
      max-width: 900px;
    }

    h1 {
      font-size: 32px;
      color: #2c3e50;
      margin-bottom: 20px;
    }

    .img-container img {
      max-width: 80%;
      height: auto;
      margin-bottom: 20px;
    }

    .form-container {
      margin-bottom: 30px;
    }

    .form-container select,
    .form-container button {
      padding: 10px 15px;
      font-size: 16px;
      border-radius: 5px;
      margin: 10px 5px;
      border: 1px solid #ccc;
    }

    .form-container button {
      background-color: #3498db;
      color: white;
      border: none;
      cursor: pointer;
    }

    .form-container button:hover {
      background-color: #2980b9;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #2c3e50;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Buscar Películas o Filtrar Lista de Superhéroes</h1>
    <div class="img-container">
      <img src="../public/foto.jpg" alt="Superhéroes">
    </div>

    <!-- Formulario de Selección -->
    <div class="form-container">
      <form action="<?= base_url('reporte/reporte4') ?>" method="post">
        <label for="publisher_id">Seleccionar Casa:</label>
        <select name="publisher_id" id="publisher_id" required>
          <option value="">-- Selecciona una Casa --</option>
          <?php foreach ($publishers as $publisher): ?>
            <option value="<?= $publisher['id'] ?>"><?= $publisher['publisher_name'] ?></option>
          <?php endforeach; ?>
        </select>

        <button type="submit"><i class="fas fa-search"></i> Buscar</button>
      </form>
    </div>

    <!-- Mostrar Tabla solo si hay resultados -->
    <?php if (!empty($heroes)): ?>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Alias</th>
            <th>Casa</th>
            <th>Bando</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($heroes as $hero): ?>
            <tr>
              <td><?= $hero['id'] ?></td>
              <td><?= $hero['superhero_name'] ?></td>
              <td><?= $hero['full_name'] ?></td>
              <td><?= $hero['publisher_name'] ?></td>
              <td><?= $hero['alignment'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php elseif (isset($heroes) && empty($heroes)): ?>
      <p>No se encontraron superhéroes para esta casa.</p>
    <?php endif; ?>
  </div>
</body>
</html>
