<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reportes personalizados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <form action="<?= base_url('reportes/filterSuperheroes') ?>" method="POST">
            <h4>Filtrar superheroes</h4>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="form-floating">
                        <select name="publisher_id" id="publisher_id" class="form-select">
                            <option value="">Seleccione Editora</option>
                            <?php foreach ($publishers as $publisher): ?>
                                <option value="<?= htmlspecialchars($publisher['id']) ?>"
                                    <?= (isset($selected['publisher_id']) && $selected['publisher_id'] == $publisher['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($publisher['publisher_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="publisher_id">Editora</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating">
                        <select name="race_id" id="race_id" class="form-select">
                            <option value="">Seleccione Raza</option>
                            <?php foreach ($races as $race): ?>
                                <option value="<?= htmlspecialchars($race['id']) ?>"
                                    <?= (isset($selected['race_id']) && $selected['race_id'] == $race['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($race['race']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="race_id">Raza</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating">
                        <select name="alignment_id" id="alignment_id" class="form-select">
                            <option value="">Seleccione Alineación</option>
                            <?php foreach ($alignments as $alignment): ?>
                                <option value="<?= htmlspecialchars($alignment['id']) ?>"
                                    <?= (isset($selected['alignment_id']) && $selected['alignment_id'] == $alignment['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($alignment['alignment']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="alignment_id">Alineación</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-primary mt-3">Aplicar filtros</button>
        </form>

        <?php if (!empty($superheros)): ?>
            <h4 class="mt-4">Resultados</h4>
            <table class="table table-striped">
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
        <?php elseif (isset($superheros)): ?>
            <p class="mt-4">No se encontraron superhéroes con los filtros seleccionados.</p>
        <?php endif; ?>
    </div>
</body>
</html>
