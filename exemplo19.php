<?php
abstract class FiguraGeometrica {
    private $tipo;

    public function __construct($tipo) {
        $this->tipo = $tipo;
    }

    public function printCaracteristicas(){
        $areaTemp = $this->area();
        $perimetroTemp = $this->perimetro();
        echo "Tipo: $this->tipo <br>";
        echo "Área: $areaTemp <br>";
        echo "Perímetro: $perimetroTemp <br>";
    }

    public abstract function area();

    public abstract function perimetro();
}

class Circunferencia extends FiguraGeometrica {
    private $raio;

    public function __construct($tipo, $raio) {
        parent::__construct($tipo);
        $this->raio = $raio;
    }

    public function area() {
        return 3.14 * $this->raio;
    }

    public function perimetro() {
        return 2 * 3.14 * $this->raio;
    }
}

class Retangulo extends FiguraGeometrica {
    private $lado1;
    private $lado2;

    public function __construct($tipo, $lado1, $lado2) {
        parent::__construct($tipo);
        $this->lado1 = $lado1;
        $this->lado2 = $lado2;
    }

    public function area() {
        return $this->lado1 * $this->lado2;
    }

    public function perimetro() {
        return 2 * ($this->lado1 + $this->lado2);
    }
}

$circ = new Circunferencia("Circunferência", 10);
$circ->printCaracteristicas();

$retangulo = new Retangulo("Retângulo", 10, 20);
$retangulo->printCaracteristicas();