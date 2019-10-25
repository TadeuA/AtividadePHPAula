<?php

function abrirJson($nomeArquivo){
    //pegando o conteúdo do .json para a variável
    $arquivo = file_get_contents($nomeArquivo);
    //decodificando os dados armazenados para um array
    $arrayMatriz = json_decode($arquivo, true);
    return $arrayMatriz; 
}
function salvarAlteracao($nomeArquivo,$arrayMatriz){
    $json = fopen($nomeArquivo, 'w');
    fwrite($json, json_encode($arrayMatriz,JSON_UNESCAPED_UNICODE));
    fclose($json);
}