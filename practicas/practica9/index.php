<!-- # Página inicial de bienvenida -->
 <!DOCTYPE html>
 <html lang="es">
 <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
   <style>
   
 .container {
      width: 350px;
      height: 350px;
      overflow: hidden;
      margin-top: 100px;
      
    }

    .image-wrapper {
      width: 100%;
      height: 100%;
      overflow: hidden;
      border-radius: 300px;
    }

    .image {
      width: 110%;
      height: auto;
      transition: transform 0.3s ease-in-out;
      
    }

    .container:hover .image {
      transform: scale(1.2);
    }
    .titulo{
      margin-left: 100px;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      color: #333;
      margin-bottom: 50px;
    }
    h1{
      margin-top: 200px;
      font-weight: 200;
      color: red;
      
    }
  </style>
 </head>
 
 <body>
  <div class="titulo">
    <h1>Bienvenido a bookmarket</h1>
   </div> 
  <div class="container">
    <div class="image-wrapper">
      <a href="login.php"><img class="image" src="https://img.freepik.com/fotos-premium/ilustracion-minimalista-libros_1106493-147203.jpg" alt="Tu imagen"></a>
    </div>
  </div>

 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 </body>
 </html>