<?php
class Calculadora{
  public int $num1;
  public int $num2;

  public function __construct($num1, $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function sumar(){
        return $this->num1 + $this->num2;
    }

    public function restar(){
        return $this->num1 - $this->num2;
    }

    public function multiplicar(){
        return $this->num1 * $this->num2;
    }
    
}


?>