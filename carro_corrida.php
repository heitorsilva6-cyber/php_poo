<?php
/*
╔══════════════════════════════════════════════════════════════╗
║      DESAFIO TEÓRICO: Classe CarroCorrida (Herança)         ║
╚══════════════════════════════════════════════════════════════╝

PERGUNTA: Se você criar uma classe CarroCorrida que herda de Carro, 
mas precisa de uma regra de velocidade diferente (até 400 km/h), 
qual modificador você usaria para que a classe filha "enxergue" 
a velocidade, mas o resto do sistema não?

RESPOSTA: ✅ PROTECTED

O modificador protected permite:
✔ Acesso dentro da classe e suas classes filhas (herança)
✘ Acesso direto do código externo (não pode fazer $obj->atributo)
✘ Acesso de outras classes não relacionadas

Comparação dos modificadores:
┌─────────────┬──────────────┬──────────────┬──────────────┐
│ Modificador │ Própria      │ Classe Filha │ Código Externo│
├─────────────┼──────────────┼──────────────┼──────────────┤
│ public      │ ✅ Sim       │ ✅ Sim       │ ✅ Sim        │
│ protected   │ ✅ Sim       │ ✅ Sim       │ ❌ Não        │
│ private     │ ✅ Sim       │ ❌ Não       │ ❌ Não        │
└─────────────┴──────────────┴──────────────┴──────────────┘
*/

// Importar a classe Carro
require_once 'carro.php';

// ✅ SOLUÇÃO: Usar PROTECTED para permitir herança com segurança
class CarroCorrida extends Carro {
    protected $velocidadeMaxima = 400; // Limite específico da corrida
    
    public function getVelocidadeMaxima() {
        return $this->velocidadeMaxima;
    }
    
    // ⚠️ Problema: não conseguimos acessar $velocity porque é PRIVATE na classe pai
    // Solução: a classe Carro precisaria deixar $velocidade como PROTECTED
}

/*
╔══════════════════════════════════════════════════════════════╗
║   REFATORAÇÃO RECOMENDADA: Mudar Carro para usar PROTECTED  ║
╚══════════════════════════════════════════════════════════════╝
*/

// Versão melhorada: Carro com $velocidade em PROTECTED
class CarroBase {
    protected $modelo;      // ✅ Protected para herança
    protected $velocidade;  // ✅ Protected para herança

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

    // Este método pode ser sobrescrito nas classes filhas
    public function setVelocidade($novaVelocidade) {
        if ($novaVelocidade >= 0 && $novaVelocidade <= 200) {
            $this->velocidade = $novaVelocidade;
        }
    }

    public function acelerar($incremento) {
        $this->setVelocidade($this->velocidade + $incremento);
    }

    public function frear($decremento) {
        $this->setVelocidade($this->velocidade - $decremento);
    }
}

// ✅ Classe filha com regras diferentes
class CarroCorrida extends CarroBase {
    private $velocidadeMaxima = 400;

    // Sobrescrever setVelocidade para aceitar até 400 km/h
    public function setVelocidade($novaVelocidade) {
        if ($novaVelocidade >= 0 && $novaVelocidade <= $this->velocidadeMaxima) {
            $this->velocidade = $novaVelocidade; // ✅ Acessar protected da classe pai
        } else {
            echo "⚠️ AVISO: Velocidade máxima para corrida é {$this->velocidadeMaxima} km/h!<br>";
        }
    }

    public function getVelocidadeMaxima() {
        return $this->velocidadeMaxima;
    }
}

// --- TESTE ---
echo "=== TESTE: CARRO DE CORRIDA COM HERANÇA ===<br><br>";

$carroNormal = new CarroBase("Senai-Mobile", 0);
echo "🚗 Carro Normal:<br>";
echo "   Modelo: " . $carroNormal->getModelo() . "<br>";
echo "   Velocidade máxima permitida: 200 km/h<br><br>";

echo "Testando aceleração para 150 km/h: ";
$carroNormal->acelerar(150);
echo $carroNormal->getVelocidade() . " km/h ✅<br>";

echo "Tentando aceleração para mais 100 km/h (ultrapassaria 200): ";
$carroNormal->acelerar(100);
echo $carroNormal->getVelocidade() . " km/h ⚠️<br><br>";

// ---

$carroCorrida = new CarroCorrida("Ferrari-Turbo", 0);
echo "🏎️  Carro de Corrida:<br>";
echo "   Modelo: " . $carroCorrida->getModelo() . "<br>";
echo "   Velocidade máxima permitida: " . $carroCorrida->getVelocidadeMaxima() . " km/h<br><br>";

echo "Testando aceleração para 300 km/h: ";
$carroCorrida->setVelocidade(300);
echo $carroCorrida->getVelocidade() . " km/h ✅<br>";

echo "Testando aceleração para 390 km/h: ";
$carroCorrida->setVelocidade(390);
echo $carroCorrida->getVelocidade() . " km/h ✅<br>";

echo "Tentando aceleração para 500 km/h (ultrapassaria 400): ";
$carroCorrida->setVelocidade(500);
echo $carroCorrida->getVelocidade() . " km/h ⚠️<br><br>";

echo "✅ As classes filhas conseguem melhorar a implementação mantendo a segurança!";
?>
