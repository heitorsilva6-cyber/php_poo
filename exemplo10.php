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


    function debitar($valor)
    {
        $this->saldo = $this->saldo - $valor;
    }

    function transferir($outraConta, $valor)
    {
        if  ($this->saldo > $valor) {
            $this->debitar($valor);
            $outraConta->creditar($valor);
        }
    }
}

$contaRoberto = new Conta(1, 2000);
$contaDaniel = new Conta(2, 300);
echo "Saldo da conta: $contaRoberto->saldo <br>";
echo "Saldo da conta: $contaDaniel->saldo <br>";

$contaDaniel->transferir($contaRoberto, 300);
echo "Transferência efetuada <br>";

echo "Saldo da conta: $contaRoberto->numero: $contaRoberto->saldo <br>";
echo "Saldo da conta: $contaDaniel->numero: $contaDaniel->saldo <br>";