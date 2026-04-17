<?php
class Carro {
    // 🚩 RISCO: Atributo público permite valores ilegais
    public $modelo;
    private $velocidade;

    public function __construct($modelo, $velocidade) {
        $this->modelo = $modelo;
        $this->velocidade = $velocidade;
    }

    public function getVelocidade() {
        return $this->velocidade;
    }

    public function setVelocidade($novaVelocidade) {
        if ($novaVelocidade >= 200) {
            $this->velocidade = $novaVelocidade;
            echo "Você está acima da velocidade.<br>";
        } else {
            echo "Continue com esta velocidade.<br>";
        }
    }
}

// --- TESTE DO VEÍCULO ---
$meuCarro = new Carro("Senai-Mobile", 0);

// O desastre: alteração direta sem validação
$meuCarro->getVelocidade(200); // Velocidade de foguete?
$meuCarro->setVelocidade(0); // Carro andando no tempo?

echo "Modelo: " . $meuCarro->modelo . "<br>";
echo "Velocidade atual: " . $meuCarro->getVelocidade() . " km/h";
?>