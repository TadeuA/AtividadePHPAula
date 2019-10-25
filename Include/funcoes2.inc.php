<?php
function mostrarPopulação($capital,$capitais){
    $existe = array_key_exists($capital,$capitais);
    if($existe)
        echo"<p>A populão da $capital é de ".$capitais[$capital]."</p>";
    else
        echo"<p>Passe um valor valido</p>";
}

function reorganizarJson($capitais){
    $nomeArquivo = "../Import/capitais.json";
    salvarAlteracao($nomeArquivo,$capitais);
    $capitais = abrirJson($nomeArquivo);
    chamartabela($capitais);
    
}

function chamartabela($capitais){
    $tabela = 2;
    $nomeColuna1 = "Capitais";
    $nomeColuna2 = "População";
    tabelar($capitais,$nomeColuna1,$nomeColuna2,$tabela);
}

function crescente($capitais){
    asort($capitais);
    reorganizarJson($capitais);
}

function decrescente($capitais){
    arsort($capitais);
    reorganizarJson($capitais);
}

function medias($capitais){
    $soma = array_sum($capitais);
    $quanto = count($capitais);
    $media = $soma / $quanto;
    return $media;
}

function media($capitais){
    $media = medias($capitais);
    echo"<p>A média de populações das capitais é de $media</p>";
}

function abaixo($capitais){
    $medias = medias($capitais);
    echo"<p>A media é de $medias portando as capitais a baixo da média são</p>";
    $abaixo = [];
    foreach ($capitais as $capital => $populacao) {
        if($populacao < $medias)
            $abaixo[$capital] = $populacao;
    }
    chamartabela($abaixo);
}

function mutacao($capitais){
    $str = implode("-", $capitais);
    echo "<p>$str</p>";
}

function adicionar($capital,$populacao,$capitais){
    $capitais[$capital]= ( int ) $populacao;
    reorganizarJson($capitais);
}

function maior($capitais){
    $maior = max($capitais);
    $capital = array_search($maior, $capitais);
    echo "<p>$capital tem a maior população, que é de $maior</p>";
}