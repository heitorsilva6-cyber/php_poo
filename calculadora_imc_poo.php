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
require_once 'calculadora_imc_poo.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];

    $calculadora = new CalculadoraIMC($peso, $altura);
    $imc = $calculadora->calcularIMC();
    $classificacao = $calculadora->classificarIMC();

    echo "<h2>Resultado:</h2>";
    echo "Seu IMC é: " . number_format($imc, 2) . "<br>";
    echo "Classificação: " . $classificacao;
}
?>
</body>
</html>