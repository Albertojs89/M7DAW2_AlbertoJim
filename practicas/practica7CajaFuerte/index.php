<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sombrero Seleccionador de Hogwarts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>
<style>
    body {
        background-image: url('https://wallpapercave.com/wp/wp8227615.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        margin: 0;

    }

    form {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 200px;

    }

    input {
        align-items: center;
        border: none;
        border-radius: 6px;
        width: 200px;
        height: 50px;
        padding: 25px;
        margin: 10px;
    }

    h1 {
        font-family: 'Times New Roman', Times, serif;
        font-size: 50px;
        color: #2E2E2E;
        text-align: center;
        margin-bottom: 50px;
    }
</style>

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