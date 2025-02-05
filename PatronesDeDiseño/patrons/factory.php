<?php include '../header.php'; ?>

<div class="container-pattern">
    <h2 class="text-center">Patrón Factory</h2>

    <!-- Descripción con icono -->
    <div class="description-box">
        <i class="fa-solid fa-industry"></i>
        <p>
            El patrón <strong>Factory</strong> proporciona una interfaz para crear objetos en una superclase, 
            pero permite a las subclases alterar el tipo de objetos que se crearán.
        </p>
    </div>

    <h3>Ejemplo en PHP:</h3>

    <!-- Cuadro de código -->
    <pre class="code-box">
<code>
&lt;?php
interface Producto {
    public function operacion();
}

class ProductoConcretoA implements Producto {
    public function operacion() {
        return "Producto A creado";
    }
}

class ProductoConcretoB implements Producto {
    public function operacion() {
        return "Producto B creado";
    }
}

class Factory {
    public static function crearProducto($tipo) {
        if ($tipo === "A") {
            return new ProductoConcretoA();
        } elseif ($tipo === "B") {
            return new ProductoConcretoB();
        }
        return null;
    }
}

// Uso del Factory
$producto1 = Factory::crearProducto("A");
$producto2 = Factory::crearProducto("B");

echo $producto1->operacion(); // Producto A creado
echo $producto2->operacion(); // Producto B creado
?&gt;
</code>
    </pre>

    <div class="text-center mt-3">
        <a href="../creacion.php" class="btn btn-secondary">🔙 Volver</a>
    </div>
</div>
