<?php include '../header.php'; ?>

<div class="container-pattern">
    <h2 class="text-center">Patrón Observer</h2>

    <!-- Descripción con icono -->
    <div class="description-box">
        <i class="fa-solid fa-eye"></i>
        <p>
            El patrón <strong>Observer</strong> define una dependencia uno-a-muchos entre objetos,
            permitiendo que cuando un objeto cambie de estado, todos sus dependientes sean notificados automáticamente.
        </p>
    </div>

    <h3>Ejemplo en PHP:</h3>

    <!-- Cuadro de código -->
    <pre class="code-box">
<code>
&lt;?php
interface Observador {
    public function actualizar($mensaje);
}

class Usuario implements Observador {
    private $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function actualizar($mensaje) {
        echo "Notificación para {$this->nombre}: {$mensaje}\n";
    }
}

class Canal {
    private $observadores = [];

    public function suscribir(Observador $observador) {
        $this->observadores[] = $observador;
    }

    public function notificar($mensaje) {
        foreach ($this->observadores as $observador) {
            $observador->actualizar($mensaje);
        }
    }
}

// Uso del Observer
$usuario1 = new Usuario("Carlos");
$usuario2 = new Usuario("Ana");

$canal = new Canal();
$canal->suscribir($usuario1);
$canal->suscribir($usuario2);

$canal->notificar("Nuevo video disponible.");
?&gt;
</code>
    </pre>

    <div class="text-center mt-3">
        <a href="../comportament.php" class="btn btn-secondary">🔙 Volver</a>
    </div>
</div>
