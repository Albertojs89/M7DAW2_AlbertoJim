<?php
class Llibre {
    public $titol;
    public $autor;
    public $anyPublicacio;
    public $foto;

    public function __construct($titol, $autor, $anyPublicacio, $foto) {
        $this->titol = $titol;
        $this->autor = $autor;
        $this->anyPublicacio = $anyPublicacio;
        $this->foto = $foto;
    }

    public function obtenirDetalls() {
        return "{$this->titol} - {$this->autor} ({$this->anyPublicacio})";
    }
}

class Biblioteca {
    public $llibres = [];

    public function afegirLlibre($llibre) {
        $this->llibres[] = $llibre;
    }

    public function mostrarLlibres() {
        return $this->llibres;
    }

    public function cercarLlibre($text) {
        return array_filter($this->llibres, function ($llibre) use ($text) {
            return stripos($llibre->titol, $text) !== false;
        });
    }
}
?>
