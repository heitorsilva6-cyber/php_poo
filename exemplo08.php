<?php

class Calculadora
{
    public $valor;

    function __construct($valor)
    {
        $this->valor1 = $valor;
    }

    function somar($operador1, $operador2)
    {
        return $operador1 + $operador2;
    }
}

$calc = new Calculadora(0);
echo "VALOR = $calc->valor <br>";
$calc->valor = $calc->somar(3, 5);
echo "VALOR = $calc->valor";