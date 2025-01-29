<?php 
class Calculadora{
  public int $numero1;
  public int $numero2;


  public function __construct(int $numero1, int $numero2){
    $this->numero1 = $numero1;
    $this->numero2 = $numero2;
  }

  public function sumar():int{
    return $this->numero1 + $this->numero2;
  }
}

$calculadora = new Calculadora(5, 3);
echo "La suma de 5+3 es: ". $calculadora->sumar();
?>