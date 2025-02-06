<?php
session_start();

// Definimos la classe Usuari
class Usuari {
    public $nom;
    public $edat;
    public $correu;

    public function __construct($nom, $edat, $correu) {
        $this->nom = $nom;
        $this->edat = $edat;
        $this->correu = $correu;
    }

    // Método para validar datos
    public function validarDades() {
        if (!is_numeric($this->edat) || $this->edat <= 0) {
            return "Tiene que ser numero positivo";
        }
       
        
    }
}

$missatgeError = "";
$usuariCreat = null;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = ($_POST['nom']);
    $edat = ($_POST['edat']);
    $correu = ($_POST['correu']);

    $usuari = new Usuari($nom, $edat, $correu);
    $validacio = $usuari->validarDades();

    if ($validacio === true) {
      //guardar el usuario...
        $_SESSION['usuari'] = serialize($usuari); 
        $usuariCreat = $usuari;
    } else {
        $missatgeError = $validacio;
    }
}


if (isset($_SESSION['usuari'])) {
    $usuariCreat = unserialize($_SESSION['usuari']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulari d'Inscripció</title>
</head>
<style>
  .error{
    color:red;
    font-weight: bold;
  }
</style>
<body>

    <h2>Inscripció d'Usuari</h2>
    <?php if ($missatgeError): ?>
        <p class="error"><?= $missatgeError ?></p>
    <?php endif; ?>

    <form method="post">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required>

        <label for="edat">Edat:</label>
        <input type="number" name="edat" required>

        <label for="correu">Correu electrònic:</label>
        <input type="email" name="correu" required>

        <button type="submit">Enviar</button>
    </form>

    <?php if ($usuariCreat): ?>
        <h3>Usuari Registrat</h3>
        <p><strong>Nom:</strong> <?= $usuariCreat->nom ?></p>
        <p><strong>Edat:</strong> <?= $usuariCreat->edat ?></p>
        <p><strong>Correu:</strong> <?= $usuariCreat->correu ?></p>
    <?php endif; ?>

</body>
</html>
