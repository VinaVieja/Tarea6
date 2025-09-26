<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Exportar tabla a Excel</title>
  <style>
    table {
      border-collapse: collapse;
      width: 50%;
      margin: 20px 0;
    }
    th, td {
      border: 1px solid #333;
      padding: 8px 12px;
      text-align: left;
    }
    button {
      padding: 8px 16px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <button id="export-btn" type="button">Exportar a Excel</button>

  <table id="tabla">
    <thead>
      <tr>
        <th>#</th>
        <th>Apellidos</th>
        <th>Nombres</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Pachas</td>
        <td>Jose</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Cardenas</td>
        <td>Luis</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Martinez</td>
        <td>Carlos</td>
      </tr>
    </tbody>
  </table>

  <script>
    document.getElementById('export-btn').addEventListener('click', function () {
      // Obtener la tabla
      const tabla = document.getElementById('tabla');

      // Crear el contenido HTML de la tabla para exportar
      let tablaHTML = tabla.outerHTML.replace(/ /g, '%20');

      // Nombre del archivo Excel
      const filename = 'tabla_exportada.xls';

      // Crear link temporal
      const downloadLink = document.createElement('a');
      document.body.appendChild(downloadLink);

      if (navigator.msSaveOrOpenBlob) {
        // Para IE
        const blob = new Blob(['\ufeff', tablaHTML], {
          type: 'application/vnd.ms-excel',
        });
        navigator.msSaveOrOpenBlob(blob, filename);
      } else {
        // Para otros navegadores
        downloadLink.href = 'data:application/vnd.ms-excel, ' + tablaHTML;
        downloadLink.download = filename;
        downloadLink.click();
      }

      document.body.removeChild(downloadLink);
    });
  </script>

</body>
</html>
