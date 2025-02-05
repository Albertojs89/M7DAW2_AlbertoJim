<?php include '../header.php'; ?>

<div class="container-pattern">
    <h2 class="text-center">Patrón Adapter</h2>

    <!-- Descripción con icono -->
    <div class="description-box">
        <i class="fa-solid fa-plug-circle-bolt"></i>
        <p>
            El patrón <strong>Adapter</strong> permite que dos interfaces incompatibles trabajen juntas.
            Funciona como un puente entre dos clases diferentes.
        </p>
    </div>

    <h3>Ejemplo en PHP:</h3>

<!-- Cuadro de código -->
<pre class="code-box">
<code>
&lt;?php
class EnchufeEuropeo {
    public function conectar() {
        return "Conectando con un enchufe europeo.";
    }
}

class AdaptadorAmericano {
    private $enchufe;

    public function __construct(EnchufeEuropeo $enchufe) {
        $this->enchufe = $enchufe;
    }

    public function conectarAmericano() {
        return $this->enchufe->conectar() . " (Adaptado para América)";
    }
}

$enchufe = new EnchufeEuropeo();
$adaptador = new AdaptadorAmericano($enchufe);
echo $adaptador->conectarAmericano();
?&gt;
</code>
</pre>


    <div class="text-center mt-3">
        <a href="../estructurals.php" class="btn btn-secondary">🔙 Volver</a>
    </div>
</div>


<!-- 

 <pre> y <code>
Esto mantiene el formato del código con indentación y espacios.

 los símbolos < y > en &lt; y &gt;
Esto evita que PHP intente interpretar el código y lo muestra como texto.
-->