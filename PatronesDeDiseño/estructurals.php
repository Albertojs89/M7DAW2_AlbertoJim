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
      <h1>Patrones Estructurals</h1>
    </div>
    <div class="container">
      
      <img src="imgs/adapter.jpg" alt="Descripción de la imagen" class="image">
      <div class="text">
        <p>Los patrones estructurales ayudan a organizar las relaciones entre clases y objetos, 
          asegurando que las estructuras sean eficientes y flexibles.</p>
          <form action="patrons/redirect.php" method="GET">
                    <div class="mb-3">
                        <label for="patro" class="form-label">Selecciona un patró:</label>
                        <select class="form-select form-select-lg" name="patro" id="patro">
                            <option value="adapter.php">Adapter</option>
                            <option value="bridge.php">Bridge</option>
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
      <p class="text2">Imagina que tienes un cargador con un enchufe de EE.UU., 
        pero estás en Europa. No puedes conectar el enchufe directamente a la toma de corriente, así que usas un adaptador.</p>
    </aside>

    
   
</section>

</body>
</html>