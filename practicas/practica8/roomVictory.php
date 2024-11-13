<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Felicidades</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
  h1{
    text-align: center;
    font-size: 3em;
    color: blueviolet;
  }
  body {
    background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(218,218,231,1) 35%, rgba(0,212,255,1) 100%);
    background-size: cover; /* Hace que la imagen cubra toda la pantalla */
    background-repeat: no-repeat; /* Evita que la imagen se repita */
    background-position: center center; /* Centra la imagen */
    height: 100vh; /* Asegura que el `body` ocupe toda la altura de la pantalla */
    margin: 0; /* Elimina el margen para que no haya espacio alrededor */
}
.btn{
  align-items: center;
  text-align: center;
  margin-top: 100px;
}

</style>
<body>

  <div class="container-fluid">
    <h1>¡Felicidades! ¡Has completado el juego!</h1>
    
    <div class="btn">
      <a href="logout.php"><button type="button" class="btn btn-secondary btn-lg">Volver a jugar</button></a>
    </div>
    
  </div>
  
</body>
</html>