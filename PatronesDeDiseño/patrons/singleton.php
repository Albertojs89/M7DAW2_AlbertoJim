<?php include '../header.php'; ?>

<div class="container-pattern">
    <h2 class="text-center">Patrón Singleton</h2>

    <!-- Descripción con icono -->
    <div class="description-box">
        <i class="fa-solid fa-user-lock"></i>
        <p>
            El patrón <strong>Singleton</strong> garantiza que una clase solo tenga una instancia y proporciona un
            punto de acceso global a esa instancia.
        </p>
    </div>

    <h3>Ejemplo en PHP:</h3>

    <!-- Cuadro de código -->
    <pre class="code-box">
<code>
&lt;?php
class Singleton {
    private static $instancia = null;

    private function __construct() {
        echo "Instancia creada\n";
    }

    public static function getInstancia() {
        if (self::$instancia === null) {
            self::$instancia = new Singleton();
        }
        return self::$instancia;
    }
}

// Uso del Singleton
$instancia1 = Singleton::getInstancia();
$instancia2 = Singleton::getInstancia();

var_dump($instancia1 === $instancia2); // true, ambas variables apuntan a la misma instancia
?&gt;
</code>
    </pre>

    <div class="text-center mt-3">
        <a href="../creacion.php" class="btn btn-secondary">🔙 Volver</a>
    </div>
</div>
