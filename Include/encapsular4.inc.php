<?php
function encapsular($pessoas){
    $nome1 = $_POST["nome1"];
    $idade1 = $_POST["idade1"];
    $nome2 =  $_POST["nome2"];
    $idade2 = $_POST["idade2"];
    

    $pessoas[$nome1] =( int ) $idade1;
    $pessoas[$nome2] =( int ) $idade2;
    
    return $pessoas;
}