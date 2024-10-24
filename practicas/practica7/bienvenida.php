<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvingut a la teva casa de Hogwarts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <style>
        <?php
        include "arraycasas.php";
        $casas = array_keys($casas_info);
        $casa_seleccionada = $casas[array_rand($casas)];
        ?>body {
            background-color: <?php echo $casas_info[$casa_seleccionada]['background_color']; ?>;
        }
/* efecto sombreado a contorno png bien chulo!! */
        .escudos {
            width: 400px;
            filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 12)); 
        }

        h1 {
            font-family: "Dancing Script", cursive;
            font-size: 80px;
            color: <?php echo $casas_info[$casa_seleccionada]['background_color']; ?>;
        }

        p {
            font-family: "Dancing Script", cursive;
            font-size: 50px;
            color: <?php echo $casas_info[$casa_seleccionada]['background_color']; ?>;
        }
    </style>

</head>

<body>


    <?php

    $nombre = $_POST['name'];
    // echo $nombre;
    echo "<br>";
    $apellido = $_POST['lastname'];
    // echo $apellido;

    echo '
                <div class="container text-center" style="background-color:' . $casas_info[$casa_seleccionada]['message_background'] . '">
                    <h1>¡Benvingut a ' . $casa_seleccionada . '</h1>
                    <div>
                        <img class="escudos" src="' . $casas_info[$casa_seleccionada]['image'] . '"></img>
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