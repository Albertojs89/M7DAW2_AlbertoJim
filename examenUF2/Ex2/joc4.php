<?php
session_start();


class Factura {
    public $client;
    public $producte;
    public $quantitat;
    public $preuUnitari;
    public $descompte = 0;

    public function __construct($client, $producte, $quantitat, $preuUnitari) {
        $this->client = $client;
        $this->producte = $producte;
        $this->quantitat = $quantitat;
        $this->preuUnitari = $preuUnitari;
    }

    // total de la facturra--------------------------------
    public function calcularTotal() {
        $total = $this->quantitat * $this->preuUnitari;
        if ($this->descompte > 0) {
            $total -= ($total * $this->descompte / 100);
        }
        return $total;
    }

    // descuento ----------------------------------------------------------------
    public function aplicarDescompte($percentatge) {
        $this->descompte = $percentatge;
    }
}

// Inicializar la lista de facturas
$factures = [];

// Si ya hay facturas guardadas en sesión, recuperarlas
if (isset($_SESSION['factures'])) {
    $factures = unserialize($_SESSION['factures']);
} else {
    // facturas aleatorias---_>>>
    $clients = ["Alberto", "Jéssica", "Maria", "Carlos", "Laura"];
    $productes = ["Ordinador", "Mòbil", "Tablet", "Monitor", "Impressora"];

    for ($i = 0; $i < 5; $i++) {
        $client = $clients[array_rand($clients)];
        $producte = $productes[array_rand($productes)];
        $quantitat = rand(1, 5);
        $preuUnitari = rand(50, 500);
        $factura = new Factura($client, $producte, $quantitat, $preuUnitari);
        $factures[] = $factura;
    }

    // Aplicar un descompte a una factura aleatoria
    $factures[array_rand($factures)]->aplicarDescompte(rand(5, 20)); // Descompte entre 5% i 20%

    // Guardar en sessió
    $_SESSION['factures'] = serialize($factures);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Llista de Factures</title>
</head>
<body>

    <h2>Llista de Factures</h2>
    <table border="1">
        <tr>
            <th>Client</th>
            <th>Producte</th>
            <th>Quantitat</th>
            <th>Preu Unitari (€)</th>
            <th>Descompte (%)</th>
            <th>Total (€)</th>
        </tr>
        <?php foreach ($factures as $factura) : ?>
        <tr>
            <td><?= $factura->client ?></td>
            <td><?= $factura->producte ?></td>
            <td><?= $factura->quantitat ?></td>
            <td><?= number_format($factura->preuUnitari, 2) ?></td>
            <td><?= $factura->descompte ?></td>
            <td><?= number_format($factura->calcularTotal(), 2) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
