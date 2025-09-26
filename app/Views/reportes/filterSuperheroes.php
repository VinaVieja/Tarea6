<style>
    table.simple-table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    table.simple-table th, table.simple-table td {
        border: 1px solid black;
        padding: 8px 12px;
        text-align: left;
    }

    table.simple-table thead {
        background-color: #f2f2f2;
    }

    table.simple-table tbody tr:nth-child(even) {
        background-color: #fafafa;
    }
</style>

<?php if (!empty($superheros)): ?>
    <center><i><b><h4>Resultados</h4></center></b></i>
    <table class="simple-table">
        <thead>
            <tr>
                <th>Superhéroe</th>
                <th>Nombre completo</th>
                <th>Raza</th>
                <th>Alineación</th>
                <th>Editora</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($superheros as $hero): ?>
                <tr>
                    <td><?= htmlspecialchars($hero['superhero_name']) ?></td>
                    <td><?= htmlspecialchars($hero['full_name']) ?></td>
                    <td><?= htmlspecialchars($hero['race']) ?></td>
                    <td><?= htmlspecialchars($hero['alignment']) ?></td>
                    <td><?= htmlspecialchars($hero['publisher_name']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
  <center><i><b><h4>Resultados</h4></center></b></i>
  <p>No se encontraron superhéroes con los filtros seleccionados.</p>
<?php endif; ?>
