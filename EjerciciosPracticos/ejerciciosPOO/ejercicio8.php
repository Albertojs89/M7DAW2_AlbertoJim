<?php
class Calculadora{
  public int $num1;
  public int $num2;

  

    public function sumar(int $num1, int $num2){
        return $num1 + $num2;
    }

    public function restar(int $num1, int $num2){
        return $num1 - $num2;
    }

    public function multiplicar(int $num1, int $num2){
        return $num1 * $num2;
    }
    
    public function dividir(int $num1, int $num2){
        return $num1 / $num2;
    }
}
$calculo=new Calculadora();
echo $calculo->sumar(5,3);

?>


<!-- 
Ejemplo con constructor

class Calculadora {
    private int $num1;
    private int $num2;

    public function __construct(int $num1, int $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function sumar(): int {
        return $this->num1 + $this->num2;
    }

    public function restar(): int {
        return $this->num1 - $this->num2;
    }

    public function multiplicar(): int {
        return $this->num1 * $this->num2;
    }

    public function dividir(): float {
        if ($this->num2 == 0) {
            throw new Exception("No se puede dividir por cero.");
        }
        return $this->num1 / $this->num2;
    }
}

// Ejemplo de uso
$calculadora = new Calculadora(10, 5); 
echo "Suma: " . $calculadora->sumar() . "<br>"; 
echo "Resta: " . $calculadora->restar() . "<br>";
echo "Multiplicación: " . $calculadora->multiplicar() . "<br>";
echo "División: " . $calculadora->dividir() . "<br>"; 


-->