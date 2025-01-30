<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<link rel="stylesheet" href="estilos.css">
<script src="https://kit.fontawesome.com/c5ee713d6d.js" crossorigin="anonymous"></script>
<style>
  
  .title-container {
  text-align: center;
  margin-top: 150px;
  font-size: 80px;
  font-weight: bold;
  text-align: center;
  color: whitesmoke;
}
.icons{
  font-size: 50px;
  color: white!important;
  padding: 10px;
}
</style>
<body>
  <?php include 'header.php'; ?>


<section>
    <div class="title-container">
      <h1>Patrones Creacionales</h1>
    </div>
    <div class="container">
      
      <img src="patrons/cafete.jpg" alt="Descripción de la imagen" class="image">
      <div class="text">
        <p>Los patrones de creación son técnicas utilizadas en el desarrollo de software para gestionar la creación de objetos de manera 
          flexible y eficiente.<br><br> En lugar de instanciar objetos directamente con new, 
          estos patrones permiten crear instancias de una forma más controlada, evitando dependencias innecesarias y mejorando la 
          reutilización del código.</p>
      </div>
    </div>

    <aside class="container">
      <h2 style="font-size: 50px;"><i class="fa-solid fa-lightbulb icons" style="color: yellow!important;"></i></h2>
      <p class="text2">Imagina que tienes una cafetera moderna con un solo botón. Puedes seleccionar si quieres un espresso, capuchino o café con leche, pero no te preocupas por cómo se prepara cada uno internamente. 
        Solo presionas el botón y la máquina fabrica el tipo de café que elegiste.</p>
    </aside>

    <div class="container py-3">
      <i class="fa-solid fa-industry icons"></i>
      <div class="text">
        <h2>Factory Method</h2>
        <p>Crea objetos sin especificar su tipo exacto.</p>
      </div>
      <i class="fa-solid fa-ranking-star icons"></i>
      <div class="text">
        <h2>Singleton</h2>
        <p>Garantiza que solo haya una instancia de una clase.</p>
      </div>
      <i class="fa-solid fa-users icons"></i>
      <div class="text">
        <h2>Abstract Factory</h2>
        <p>Proporciona una interfaz para crear familias de objetos relacionados.</p>
      </div>
    </div>
      <div class="container">
      <i class="fa-solid fa-helmet-safety icons"></i>
      <div class="text">
        <h2>Builder</h2>
        <p>Separa la construcción de un objeto de su representación final.</p>
      </div>
      <i class="fa-solid fa-robot icons"></i>
      <div class="text">
        <h2>Prototype </h2>
        <p>Clona objetos en lugar de crear nuevos desde cero.</p>
      </div>
    </div>
   
</section>

</body>
</html>