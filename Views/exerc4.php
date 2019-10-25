<?php
$nomeArquivo = "../Import/pessoas.json";

//Incluindo funções externas
require_once "../Include/manipularJson.inc.php";
require_once "../Include/encapsular4.inc.php";
require_once "../Include/tabelas.inc.php";

$pessoas = abrirJson($nomeArquivo);

?>
<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Exercício 4 </title> 
		<link rel="stylesheet" href="formata-matrizes.css">
</head> 

<body> 
	<h1> Vetores com PHP - exercício 4 </h1>
	
	<form action="exerc4.php" method="post">
		<fieldset>
			<legend> Processando informações sobre nome e idade de pessoas </legend>
			
			<label>Digite o nome da primeira pessoa </label> 
			<input type="text" name="nome1" autofocus>
			<label> Digite a idade dessa pessoa: </label>
			<input type="number" name="idade1"  min="0"><br>
            <label>Digite o nome da segunda pessoa </label> 
			<input type="text" name="nome2" autofocus>
			<label> Digite a idade dessa pessoa: </label>
			<input type="number" name="idade2"  min="0">
            
             <br> <br>
			
			<label> Selecione uma operação: </label> 
			
			<select name="operacao">
				<option value="1">Salvar </option>
				
				<option value="2"> Mostrar pessoas </option>	

			    <option value="3"> Mostrar menores </option>
			
			    <option value="4"> Mostrar mais velha </option>
			
			    
		</select>
	</fieldset>
		
		<button type="submit" name="enviar"> Executar operação selecionada </button>		
    </form> 

    <?php
    if(isset($_POST["enviar"])){
        $nomeColuna1 = "Nome";
        $nomeColuna2 = "Idade";
        $operacao = $_POST["operacao"];
        $tabela = 4;
        if($operacao == 1){
            $pessoas = encapsular($pessoas);
            salvarAlteracao($nomeArquivo,$pessoas);
        }
        
        elseif($operacao == 2)
            tabelar($pessoas,$nomeColuna1,$nomeColuna2,$tabela);

        elseif($operacao == 3){
            $cont = false;
            $menores =[];
            foreach($pessoas as $nome => $idade){
                if($idade < 18){
                   $menores[$nome] = $idade;
                   $cont = true;
            }} 
            if($cont){
                $nomeColuna3 = "Menores de idade"; 
                tabelar($menores,$nomeColuna1,$nomeColuna2,$tabela,$nomeColuna3);
            }else{
                echo"<p>Não a pessoas menores de 18 anos</p>";
        }}
        elseif($operacao == 4){
            $velho = max($pessoas);
            $chave = array_search($velho,$pessoas);
            echo"<p>$chave com idade de $velho é a pessoa mais velha</p>";
        }
        else{
            echo"<p>não compreendido</p>";
        }

    }
    ?>
</body>
</html>