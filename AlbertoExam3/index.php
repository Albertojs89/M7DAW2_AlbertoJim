<?php
session_start();
include 'funciones.php';
include 'productos.php';

$id=$_GET['id'];

if (isset($_POST['nombre'],$_POST['precio'],$_POST['descripcion'])) { 
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        
        agregarJuego($nombre, $precio, $descripcion);

        
        header('Location: index.php');
        exit();
        
  }
  elseif(isset($id)){
    eliminarJuego($id);
  }




?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi tabla</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <!-- tabla con productos -->
   <div class="container mt-4">
    <h1 class="text-center mb-4">Productos de Videojuegos</h1>
    
    <!-- Tabla de productos -->
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        

      <!-- funcion agregar producto -->
      <div class="container-fluid">
        <?php
        
          
        // Recorrer los productos 
        foreach ($_SESSION['productos'] as $juego) {
            echo '<tr>';
            echo '<td>' . $juego['nombre'] . '</td>';
            echo '<td>$' . $juego['precio']. '</td>';
            echo '<td>' . $juego['descripcion'] . '</td>';
            echo '<td>';
            // Formulario para eliminar el producto
            echo '<form method="GET" action="">';
            echo '<input type="hidden" name="eliminar" value="' . $producto['id'] . '">';
            echo '<button type="submit" class="btn btn-danger">Eliminar</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        
        
        ?>
      </div>
      
      
      <h2>Añadir nuevo producto</h2>
        
        <form method="POST" action="" class="mx-auto" style="max-width: 600px;">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="titulo" name="nombre" value="" placeholder="Título" required>
                <label for="titulo">Titulo</label>
                
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="precio" name="precio" value="" placeholder="precio" required>
                <label for="autor">precio</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="" placeholder="descripcion">
                <label for="descripcion">descripcion</label>
            </div>
            
            
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Agregar</button>
            </div>
            
        </form>
</body>
</html>