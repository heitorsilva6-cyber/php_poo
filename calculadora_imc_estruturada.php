<?php
function calcularIMC($peso, $altura) {
    return $peso / ($altura * $altura);
}

function classificarIMC($imc) {
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
?>