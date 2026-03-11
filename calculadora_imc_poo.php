<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
</head>
<body>
    <h1>Calculadora de IMC</h1>
    <form method="post">
        <label for="peso">Peso (kg):</label>
        <input type="number" id="peso" name="peso" step="0.1" required><br><br>
        <label for="altura">Altura (m):</label>
        <input type="number" id="altura" name="altura" step="0.01" required><br><br>
        <input type="submit" value="Calcular IMC">
    </form>     
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $peso = $_POST["peso"];
        $altura = $_POST["altura"];

        class Pessoa
        {
            private $peso;
            private $altura;

            public function __construct($peso, $altura)
            {
                $this->peso = $peso;
                $this->altura = $altura;
            }

            public function calcularIMC()
            {
                return number_format($this->peso / ($this->altura * $this->altura), 2, ',', '.');
            }
            
            public function classificarIMC() {

            $imc = $this->calcularIMC();

            if ($imc < 18.5) {
            return "Abaixo do peso";
            } elseif ($imc < 25) {
            return "Peso normal";
            } elseif ($imc < 30) {
            return "Sobrepeso";
            } else {
            return "Obesidade";
            }
            }   
        }

        $pessoa = new Pessoa($peso, $altura);
        echo "<h2>O IMC calculado é: " . $pessoa->calcularIMC() . "</h2>";
        echo "<h2>A classificação do IMC é: " . $pessoa->classificarIMC() . "</h2>";
    }
    ?>
</body>
</html>