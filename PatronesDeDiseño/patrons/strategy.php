<?php include '../header.php'; ?>

<div class="container-pattern">
    <h2 class="text-center">Patrón Strategy</h2>

    <!-- Descripción con icono -->
    <div class="description-box">
        <i class="fa-solid fa-chess-knight"></i>
        <p>
            El patrón <strong>Strategy</strong> permite definir una familia de algoritmos, encapsularlos y hacerlos
            intercambiables sin alterar el código del cliente.
        </p>
    </div>

    <h3>Ejemplo en PHP:</h3>

    <!-- Cuadro de código -->
    <pre class="code-box">
<code>
&lt;?php
interface Estrategia {
    public function ejecutar($a, $b);
}

class Suma implements Estrategia {
    public function ejecutar($a, $b) {
        return $a + $b;
    }
}

class Resta implements Estrategia {
    public function ejecutar($a, $b) {
        return $a - $b;
    }
}

class Contexto {
    private $estrategia;

    public function __construct(Estrategia $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function ejecutarOperacion($a, $b) {
        return $this->estrategia->ejecutar($a, $b);
    }
}

// Uso del Strategy
$contexto = new Contexto(new Suma());
echo $contexto->ejecutarOperacion(5, 3); // 8
$contexto = new Contexto(new Resta());
echo $contexto->ejecutarOperacion(5, 3); // 2
?&gt;
</code>
    </pre>

    <div class="text-center mt-3">
        <a href="../comportament.php" class="btn btn-secondary">🔙 Volver</a>
    </div>
</div>
