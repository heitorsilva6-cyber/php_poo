<?php
class Carro {

    private $modelo;
    private $velocidade;

    public function __construct($modelo, $velocidade = 0) {
        $this->modelo = $modelo;

        $this->setVelocidade($velocidade);
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getVelocidade() {
        return $this->velocidade;
    }

    public function setModelo($novoModelo) {
        if (!empty($novoModelo)) {
            $this->modelo = $novoModelo;
        }
    }

    public function setVelocidade($novaVelocidade) {

        if ($novaVelocidade >= 0 && $novaVelocidade <= 200) {
            $this->velocidade = $novaVelocidade;
        } else {
            echo " AVISO: Velocidade inválida ({$novaVelocidade} km/h)! Mantendo velocidade em {$this->velocidade} km/h<br>";
        }
    }

    public function acelerar($incremento) {
        $this->setVelocidade($this->velocidade + $incremento);
    }

    public function frear($decremento) {
        $this->setVelocidade($this->velocidade - $decremento);
    }

    public function parar() {
        $this->velocidade = 0;
    }
}

echo "=== TESTE DO CARRO INTELIGENTE COM ENCAPSULAMENTO ===<br><br>";

$meuCarro = new Carro("Senai-Mobile", 0);

echo "✅ Carro criado: " . $meuCarro->getModelo() . "<br>";
echo "📊 Velocidade inicial: " . $meuCarro->getVelocidade() . " km/h<br><br>";

echo "--- TESTANDO VALIDAÇÕES ---<br>";

echo "1  Tentando definir velocidade para 150 km/h (válido):<br>";
$meuCarro->setVelocidade(150);
echo "    Velocidade atual: " . $meuCarro->getVelocidade() . " km/h<br><br>";

echo "2  Tentando definir velocidade para 5000 km/h (INVÁLIDO):<br>";
$meuCarro->setVelocidade(5000);
echo "   Velocidade mantida em: " . $meuCarro->getVelocidade() . " km/h<br><br>";

echo "3  Tentando definir velocidade para -60 km/h (INVÁLIDO):<br>";
$meuCarro->setVelocidade(-60);
echo "   Velocidade mantida em: " . $meuCarro->getVelocidade() . " km/h<br><br>";

echo "--- USANDO MÉTODOS DE CONTROLE ---<br>";

echo "4  Acelerando em +30 km/h:<br>";
$meuCarro->acelerar(30);
echo "   Nova velocidade: " . $meuCarro->getVelocidade() . " km/h<br><br>";

echo "5  Acelerando em +50 km/h:<br>";
$meuCarro->acelerar(50);
echo "   Nova velocidade: " . $meuCarro->getVelocidade() . " km/h<br><br>";

echo "6  Tentando acelerar em +100 km/h (ultrapassaria 200):<br>";
$meuCarro->acelerar(100);
echo "   Velocidade mantida em: " . $meuCarro->getVelocidade() . " km/h<br><br>";

echo "7  Freando em -50 km/h:<br>";
$meuCarro->frear(50);
echo "   Nueva velocidade: " . $meuCarro->getVelocidade() . " km/h<br><br>";

echo "8  Parando o carro:<br>";
$meuCarro->parar();
echo "   Velocidade final: " . $meuCarro->getVelocidade() . " km/h<br><br>";

echo "--- DEMONSTRAÇÃO DE SEGURANÇA ---<br>";
echo " Tentando acessar \$meuCarro->velocidade diretamente:<br>";
echo "   (Isso geraria um erro Fatal se tentássemos!)<br>";
echo "<br> O encapsulamento protegeu o atributo contra manipulação indevida!";
?>