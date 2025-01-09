<?php


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



?>
