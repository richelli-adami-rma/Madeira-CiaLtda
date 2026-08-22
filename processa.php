<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["txtNome"];
    $valorCompra = $_POST["txtValorCompra"];
    $formaPagamento = $_POST["cmbPag"];
    $desconto = 0;

    if ($formaPagamento == "cartaoCredito") {
        $desconto = 0;
        $valorFinal = $valorCompra;

        $mensagem = "Olá $nome, sua compra de R$ " . number_format($valorCompra, 2, ',', '.') .
        " foi realizada com cartão de crédito. Não há desconto.";

    } elseif ($formaPagamento == "boleto") {
        // Desconto de 8% para boleto
        $desconto = $valorCompra * 0.08;
        $valorFinal = $valorCompra - $desconto;

        $mensagem = "Olá $nome, sua compra de R$ " . number_format($valorCompra, 2, ',', '.') .
        " foi realizada com boleto.<br>" .
        "Seu desconto é de R$ " . number_format($desconto, 2, ',', '.') . ".<br>" .
        "Valor final da compra: R$ " . number_format($valorFinal, 2, ',', '.') . ".";

    } elseif ($formaPagamento == "deposito") {
        // Desconto de 10% para depósito
        $desconto = $valorCompra * 0.10;
        $valorFinal = $valorCompra - $desconto;

        $mensagem = "Olá $nome, sua compra de R$ " . number_format($valorCompra, 2, ',', '.') .
        " foi realizada com depósito.<br>" .
        "Seu desconto é de R$ " . number_format($desconto, 2, ',', '.') . ".<br>" .
        "Valor final da compra: R$ " . number_format($valorFinal, 2, ',', '.') . ".";

    } else {
        $mensagem = "Forma de pagamento inválida.";
    }

    echo "<div class='w3-panel w3-green'>$mensagem</div>";
}
?>