<?php
session_start();
  //inicializar el carrito, el !isset: SI no existe la variable carrito, se crea un array vacío.
  if(!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
    //inicializar
  }
  var_dump($_SESSION['carrito']); //mostrar el contenido del carrito
  $item=$_POST['item']; //recibir el item del formulario

  //agregar el item al carrito con push
  array_push($_SESSION['carrito'], $item);
  var_dump($_SESSION['carrito']); //mostrar el contenido del carrito después de agregar el item



?>


 <!DOCTYPE html>
 <html lang="es">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 </head>
 <body>
  <h2>Carrito compra con sesiones</h2>
  <!-- vamos a crear un html form para enviar por post items -->
   <form action="carrito.php" method="post">
    <input type="text" placeholder="Añade un producto" id="item" required name="item">
    <input type="submit" value="Agregar al carrito">
   </form>


   <!-- tabla con los productos del carrito -->
    <section>
      <tbody>
        <h3>Lista de productos</h3>
        <?php foreach($_SESSION['carrito'] as $item):?>
          <tr>
            <td><?php echo $item;?></td><br>
          </tr>
        <?php endforeach;?>
      </tbody>
          </section>
 </body>
 </html>
          <!-- explicacion de insertar el carrito en la tabla
            se puede abrir php y con :?> se abre un bloque de codigo php
            continuar con html y abrir php con 
          
            -->




