<?php

class AreaCalculavel
{
    public static function $pi = 3.141517;

    static function areaCircunferencia($raio)
    {
        return $raio * $raio * (AreaCalc::$pi);
    }
}

$raioAtual = 10;
$area = AreaCalc::areaCircunferencia($raioAtual);
echo "Área da circunferência de raio $raioAtual é: $area <br>";
echo "Valor de PI: $valorPi<br>";