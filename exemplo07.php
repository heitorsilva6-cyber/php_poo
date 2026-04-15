<?php

class Conta
{
    public $numero;
    public $saldo;

    function __construct($numero, $saldo)
    {
        $this->numero = $numero;
        $this->saldo = $saldo;
    }

    function __construct($numero, $saldo)
    {
        $this->numero = $numero;
        $this->saldo = $saldo;
    }

    function creditar($valor)
    {
        $this->saldo = $this->saldo + $valor;
    }
}