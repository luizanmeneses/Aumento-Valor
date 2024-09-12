<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 11 - Aumento Preço</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $precoAtual = $_GET['preco'] ?? '';
        $aumento = $_GET['perc'] ?? 0;
    ?>
    <main>
        <h2>Reajustador de Preços</h2>
        <form action="<?=$_SERVER['PHP_SELF']?>">
            <label for="preco">Preço do Produto (R$)</label>
            <input type="number" name="preco" id="preco" min="0.10" step="0.01" value="<?=$precoAtual?>">
            <label for="perc">Qual será o percentual de ajuste?(<strong><span id="p">?</span>%</strong>)</label>
            <!--O js que vai mexer no p do span-->
            <input type="range" name="perc" id="perc" min="1" max="100" step="1" oninput="mudaValor()" value="<?=$aumento?>">
            <!--Sempre que mexer na barrinha, chama essa função e esta, altera o texto do span-->
            <button type="submit">Reajustar</button>
        </form>
    </main>

    <section>
        <h2>Resultado do Reajuste</h2>
        <?php 
            $valorAum = ($precoAtual * $aumento) / 100;
            $valorFinal = $precoAtual + $valorAum;
        
            /*echo"O produto que custava R$ $precoAtual com $aumento% de aumento vai passar a custar R$ $valorFinal.<br>";
            echo"O valor de aumento foi R$ $valorAum";*/
        ?>
            <p>O produto que custava R$ <?=number_format($precoAtual,2,",",".")?>, com <strong><?=$aumento?>% de aumento</strong> vai passar a custar
            <strong>R$ <?=number_format($valorFinal,2,",",".")?></strong> O valor do aumento foi de R$ <?=number_format($valorAum,2,",",".")?></p>
    </section>
    <script>
        //Declaração automática, assim que reinicia, pra que não volte ao texto original, mas fique atualizado com a barrinha
        mudaValor();
        function mudaValor(){
            p.innerText = perc.value;
        //O texto dentro do elem ident como "p" será mudado pelo valor que tiver dentro do "perc".
        }
    </script>
</body>
</html>
<!--
Nessa parte da barra do % pra que ela atualize na label conforme vai rolando a barra, é necessário usar uma linguagem do lado
do servidor, pois se usar só PHP toda vez tem que submeter, aí fica meio que no escuro. Aqui usamos JS, muito interessante isso
cara (<label for="perc">Qual será o percentual de ajuste?(?=$aumento?>%)</label>)assim precisa sempre submeter
A barrinha não chega até o final por conta do css, mas funciona bem



-->