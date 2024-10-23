<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvingut a la teva casa de Hogwarts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        <?php
        include "arraycasas.php";
        $casas = array_keys($casas_info);
        $casa_seleccionada = $casas[array_rand($casas)];
        ?>


        body {
            background-color: <?php echo $casas_info[$casa_seleccionada]['background_color'];?>;
        }
    </style>

</head>

<body style="background-color: <?php echo $casas_info[$casa_seleccionada]['background_color']; ?>;">


    <?php
        

        

        $nombre = $_POST['name'];
        // echo $nombre;
        echo "<br>";
        $apellido = $_POST['lastname'];
        // echo $apellido;



        

        $casas = array_keys($casas_info);
        $casa_seleccionada = $casas[array_rand($casas)];


        echo '
                <div class="container text-center" style="background-color:' . $casas_info[$casa_seleccionada]['message_background'] . '">
                    <h1>¡Benvingut a ' . $casa_seleccionada . '</h1>
                    <div>
                        <img src="' . $casas_info[$casa_seleccionada]['image'] . '"></img>
                    </div>
                    <div class="welcome-message mt-4">
                        <p>' . $casas_info[$casa_seleccionada]['welcome_message'] . '
                        <br>
                        ' . $nombre . ' ' . $apellido . '
                        <br>

                        </p>
                    </div>
                </div>
            ';
    ?>
</body>

</html>