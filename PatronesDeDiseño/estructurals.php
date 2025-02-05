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

    <!-- <div class="container py-3">
      <i class="fa-solid fa-plug icons"></i>
      <div class="text">
        <h2>Adapter</h2>
        <p>Permite que objetos con interfaces incompatibles trabajen juntos.</p>
      </div>
      <i class="fa-solid fa-bridge icons"></i>
      <div class="text">
        <h2>Bridge</h2>
        <p>Separa la abstracción de la implementación para que evolucionen independientemente.</p>
      </div>
      <i class="fa-brands fa-stack-overflow icons"></i>
      <div class="text">
        <h2>Composite</h2>
        <p>Permite tratar estructuras jerárquicas de objetos de manera uniforme.</p>
      </div>
    </div>
      <div class="container">
      <i class="fa-solid fa-pencil icons"></i>
      <div class="text">
        <h2>Decorator</h2>
        <p>Agrega funcionalidades a objetos sin modificar su estructura original.</p>
      </div>
      <i class="fa-solid fa-building icons"></i>
      <div class="text">
        <h2>Facade</h2>
        <p>Proporciona una interfaz simplificada para interactuar con sistemas complejos.</p>
      </div>
      <i class="fa-solid fa-memory icons"></i>
      <div class="text">
        <h2>Flyweight</h2>
        <p>Optimiza el uso de memoria compartiendo información común entre múltiples objetos.</p>
      </div>
    </div>

    <div class="container">
       <i class="fa-solid fa-users-between-lines icons"></i>
    <div class="text" style="width: 100px;">
        <h2>Proxy</h2>
        <p style="width: 300px;">Actúa como intermediario para controlar el acceso a otro objeto.</p>
      </div>
    </div>
    </div> -->
   
</section>

</body>
</html>