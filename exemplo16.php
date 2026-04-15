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

$teste = new Visibilidade();
echo "Atributo Public =   $teste->varPublic";
echo "Atributo Protected = $teste->varProtected";
echo "Atributo Private = $teste->varPrivate";