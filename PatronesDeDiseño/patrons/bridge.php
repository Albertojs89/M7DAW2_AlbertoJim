<?php include '../header.php'; ?>

<div class="container-pattern">
    <h2 class="text-center">Patrón Bridge</h2>

    <!-- Descripción con icono -->
    <div class="description-box">
        <i class="fa-solid fa-bridge icons"></i>
        <p>
            El patrón <strong>Bridge</strong> separa una abstracción de su implementación,
            permitiendo que evolucionen de manera independiente sin afectar al otro.
        </p>
    </div>

    <h3>Ejemplo en PHP:</h3>

    <!-- Cuadro de código -->
    <pre class="code-box">
<code>
&lt;?php
interface Dispositivo {
    public function encender();
    public function apagar();
}

class Televisor implements Dispositivo {
    public function encender() {
        return "Televisor encendido.";
    }

    public function apagar() {
        return "Televisor apagado.";
    }
}

class Radio implements Dispositivo {
    public function encender() {
        return "Radio encendida.";
    }

    public function apagar() {
        return "Radio apagada.";
    }
}

class ControlRemoto {
    protected $dispositivo;

    public function __construct(Dispositivo $dispositivo) {
        $this->dispositivo = $dispositivo;
    }

    public function encender() {
        return $this->dispositivo->encender();
    }

    public function apagar() {
        return $this->dispositivo->apagar();
    }
}

$radio = new Radio();
$control = new ControlRemoto($radio);
echo $control->encender();
?&gt;
</code>
    </pre>

    <div class="text-center mt-3">
        <a href="../estructurals.php" class="btn btn-secondary">🔙 Volver</a>
    </div>
</div>
