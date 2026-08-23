<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["txtNome"];
    $valorCompra = $_POST["txtValorCompra"];
    $formaPagamento = $_POST["cmbPag"];

    $desconto = 0;

    if ($formaPagamento == "cartaoCredito") {

        $desconto = 0;
        $valorFinal = $valorCompra;

        $mensagem = "Olá $nome, sua compra de R$ " .
        number_format($valorCompra, 2, ',', '.') .
        " foi realizada com cartão de crédito. Não há desconto.<br>" .
        "Valor final da compra: R$ " .
        number_format($valorFinal, 2, ',', '.') . ".";

    } elseif ($formaPagamento == "boleto") {

        // Desconto de 8% para boleto
        $desconto = $valorCompra * 0.08;
        $valorFinal = $valorCompra - $desconto;

        $mensagem = "Olá $nome, sua compra de R$ " .
        number_format($valorCompra, 2, ',', '.') .
        " foi realizada com boleto.<br>" .
        "Seu desconto é de R$ " .
        number_format($desconto, 2, ',', '.') . ".<br>" .
        "Valor final da compra: R$ " .
        number_format($valorFinal, 2, ',', '.') . ".";

    } elseif ($formaPagamento == "deposito") {

        // Desconto de 10% para depósito
        $desconto = $valorCompra * 0.10;
        $valorFinal = $valorCompra - $desconto;

        $mensagem = "Olá $nome, sua compra de R$ " .
        number_format($valorCompra, 2, ',', '.') .
        " foi realizada com depósito.<br>" .
        "Seu desconto é de R$ " .
        number_format($desconto, 2, ',', '.') . ".<br>" .
        "Valor final da compra: R$ " .
        number_format($valorFinal, 2, ',', '.') . ".";

    } else {

        $mensagem = "Forma de pagamento inválida.";
    }

    echo "<div class='w3-panel w3-green'>$mensagem</div>";
}

/*
Comentário final:

Primeiro criei o formulário para receber o nome, o valor da compra
e a forma de pagamento.

Depois, corrigi o código PHP para fazer os descontos corretamente:
8% para boleto e 10% para depósito. No cartão de crédito não tem desconto.

Também fiz o cálculo do valor final da compra, mostrando o desconto
e quanto o cliente deverá pagar.

Com essa atividade, consegui entender melhor como o formulário envia
as informações para o PHP e como o PHP faz os cálculos de acordo com
a forma de pagamento escolhida.
*/

?>
