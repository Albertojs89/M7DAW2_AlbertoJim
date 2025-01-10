<?php
session_start();
require_once 'classes.php';

// Inicialitzar la biblioteca si no existeix a la sessió
if (!isset($_SESSION['biblioteca'])) {
    $_SESSION['biblioteca'] = serialize(new Biblioteca());
}

// Sessions i serialització: La funció serialize i unserialize garanteixen que els objectes es puguin guardar i recuperar amb totes les dades.



// Recuperar la biblioteca de la sessió
$biblioteca = unserialize($_SESSION['biblioteca']);

// Processar el formulari d'afegir llibre
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['afegir'])) {
    $nouLlibre = new Llibre($_POST['titol'], $_POST['autor'], $_POST['any'], $_POST['foto']);
    $biblioteca->afegirLlibre($nouLlibre);
    $_SESSION['biblioteca'] = serialize($biblioteca);
}

// Processar el formulari de cerca
$resultatsCerca = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cercar'])) {
    $resultatsCerca = $biblioteca->cercarLlibre($_POST['titolCerca']);
}

$llibres = $biblioteca->mostrarLlibres();
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestió de Llibres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Gestió de Llibres</h1>

    <!-- Formulari per afegir llibres -->
    <h2>Afegir Llibre</h2>
    <form method="post" class="mb-4">
        <div class="mb-3">
            <label for="titol" class="form-label">Títol</label>
            <input type="text" class="form-control" id="titol" name="titol" required>
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" required>
        </div>
        <div class="mb-3">
            <label for="any" class="form-label">Any de Publicació</label>
            <input type="number" class="form-control" id="any" name="any" required>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">URL de la Foto</label>
            <input type="url" class="form-control" id="foto" name="foto" required>
        </div>
        <button type="submit" name="afegir" class="btn btn-primary">Afegir Llibre</button>
    </form>

    <!-- Formulari per buscar llibres -->
    <h2>Cercar Llibre</h2>
    <form method="post" class="mb-4">
        <div class="mb-3">
            <label for="titolCerca" class="form-label">Títol</label>
            <input type="text" class="form-control" id="titolCerca" name="titolCerca">
        </div>
        <button type="submit" name="cercar" class="btn btn-primary">Cercar</button>
    </form>

    <!-- Resultats de la cerca -->
    <?php if (!empty($resultatsCerca)): ?>
        <h3>Resultats de la Cerca</h3>
        <ul>
            <?php foreach ($resultatsCerca as $llibre): ?>
                <li><?= htmlspecialchars($llibre->obtenirDetalls()) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- Llista de llibres -->
    <h2>Llista de Llibres</h2>
    <div class="row">
        <?php foreach ($llibres as $llibre): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="<?= htmlspecialchars($llibre->foto) ?>" class="card-img-top" alt="Portada">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($llibre->titol) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($llibre->autor) ?> (<?= htmlspecialchars($llibre->anyPublicacio) ?>)</p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
