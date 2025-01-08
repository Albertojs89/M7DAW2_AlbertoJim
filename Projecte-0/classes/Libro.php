<?php
session_start();

class Llibre{
  public string $titol;
  public string $autor;
  public int $anyPublicacio;
  public string $foto;

  public function __construct(string $titol, string $autor, int $anyPublicacio, string $foto){
    $this->titol = $titol;
    $this->autor = $autor;
    $this->anyPublicacio = $anyPublicacio;
    $this->foto = $foto;
  }

   public function descripcio(): string {
    return "Titol: ". $this->titol. ", Autor: ". $this->autor. ", Any Publicacio: ". $this->anyPublicacio. ", URL: ". $this->foto;
  }
}

class Biblioteca{
  public array $libreria=[
        [
          "Titulo" => "El Ritmo de la Guerra",
          "Autor" => "Brandon Sanderson",
          "anyPublicacio" => "Cuarta entrega de la saga de 'El Archivo de las Tormentas', una epopeya de fantasía épica con un desarrollo de personajes y un mundo increíblemente detallado.",
          "Imagen" => "https://m.media-amazon.com/images/I/91Nb4w7arrL.jpg"
        ],
        [
        "Titulo" => "El nombre del viento",
        "Autor" => "Patrick Ruffus",
        "Descripcion" => "Una historia cautivadora que combina misterio, fantasía.",
        "Imagen" => "https://m.media-amazon.com/images/I/91PjnllfsxL._AC_UF894,1000_QL80_.jpg",
        
        
        ]
        

  ];

  //mostrar libreria completa: comprobacion que funciona correctamente imprimirla en pantalla
  public function mostrarLibreria(): void {
    foreach ($this->libreria as $libro) {
      echo "Título: ". $libro["Titulo"]. ", Autor: ". $libro["Autor"]. ", Descripción: ". $libro["Descripcion"]. ", Imagen: ". $libro["Imagen"]. "<br>";
    }
  }

  

}


?>