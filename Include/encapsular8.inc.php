<?php
    function encapsular($clientes){
        $nome1 = $_POST["nome1"];
        $cpf1 = $_POST["cpf1"];
        $valor1 = $_POST["valor1"];
        $forma1 = $_POST["pagamento1"];
        $nome2 = $_POST["nome2"];
        $cpf2 = $_POST["cpf2"];
        $valor2 = $_POST["valor2"];
        $forma2 = $_POST["pagamento2"];
        $nome3 = $_POST["nome3"];
        $cpf3 = $_POST["cpf3"];
        $valor3 = $_POST["valor3"];
        $forma3 = $_POST["pagamento3"];
        $nome4 = $_POST["nome4"];
        $cpf4 = $_POST["cpf4"];
        $valor4 = $_POST["valor4"];
        $forma4 = $_POST["pagamento4"];

        
        $clientes[$cpf1]=["nome"=>$nome1,"valor"=> ( double ) $valor1,"forma"=> ( int ) $forma1];
        $clientes[$cpf2]=["nome"=>$nome2,"valor"=> ( double ) $valor2,"forma"=> ( int ) $forma2];
        $clientes[$cpf3]=["nome"=>$nome3,"valor"=> ( double ) $valor3,"forma"=> ( int ) $forma3];
        $clientes[$cpf4]=["nome"=>$nome4,"valor"=> ( double ) $valor4,"forma"=> ( int ) $forma4];
        
        
        return $clientes;
    }
   