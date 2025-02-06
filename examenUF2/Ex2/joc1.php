<?php
session_start();

class JocAdivinacio {
    public $numeroSecret;
    public $intents;

    public function __construct() {
        if (!isset($_SESSION['numeroSecret'])) {
            //hacemos numero random y lo guardamos en session
            $_SESSION['numeroSecret'] = rand(1, 20);
            //guardamos también el numero de intentos en session
            $_SESSION['intents'] = 0;
        }
        $this->numeroSecret = $_SESSION['numeroSecret'];
        $this->intents = &$_SESSION['intents'];
    }

    public function comprovar($num) {
        $this->intents++;
        if ($num < $this->numeroSecret) {
            return "El número es más grande.";
        } elseif ($num > $this->numeroSecret) {
            return "El número es más pequeño.";
        } else {
            $mensaje = "¡Correcto! Eres así de malo con estos $this->intents intentos.";
            session_unset(); 
            return $mensaje;
        }
    }

    public function getIntents() {
        return $this->intents;
    }
}

$juego = new JocAdivinacio();
$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numero'])) {
    $numeroUsuario = (int)$_POST['numero'];
    //Comprobación de si el numero es correcto 
    if ($numeroUsuario >= 1 && $numeroUsuario <= 20) {
        $mensaje = $juego->comprovar($numeroUsuario);
    } else {
        $mensaje = "Introduce un número válido entre 1 y 20.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina!</title>
</head>
<body>
    <h2>Endevina el número (1-20)</h2>
    <form method="post">
        <label for="numero">Introduce un número:</label>
        <input type="number" name="numero" id="numero" min="1" max="20" required>
        <button type="submit">Comprobar</button>
    </form>
    <p><?php echo $mensaje; ?></p>
    <p>Intentos: <?php echo $juego->getIntents(); ?></p>
</body>
</html>
