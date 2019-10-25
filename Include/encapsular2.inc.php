<?php
function encapsularCapital($operacao){
    if($operacao == 1)
        $capital = $_POST["capitais"];
    else
        $capital = $_POST["nome-capital"];
    
    return $capital;
}
function encapsularPopulacao(){
    $populacao = $_POST["populacao"];
    return $populacao;
}