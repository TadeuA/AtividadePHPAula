<?php
$nomeArquivo = "../Import/cliente.json";

//Incluindo funções externas
require_once "../Include/manipularJson.inc.php";
require_once "../Include/encapsular6.inc.php";
require_once "../Include/maiorConta6.inc.php";
require_once "../Include/tabelas.inc.php";

$clientes = abrirJson($nomeArquivo);


?>
<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Exercício 6 </title> 
		<link rel="stylesheet" href="formata-matrizes.css">
</head> 

<body> 
	<h1> Vetores com PHP - exercício 6 </h1>
	
	<form action="exerc6.php" method="post">
		<fieldset>
			<legend> Processando informações conta bancaria </legend>
			
			<label>Conta: </label> 
			<input type="text" name="conta">
			<label> $: </label>
			<input type="number" name="valor" autofocus min="0"><br>
			<label>saque</label>
            <input type="radio" name="saqDep" value="1" checked>
			<label>deposito</label>
            <input type="radio" name="saqDep" value="0">
			
           
            
             <br> <br>
			
			<label> Selecione uma operação: </label> 
			
			<select name="operacao">
				<option value="1" autofocus >Realizar operação</option>
				
				<option value="2" > Maior saldo </option>	

			    <option value="3"> Adicionar cliente </option>	    
		</select>
		<label >Digite o nome para adicionar:</label>
		<input type="text"  name="nome" >
	</fieldset>
		
		<button type="submit" name="enviar"> Executar operação selecionada </button>		
    </form> 
	
    <?php
    if(isset($_POST["enviar"])){
        
        
		$operacao = $_POST["operacao"];
		
        if($operacao == 1){
			$nomeOperacao = "deposito";
			$conta = encapsularConta();
			$valor = encapsularValor();
			$saqDep = encapsularOP();
			
			if($saqDep == 1){
				$valor *= -1;
				$nomeOperacao = "saque";
			}

			$numconta = $clientes[$conta];
			$cliente = key($numconta);
			echo"<p>Conta $conta do cliente $cliente com saldo de".$numconta[$cliente].", realiza a operação de $nomeOperacao assim alterando o valor em conta para".($numconta[$cliente]+ $valor)."</p>";
			$clientes[$conta][$cliente] += $valor;
			salvarAlteracao($nomeArquivo,$clientes);
				
        	}
        	elseif($operacao == 2){
				maiorConta($clientes);
		   	}
        elseif($operacao == 3){
			$nome = encapsularNome();
			$conta = encapsularConta();
			$valor = encapsularValor();
			$nomeColuna1 = "Conta";
            $nomeColuna2 = "Nome";
            $nomeColuna3 = "Saldo";
			$clientes[$conta][$nome] =  ( double ) $valor;
			$tabela = 6;
			tabelar($clientes,$nomeColuna1,$nomeColuna2,$tabela,$nomeColuna3);
			salvarAlteracao($nomeArquivo,$clientes);
		}  
        else{
            echo"<p>não compreendido</p>";
        }
    }
    ?>
	
</body>
</html>
