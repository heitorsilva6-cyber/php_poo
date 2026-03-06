<?php

class Funcionario
{

    public $nome;
    public $salario;
    public $previdencia;
    public $descontos;

    function __construct($nome, $salario, $previdencia)
    {
        $this->nome = $nome;
        $this->salario = $salario;
        $this->previdencia = $previdencia;
        $this->descontos = $this->calcularDescontos();
    }

        
    {
        function calcularDescontos()
        return number_format($this->salario * 0.275 + $this->previdencia, 2, ',', '.'
        );
    }

}

$joao = new Funcionario('João Filho', 1000, 100);
$maria = new Funcionario('Maria Rute', 2000, 200);
$jose = new Funcionario('José Salgado', 3000, 300);

echo "O Valor do desconto de $joao->nome é de R$ $joao->descontos. <br>";
echo "O Valor do desconto de $maria->nome é de R$ $maria->descontos. <br>";
echo "O Valor do desconto de $jose->nome é de R$ $jose->descontos. <br>";