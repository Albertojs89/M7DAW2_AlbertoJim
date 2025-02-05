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
      
      <img src="imgs/cafete.jpg" alt="Descripción de la imagen" class="image">
      <div class="text">
        <p>Los patrones de creación son técnicas utilizadas en el desarrollo de software para gestionar la creación de objetos de manera 
          flexible y eficiente.<br><br> En lugar de instanciar objetos directamente con new, 
          estos patrones permiten crear instancias de una forma más controlada, evitando dependencias innecesarias y mejorando la 
          reutilización del código.</p>
            <form action="patrons/redirect.php" method="GET">
        <div class="mb-3">
            <select class="form-select form-select-lg" name="patro" id="patro">
                <option value="singleton.php">Singleton</option>
                <option value="factory.php">Factory</option>
            </select>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg">🔍 Ver Más</button>
        </div>
    </form>
      </div>
    </div>

    <aside class="container mt-0">
      <h2 style="font-size: 50px;"><i class="fa-solid fa-lightbulb icons" style="color: yellow!important;"></i></h2>
      <p class="text2">Imagina que tienes una cafetera moderna con un solo botón. Puedes seleccionar si quieres un espresso, capuchino o café con leche, pero no te preocupas por cómo se prepara cada uno internamente. 
        Solo presionas el botón y la máquina fabrica el tipo de café que elegiste.</p>
    </aside>

   
</section>

</body>
</html>