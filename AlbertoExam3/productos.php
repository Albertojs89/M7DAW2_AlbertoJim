<?php
if(!isset($_SESSION['productos'])){
$_SESSION['productos'] = [
    [
        "nombre" => "The Legend of Zelda: Tears of the Kingdom",
        "precio" => 60.00,
        "descripcion" => "Aventura de acción en mundo abierto en la famosa serie de Zelda, con nuevas mecánicas y una historia emocionante.",
        "id"=>"0",
    ],
    [
        "nombre" => "Super Mario Bros. Wonder",
        "precio" => 50.00,
        "descripcion" => "Un juego de plataformas con Mario y sus amigos, lleno de nuevos mundos y poderes en un estilo clásico de la saga.",
        "id"=>"1",
    ],
    [
        "nombre" => "Elden Ring",
        "precio" => 70.00,
        "descripcion" => "Un juego de rol de acción en un mundo abierto, desarrollado por FromSoftware, con combate desafiante y una rica narrativa.",
        "id"=>"2",
    ],
    [
        "nombre" => "FIFA 24",
        "precio" => 60.00,
        "descripcion" => "El último simulador de fútbol, con jugabilidad mejorada y gráficos realistas, con modos como Ultimate Team y Carrera.",
        "id"=>"3",
    ],
    [
        "nombre" => "Minecraft",
        "precio" => 30.00,
        "descripcion" => "Un juego de construcción y supervivencia, donde puedes crear y explorar mundos generados aleatoriamente en un entorno de bloques.",
        "id"=>"4"
    ]
];
}
?>
