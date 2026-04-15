<?php

class Visibilidade {
    public $varPublic;
    protected $varProtected;
    private $varPrivate;

    public function __construct() 
    {
        $this->varPublic = "varPublic";
        $this->varProtected = "varProtected";
        $this->varPrivate = "varPrivate";
    }
}
{
$teste = new Visibilidade();
echo "Atributo Public =   $teste->varPublic";
echo "Atributo Protected = $teste->varProtected";
echo "Atributo Private = $teste->varPrivate";
}

public function publicFunc() {
    echo "Função Public";
}

public function protectedFunc() {
    echo "Função Protected";
}

private function privateFunc() {
    echo "Função Private";
}

$teste = new Visibilidade(1, 2, 3);
echo "Atributo Public =   $teste->varPublic";
// echo "Atributo Protected = $teste->varProtected";
// echo "Atributo Private = $teste->varPrivate";

echo "<br'>";

$teste->publicFunc();
$teste->protectedFunc();
$teste->privateFunc();