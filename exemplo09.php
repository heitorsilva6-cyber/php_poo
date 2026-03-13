<?php

class Filme
{
    public $nome;
    public $saldo;


    function __construct($nome, $saldo)
    {
        $this->nome = $nome;
        $this->saldo = $saldo;
    }

    function incrementarSaldo($valor)
    {
        $this->saldo = $this->saldo + $valor;
    }
}

$filme = new Filme('Toy Story', 10);
$filme->incrementarSaldo(5);

echo "Nome do Filme: $filme->nome <br>";
echo "Saldo disponivel: $filme->saldo";