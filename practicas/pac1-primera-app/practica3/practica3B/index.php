<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Frutas favoritas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    .casillaVerde{
        background-color: #20c997;
        font-weight: 700;
    }
</style>
<body>
    <div class="container mt-5">
        
            <!-- array de frutas con su nombre -->
            <?php
                $frutas=[
                    ["nombre"=>"Manzana","imagen"=>"https://w7.pngwing.com/pngs/560/910/png-transparent-an-apple-green-apple-fruit-green.png"],
                    ["nombre"=>"Plátano","imagen"=>"https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.es%2Fvectores%2Fplatano-png&psig=AOvVaw2ppX8W9bF6-vbjoxieIJB0&ust=1727969288095000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCJiaj7GB8IgDFQAAAAAdAAAAABAE"],
                    ["nombre"=>"Naranja","imagen"=>"https://static.vecteezy.com/system/resources/thumbnails/040/750/078/small_2x/ai-generated-orange-orange-isolated-refreshing-citrus-fruit-orange-slices-orange-top-view-orange-flat-lay-png.png"],
                    ["nombre"=>"Fresa","imagen"=>"https://png.pngtree.com/png-clipart/20230410/original/pngtree-strawberry-realistic-fruit-png-image_9042320.png"],
                    ["nombre"=>"Kiwi","imagen"=>"https://e7.pngegg.com/pngimages/166/911/png-clipart-kiwi-kiwi.png"],
                ];
            ?>

<div class="container mt-5">
        <h1 class="text-center">Selecciona tu fruta favorita</h1>

        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Fruta</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <!-- php condicion -->
            <?php
                //Con el isset getter cojemos el 'nombre'enviado desde el boton y lo guardamos en la variable nombre.
                if(isset($_GET['nombre'])){
                    $nombre=$_GET['nombre']; 
                    
                    
                    //EXPLICACION FOREACH-------------------------------------------------------------------------------
                    //Ahora con un foreach repasamos todos los elementos de la array frutas, comparando 
                    //cada fruta y su nombre con el getter en la variable nombre
                    //Si coincide: imprimimos el html de la tabla con la posicion de la array fruta[nombre]

                    foreach($frutas as $fruta){
                        if($fruta["nombre"]==$nombre){
                            echo '
                                <tr class="casillaVerde">
                                <td>'.$fruta['nombre'].'</td>
                                <td>✔️Seleccionada</td>
                                <td><a class="btn btn-primary" href="?nombre='.$fruta['nombre'].'">Seleccionar</a></td>
                                </tr>
                            ';
                         
                        }else{
                            echo '
                                <tr class="table-danger">
                                <td>'.$fruta['nombre'].'</td>
                                <td>✖Seleccionada</td>
                                <td><a class="btn btn-primary" href="?nombre='.$fruta['nombre'].'">Seleccionar</a></td>
                                </tr>
                            ';
                        }
                        
                    }
                }
            
            ?>
            <tbody>
            
            
        </table>
                <?php
                   
                ?>
        <!-- Mostrar tarjeta de la fruta seleccionada (actualmente estatica, siempre hay una manzana) -->
        <div class="card mt-4 w-25 shadow-lg">
            <img src="" class="card-img-top img-fluid" alt="Manzana">
            <div class="card-body bg-warning">
                <h5 class="card-title">Manzana</h5>
                <p class="card-text">¡Esta es tu fruta favorita!</p>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



