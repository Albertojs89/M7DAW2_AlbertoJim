<?php
session_start();
// include 'libreria.php';
include 'functions.php';
// Verifica si el usuario ha iniciado sesión; si no, redirige a login.php.
if (($_SESSION['username']!='admin')) {
    header('Location: home.php');
    exit;
}
   
   $id=$_GET['id'];
   

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];

    
    agregarLibro($titulo, $autor, $imagen, $descripcion);
    
    // Redirige a home
    header('Location: home.php');
    exit();  

}
   
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];
    if(isset($id)){
        foreach($_SESSION['libreria'] as $libro){
                if($libro['id'] === $id){
                    editarLibro($id, $titulo, $autor, $imagen, $descripcion);
                    header('location:Home.php');
                    exit();
                    }
            }
    
    
    // Redirige a home
    header('Location: home.php');
    exit();
    }
      

//Comprobar si tiene id y llamar a la funcion de editar:
//recorrer la array libreria y comparar si la session libreria id es igual a id:  

}





 


?>

<!-- AQUI VA LA LÓGICA PHP  -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Encabezado del formulario -->
    <header class="bg-light py-3 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div>
                <h4 class="m-0">👋 Bienvenido, <?= $_SESSION['username'] ?></h4>
                <p class="text-muted m-0"><i class="fas fa-user-shield text-success"></i><?=$_SESSION['role']?></p>
            </div>
            <a href="home.php" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Volver a la Biblioteca
            </a>
        </div>
    </header>
    <? if(isset($id)):?>
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"></h2>
            <p class="lead"></p>
        </div>

        <!-- Formulario para agregar o editar libro. DEPENDIENDO DE SI SE AÑADE O SE EDITA CAMBIARÁN COSA DEL FORMULARIO, USA TERNARIOS SON MUY ÚTILES
        id hace de indice o contador para seleccionar los elementos de la array 
        -->
        
        <form method="POST" class="mx-auto" style="max-width: 600px;">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $_SESSION['libreria'][$id]['Titulo'] ?>" placeholder="Título" required>
                <label for="titulo"><?= $_SESSION['libreria'][$id]['titulo'] ?></label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="autor" name="autor" value="<?=$_SESSION['libreria'][$id]['Autor']?>" placeholder="Autor" required>
                <label for="autor"><?=$_SESSION['libreria'][$id]['autor']?></label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="imagen" name="imagen" value="<?=$_SESSION['libreria'][$id]['Imagen']?>" placeholder="URL de la Imagen">
                <label for="imagen"></label>
            </div>
            <div class="form-floating mb-4">
                <textarea class="form-control" id="descripcion" name="descripcion"  placeholder="Descripción" style="height: 150px;"><?=$_SESSION['libreria'][$id]['Descripcion']?></textarea>
                <label for="descripcion"></label>
            </div>
            
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Editar</button>
            </div>
        </form>
        
    </div>
    <? endif; ?>
    <? if(!isset($id)):?>
            <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold"></h2>
            <p class="lead"></p>
        </div>

        <!-- Formulario para agregar o editar libro. DEPENDIENDO DE SI SE AÑADE O SE EDITA CAMBIARÁN COSA DEL FORMULARIO, USA TERNARIOS SON MUY ÚTILES
        id hace de indice o contador para seleccionar los elementos de la array 
        -->
        
        <form method="POST" action="add_edit_book.php" class="mx-auto" style="max-width: 600px;">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="titulo" name="titulo" value="" placeholder="Título" required>
                <label for="titulo">Titulo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="autor" name="autor" value="" placeholder="Autor" required>
                <label for="autor">Autor</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="imagen" name="imagen" value="" placeholder="URL de la Imagen">
                <label for="imagen">url Imagen</label>
            </div>
            <div class="form-floating mb-4">
                <textarea class="form-control" id="descripcion" name="descripcion"  placeholder="Descripción" style="height: 150px;"></textarea>
                <label for="descripcion">Descripcion</label>
            </div>
            
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Agregar</button>
            </div>
            
        </form>
        
       

        
    </div>
    <? endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>