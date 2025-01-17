<!-- Classe para representar las cartas -->

<?php
class Carta{
  public $palo; //color
  public int $numero; //del 1 al 9 reverse skip o picker
  public int $id; //identificador unico para cada carta


  public function __construct($palo, $numero, $id){
    $this->palo = $palo;
    $this->numero = $numero;
    $this->id = $id;
  }

  //METODOS-----------------------------------------------------
  public function pinta_carta(){
    return "<img src='images/{$this->numero}_{$this->palo}.png' alt='{$this->palo} {$this->numero}' />";
  }
  public function pinta_carta_link(){
    //mostrar la carta como un enlace para interactuar
     return "<a href='jugar.php?carta={$this->id}'><img src='images/{$this->numero}_{$this->palo}.png' alt='{$this->palo} {$this->numero}' /></a>";
  }
  public function pinta_carta_girada(){
    //Mostrar carta girada cuando esta en la mano del jugador
    return "<img src='images/carta_girada.png' alt='Carta girada' />";
  }
}

?>