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

    function creditar($valor)
    {
        $this->saldo = $this->saldo + $valor;
    }
    function debitar($valor)
    {
        $this->saldo = $this->saldo - $valor;
    }

    function transferir($valor, $outraConta)
    {
        if ($this->saldo >= $valor) {
            $this->debitar($valor);
            $outraConta->creditar($valor);
        }
    }
}

class Poupanca extends Conta
{
    public $juros = 0.05;

    function __construct($numero, $saldo, $juros)
    {
        $this->numero = $numero;
        $this->saldo = $saldo;
        $this->juros = $juros;
    }

    function atualizarJuros()
    {
        $this->saldo =  $this->saldo * (1 + $this->juros);
    }

    }

$conta = new Conta(1, 150);
$conta->creditar(50);
$conta->debitar(100);
echo "Saldo atual da conta: $conta->saldo <br>";


$poupanca = new Poupanca(2, 150, 0.10);
$poupanca->creditar(50);
$poupanca->debitar(100);
$poupanca->atualizarJuros();
echo "Saldo atual da poupança: $poupanca->saldo <br>";