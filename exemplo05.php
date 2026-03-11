<?php

class Funcionario
{
    public $nome;
    public $salario;
    public $previdencia;
    public $desconto;
    public $tipoFuncionario;

    function __construct($nome, $salario, $previdencia)
    {
        $this->nome = $nome;
        $this->salario = $salario;
        $this->previdencia = $previdencia;
    }

    function calcularDesconto(): string{
        $salario = $this->salario;

        if($salario >=1000 &&$salario <2000) {
            $tipoFuncionario = "Júnior";
        } else if ($salario >= 2000 && $salario < 3000){
            $tipoFuncionario = "Pleno";
        } else if ($salario >=3000){
            $tipoFuncionario = "Sênior";
        } else {
            $tipoFuncionario = "Estagiário";
        }
        return $tipoFuncionario;
    }
$joao = new Funcionario('João Filho', 1000, 100);
$maria = new Funcionario('Maria Rute', 2000, 200);      
$jose = new Funcionario('José Salgado', 3000, 300);

echo "Funcionario@ $joao->nome é $joao->TipoFuncionario e o Valor do Desconto é R$ $joao->Desconto. <br>";;
echo "Funcionario@ $maria->nome é $maria->TipoFuncionario e o Valor do Desconto é R$ $maria->Desconto. <br>";
echo "Funcionario@ $jose->nome é $jose->TipoFuncionario e o Valor do Desconto é R$ $jose->Desconto. <br>";
}