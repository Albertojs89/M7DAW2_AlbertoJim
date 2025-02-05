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
      <h1>Patrones De Comportamiento</h1>
    </div>
    <div class="container">
      
      <img src="imgs/comportamiento.jpg" alt="Descripción de la imagen" class="image">
      <div class="text">
        <p>Los patrones de comportamiento se centran en cómo los objetos interactúan y se comunican entre sí. 
          Ayudan a definir reglas de colaboración, evitando dependencias innecesarias y facilitando la escalabilidad del código.</p>
             <form action="patrons/redirect.php" method="GET">
        <div class="mb-3">
            <select class="form-select form-select-lg" name="patro" id="patro">
                <option value="strategy.php">Strategy</option>
                <option value="observer.php">Observer</option>
            </select>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg">🔍 Ver Más</button>
        </div>
    </form>
      </div>
    </div>

    <aside class="container">
      <h2 style="font-size: 50px;"><i class="fa-solid fa-lightbulb icons" style="color: yellow!important;"></i></h2>
      <p class="text2">Imagina que te suscribes a un canal de YouTube.
         Cada vez que el canal sube un nuevo video, recibes una notificación automática sin necesidad de revisar manualmente.</p>
    </aside>

    <div class="container py-3">
      <i class="fa-solid fa-eye icons"></i>
      <div class="text">
        <h2>Observer</h2>
        <p>Un objeto notifica automáticamente a otros cuando cambia su estado.</p>
      </div>
      <i class="fa-solid fa-chess-board icons"></i>
      <div class="text">
        <h2>Strategy</h2>
        <p> Permite seleccionar dinámicamente entre múltiples algoritmos.</p>
      </div>
      <i class="fa-solid fa-bag-shopping icons"></i>
      <div class="text">
        <h2>Command</h2>
        <p>Encapsula una acción como un objeto, permitiendo deshacer o reejecutar comandos.</p>
      </div>
    </div>
      <div class="container">
      <i class="fa-solid fa-pencil icons"></i>
      <div class="text">
        <h2>State</h2>
        <p>Permite que un objeto cambie su comportamiento según su estado interno.</p>
      </div>
      <i class="fa-solid fa-building icons"></i>
      <div class="text">
        <h2>Mediator</h2>
        <p> Coordina la comunicación entre múltiples objetos sin que interactúen directamente</p>
      </div>
      
    </div>

   
    </div>
   
</section>

</body>
</html>