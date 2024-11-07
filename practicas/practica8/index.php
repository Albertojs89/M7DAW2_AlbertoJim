<?php 
  session_start();

$_SESSION['username']=$_POST['username'];
$_SESSION['dificultat']=$_POST['dificultat'];
$_SESSION['numPR']=0;

//Utilizar el isset para comprobar si username (variable) está declarada
if(isset($_SESSION['username'])){
    header('Location: room1.php');
    exit;
}

//array con adivinanzas organizadas por niveles de dificultad (facil,medio,dificil)
$_SESSION['endevinalles'] = [
    'facil' => [
        [
            'pregunta' => '¿Qué tiene dientes pero no muerde?',
            'respuesta' => 'El peine'
        ],
        [
            'pregunta' => '¿Qué tiene cabeza pero no cerebro?',
            'respuesta' => 'El ajo'
        ]
    ],
    'mig' => [
        [
            'pregunta' => '¿Qué cosa puedes atrapar pero no lanzar?',
            'respuesta' => 'Un resfriado'
        ],
        [
            'pregunta' => 'Cuanto más quitas, más grande es. ¿Qué es?',
            'respuesta' => 'Un agujero'
        ]
    ],
    'dificil' => [
        [
            'pregunta' => 'Me pertenecen, pero los demás los usan más que yo. ¿Qué son?',
            'respuesta' => 'Mis nombres'
        ],
        [
            'pregunta' => 'Siempre está en el pasado, pero puede ser creado en el presente. Para la mayoría de las personas, es algo que se pierde en el futuro. ¿Qué es?',
            'respuesta' => 'La historia'
        ]
    ]
];

//----------------------------------------------------------------

?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inici</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100" style="background-image: url('https://basementescaperoom.com/los-angeles/template/images/room-header-bg-thebasement.jpg'); background-size:cover; background-repeat: no-repeat;">
    <div class="card p-4 bg-dark text-white" style="width: 22rem;">
        <h2 class="card-title text-center">Benvingut!</h2>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Nom:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="dificultat" class="form-label">Nivell de Dificultat:</label>
                <select name="dificultat" id="dificultat" class="form-select" required>
                    <option value="">Selecciona un nivell</option>
                    <option value="facil">Fàcil</option>
                    <option value="mig">Mig</option>
                    <option value="dificil">Difícil</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Comença el Joc</button>
        </form>
    </div>
</body>
</html>

