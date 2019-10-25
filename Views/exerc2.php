<?php
$nomeArquivo = "../Import/capitais.json";

//Incluindo funções externas
require_once "../Include/manipularJson.inc.php";
require_once "../Include/encapsular2.inc.php";
require_once "../Include/tabelas.inc.php";
require_once "../Include/funcoes2.inc.php";

$capitais = abrirJson($nomeArquivo);


?>

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Exercício 2 </title> 
		<link rel="stylesheet" href="formata-matrizes.css">
</head> 

<body> 
	<h1> Vetores com PHP - exercício 2 </h1>
	
	<form action="exerc2.php" method="post">
		<fieldset>
			<legend> Processando informações sobre algumas capitais do país </legend>
			
			<label> Selecione uma capital para visualizar sua população: </label> <br>
			<?php
					foreach($capitais as $nome => $populacao)
						echo "<input type='radio' name='capitais' value='$nome'> $nome <br>";				
				?>			
		 <br> 
			
			
			<label> Forneça o nome de uma capital para visualizar ou adicionar sua populacao: </label>
			<input type="text" name="nome-capital" autofocus class="maior"> <br> <br>
            <label > Forneça o numero populacional da capital apar adicionar no array: </label>
			<input type="number" name="populacao" class="maior"> <br> 
			
			<label> Selecione uma operação: </label> 
            <select name="operacao">
			    <option value="1"> Mostrar a populacao da capital selecionada no botão de rádio </option>
				
				<option value="2"> Receber o nome de uma capital e mostrar sua população </option>	

			    <option value="3"> Ordenar as capitais pelo nome, crescentemente </option>
			
			    <option value="4"> Ordenar as capitais pela população decrescentemente </option>
			
			    <option value="5"> Mostrar a média populacional das capitais </option>
			
			    <option value="6"> Mostrar capitais com população ABAIXO da média </option>
			
			
			    <option value="7"> Mostrar a maior população e sua caiptal </option>
			
			    <option value="8"> Converter o vetor em string </option>
			
			    <option value="9"> Adicionar, manualmente, algumas capitais ao vetor </option>
		</select>
        
	</fieldset>
		
		<button type="submit" name="enviar"> Executar operação selecionada </button>		
    </form>  
    <?php
   
    if(isset($_POST["enviar"])){
        $operacao = $_POST["operacao"];
        
        if($operacao == 1 || $operacao == 2){
            $capital = encapsularCapital($operacao);
            mostrarPopulação($capital,$capitais);
        }elseif($operacao == 3)
            crescente($capitais);
        elseif($operacao == 4)
            decrescente($capitais);
        elseif($operacao == 5)
            media($capitais);
        elseif($operacao == 6)
            abaixo($capitais);
        elseif($operacao == 7)
            maior($capitais);
        elseif($operacao == 8)
            mutacao($capitais);
        elseif($operacao == 9){
            $capital = encapsularCapital($operacao);
            $populacao = encapsularPopulacao();
            adicionar($capital,$populacao,$capitais);
        }else
            echo "<p>Selecione alguma opção valida</p>";
                
    }
    
    ?>  
    
</body> 
</html> 