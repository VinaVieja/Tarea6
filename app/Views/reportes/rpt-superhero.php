<h2>Reporte Personalizado</h2>

<table>
  <colgroup>
    <col style="width:10%">
    <col style="width:25%">
    <col style="width:25%">
    <col style="width:20%">
    <col style="width:20%">
  </colgroup>

  <thead>
    <tr>
      <th>ID</th>
      <th>Super Hero</th>
      <th>Full name</th>
      <th>Race</th>
      <th>Alignment</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($superheros as $row): ?>
      <tr>
        <td><?= esc($row['id']) ?></td>
        <td><?= esc($row['superhero_name']) ?></td>
        <td><?= esc($row['full_name']) ?></td>
        <td><?= esc($row['race']) ?></td>
        <td><?= esc($row['alignment']) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
