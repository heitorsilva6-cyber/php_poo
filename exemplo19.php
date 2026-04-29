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