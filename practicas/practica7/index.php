<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sombrero Seleccionador de Hogwarts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Benvinguts a Hogwarts</h1>
        <!-- formulario que pide nombre y apellidos -->

        <form action="bienvenida.php" method="post">

            <input type="text" placeholder="Introduce tu nombre" name="name">

            <input type="text" placeholder="Introduce tus apellidos" name="lastname">

            <button type="submit">Enviar</button>

        </form>
    </div>
</body>

</html>