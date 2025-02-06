<?php
session_start();


class Producte {
    public $nom;
    public $preu;

    public function __construct($nom, $preu) {
        $this->nom = $nom;
        $this->preu = $preu;
    }
}


class CarretCompra {
    public $productes = [];

    public function afegirProducte($producte) {
        $this->productes[] = $producte;
        $_SESSION['carret'] = serialize($this->productes); // Guardar en la sessió
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->productes as $producte) {
            $total += $producte->preu;
        }
        return $total;
    }
}


$carret = new CarretCompra();
if (isset($_SESSION['carret'])) {
    $carret->productes = unserialize($_SESSION['carret']);
}

// comprobar con request method si ha llegado los datos del form!
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nom']) && isset($_POST['preu'])) {
    $nom = $_POST['nom'];
    $preu = floatval($_POST['preu']); 

    if (!empty($nom) && $preu > 0) {
        $producte = new Producte($nom, $preu);
        $carret->afegirProducte($producte);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MERCADONA</title>
</head>
<body>

    <h2>Afegir Producte</h2>
    <form method="post">
        <label for="nom">Nom del producte:</label>
        <input type="text" name="nom" required>

        <label for="preu">Preu (€):</label>
        <input type="number" name="preu" >

        <button type="submit">Afegir al carret</button>
    </form>

    <h2>Carret de Compra</h2>
    <table border="1">
        <tr>
            <th>Producte</th>
            <th>Preu (€)</th>
        </tr>
        <?php foreach ($carret->productes as $producte) : ?>
        <tr>
            <td><?= $producte->nom ?></td>
            <td><?= number_format($producte->preu, 2) ?> €</td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Total: <?= $carret->calcularTotal() ?> €</h3>

</body>
</html>
