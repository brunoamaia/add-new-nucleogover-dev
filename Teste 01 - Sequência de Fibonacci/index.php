<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        *{
            margin: 0;
            padding: 0;
            border: 0;
        }
        body{
            padding:10px 20px;
            font-size:18px;
            background-color: #1A1A23;
            font-family: Poppins, Arial, Helvetica, sans-serif;
            color: #DDD;
        }
        header h1 {
            padding: 1em 0 0.5em;
            display: flex;
        }
        header h1 {
            justify-content: center;
        }
        main {
            display:flex;
            flex-direction:column;
            align-items: center;
            margin: 10px 3em 0;
        }
        form input {
            margin: 0 5px;
            height: 25px;
            width: 150px;
            border-radius: 5px;
            padding-left: 5px;
        }
        form button {
            margin: 0 5px;
            height: 25px;
            width: 80px;
            border-radius: 5px;
        }
        main .exit {
            content: "";
            background-color:#888;
            border-radius: 10px;
            width: 90vw;
            height: 500px;
            margin-top:1em;
        }
        .result{
            position: relative;
            top: -480px;
            left: 10vw;
            max-width: 80vw
        }
        .result p {
            display: flex;
            justify-content: center;
            word-break: break-all;
        }
        .result span{
            font-weight:bold;
        }
        .error{
            color: #FCDBDB;
        }
        .error span{
            color: #881919;
        }
    </style>
    <title>Fibonacci</title>
</head>
<body>
    <header>
        <h1>Calculadora de elementos da sequência de Fibonacci</h1>
    </header>
    <main>
        <form action="" method="POST">
            <label for="position">Digite a posição desejada:</label>
            <input type="number" min="0" name="position" title="Informe um valor positivo" required="required"/>
            <button type="submit">Calcular</button>
        </form>
        <div class="exit"> </div>
    </main>
<?php
    function showNumberAndAddOrdinalMarker($position) {
        $number = is_numeric($position) ? $position : 0;
        return str_replace(" ", "", "$number º");
    }

    function showResult($position, $result) {
        $orderedValue = showNumberAndAddOrdinalMarker($position);

        if($result == -1) {
            echo "<div class='result error'><p>O valor <span>$position</span> é inválido. Insira um número inteiro positivo.</p></div>";
        } elseif ($result == -2) {
            echo "<div class='result error'><p><span>$position</span> é inválido. Insira um número inteiro positivo.</p></div>";
        } else {
            echo "<div class='result'><p>O $orderedValue valor da sequência Fibonacci de é: $result</p></div>";
        }
    }

    function Fibonacci($n) {        // Método que calcula o valor do enésimo termo da sequência de Fibonacci
        if ($n <= 1) {
            return showResult($n, $n);
        }

        $penultimateValue = 0;
        $lastValue = 1;

        for ($i = 2; $i <= $n; $i++) {  // Foram utilizadas apenas as posições necessárias, para redução da utilização de memória
            $current = bcadd($penultimateValue, $lastValue);
            $penultimateValue = $lastValue;
            $lastValue = $current;
        }

        showResult($n, $lastValue);
    }

    if(isset($_POST['position'])) {          // Utilização de "return early" para validar o valor
        $position = $_POST['position'];

        if (!is_numeric($position)) {       // O HTML já faz a validação do tipo, mas é bom o sistema ter sua validação
            return showResult($position, -2);
        }

        $convertedPosition = intval($position);

        if ($convertedPosition >= 0) {
            return Fibonacci($convertedPosition);
        }

        return showResult($convertedPosition, -1);
    }
?>
</body>
</html>