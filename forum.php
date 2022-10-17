<?php
//Atribuimos o XML a uma variável
$string = "<?xml version='1.0' encoding='UTF-8'?>
<signos>
    <signo>
        <dataInicio>21/03</dataInicio>
        <dataFim>20/04</dataFim>
        <signoNome>Aries</signoNome>
        <descricao>Áries é o primeiro signo do zodíaco e o primeiro na trilogia do fogo - simboliza a faísca.</descricao>
    </signo>
    <signo>
        <dataInicio>21/04</dataInicio>
        <dataFim>20/05</dataFim>
        <signoNome>Touro</signoNome>
        <descricao>Touro é o primeiro signo do elemento terra, regido por Vênus, o planeta do amor e dos relacionamentos.</descricao>
    </signo>
    <signo>
        <dataInicio>21/05</dataInicio>
        <dataFim>20/06</dataFim>
        <signoNome>Gemeos</signoNome>
        <descricao>O primeiro signo de ar é Gêmeos, o signo mais curioso, apelidado de borboleta do zodíaco, pela sua curiosidade, leveza e capacidade de voar de um lado a outro.</descricao>
    </signo>
    <signo>
        <dataInicio>21/06</dataInicio>
        <dataFim>20/07</dataFim>
        <signoNome>Cancer</signoNome>
        <descricao>Câncer é o primeiro signo de água, regido pela Lua e, como seu luminar regente, é totalmente instável e pode viver as quatro fases lunares em um só dia.</descricao>
    </signo>
    <signo>
        <dataInicio>21/07</dataInicio>
        <dataFim>20/08</dataFim>
        <signoNome>Leao</signoNome>
        <descricao>Leão é o segundo signo pertencente à trilogia do fogo e representa a chama.</descricao>
    </signo>
    <signo>
        <dataInicio>21/08</dataInicio>
        <dataFim>20/09</dataFim>
        <signoNome>Virgem</signoNome>
        <descricao>Virgem é o segundo signo de terra, regido por Mercúrio, o deus da comunicação e do conhecimento.</descricao>
    </signo>
    <signo>
        <dataInicio>21/09</dataInicio>
        <dataFim>20/10</dataFim>
        <signoNome>Libra</signoNome>
        <descricao>Libra é o segundo signo do elemento ar, regido por Vênus, o planeta do amor e dos relacionamentos.</descricao>
    </signo>
    <signo>
        <dataInicio>21/10</dataInicio>
        <dataFim>20/11</dataFim>
        <signoNome>Escorpiao</signoNome>
        <descricao>Escorpião é o segundo signo de água, também extremamente sensível e profundo, ligado ao mundo emocional.</descricao>
    </signo>
    <signo>
        <dataInicio>21/11</dataInicio>
        <dataFim>20/12</dataFim>
        <signoNome>Sargitario</signoNome>
        <descricao>Sagitário é o terceiro signo do elemento fogo e representa as cinzas.</descricao>
    </signo>
    <signo>
        <dataInicio>21/12</dataInicio>
        <dataFim>20/01</dataFim>
        <signoNome>Capricornio</signoNome>
        <descricao>Capricórnio é o décimo signo astrológico do zodíaco, situado entre Sagitário e Aquário e associado à constelação de Capricornus.</descricao>
    </signo>
    <signo>
        <dataInicio>21/01</dataInicio>
        <dataFim>20/02</dataFim>
        <signoNome>Aquario</signoNome>
        <descricao>Aquário é o terceiro signo de ar, regido por Urano, o planeta da liberdade e da rebeldia.</descricao>
    </signo>
    <signo>
        <dataInicio>21/02</dataInicio>
        <dataFim>20/03</dataFim>
        <signoNome>Peixes</signoNome>
        <descricao>Peixes é o décimo segundo, e último signo astrológico do zodíaco, situado entre Aquário e Áries e associado à constelação de Pisces.</descricao>
    </signo>
</signos>";
//A data informada pelo usuário é convertida para manipulação
$data = $_POST['data'];
$ddd = strtotime($data);
$data = date('m-d', $ddd);
//Verifica o ano atual do calendário e atribui a uma variável
$ano = date('Y');
//Ajusta a data para o ano Atual
$data = $ano . '-' . $data;
//TimeSleep para manipulação
$dddd = strtotime($data);
//Atribui as variáveis separadamente: dia e mês informado pelo usuário
$diaCliente = date('d', $dddd);
$mesCliente = date('m', $dddd);
//Abrindo arquivo xml
$xml = new SimpleXMLElement($string);
?>
<!--Esgtrutura html-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qual o seu signo?</title>
</head>
<body>
    <div>
        <h2>Qual o seu signo?</h2>
        <?php 
            //Lógica para checar as datas
            foreach($xml->signo as $signo0):
                //Atribui a data inicio e data fim a uma variável
                $dataInicio = (string)$signo0->dataInicio;
                $dataFim = (string)$signo0->dataFim;
                //Ajusta data inicio e data fim para o ano atual
                $dataInicio = str_replace('/', '-', $dataInicio);
                $dataFim = str_replace('/', '-', $dataFim);
                $dataInicio = $dataInicio . '-' .$ano;
                $dataFim = $dataFim . '-' .$ano;             
                //Time sleep data inicio e data fim
                $toTimeInicio = strtotime($dataInicio);
                $toTimeFim = strtotime($dataFim);
                //Atribui data inicio, data fim, mes inicio e mes final a uma variável
                $diaSignoInicio = date('d', $toTimeInicio);
                $diaSignoFim = date('d', $toTimeFim);
                $mesSignoInicio = date('m', $toTimeInicio);
                $mesSignoFim = date('m', $toTimeFim);
                //Checage para ver entre qual datas esta a data informada pelo cliente
                if(($diaCliente >= $diaSignoInicio && $mesCliente == $mesSignoInicio) || ($diaCliente <= $diaSignoFim && $mesCliente == $mesSignoFim)){
                    ?> <span>Seu signo: <?php echo $signo0->signoNome . '</br>'; ?>
                       <span>Descriçao: <?php echo $signo0->descricao . '</br>';
                }            
            endforeach;
            echo '</br>'
        ?>
        <!--Botão para voltar a pag da data-->
        <form action="index.html">
            <input type="submit" value="Voltar">
        </form>
        </div>
</body>
</html>