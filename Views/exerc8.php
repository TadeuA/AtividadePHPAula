<?php
$nomeArquivo = "../Import/compras.json";

//Incluindo funções externas
require_once "../Include/manipularJson.inc.php";
require_once "../Include/encapsular8.inc.php";
require_once "../Include/tabelas.inc.php";

$clientes = abrirJson($nomeArquivo);


?>
<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Exercício 8 </title> 
		<link rel="stylesheet" href="formata-matrizes.css">
</head> 

<body> 
	<h1> Vetores com PHP - exercício 8 </h1>
	
	<form action="exerc8.php" method="post">
		<fieldset>
			<legend> Caixa loja </legend>
			
			<label>Digite o cpf da primeira pessoa </label> 
			<input type="text" name="cpf1" autofocus>
            <label>Digite o nome dessa pessoa </label> 
			<input type="text" name="nome1">
			<label> Digite o valor de compra dessa pessoa: </label>
			<input type="number" name="valor1"s min="0"><br>
			<label> Selecione a forma de pagamento: </label><br>
            <label>Cartão/Dinheiro</label>
			<input type="radio" name="pagamento1" value="1" checked>
            <label>outro</label>
			<input type="radio" name="pagamento1" value="2"><br>
            <label>Digite o cpf da segunda pessoa </label> 
			<input type="text" name="cpf2" autofocus>
            <label>Digite o nome dessa pessoa </label> 
			<input type="text" name="nome2">
			<label> Digite o valor de compra dessa pessoa: </label>
			<input type="number" name="valor2"s min="0"><br>
			<label> Selecione a forma de pagamento: </label><br>
            <label>Cartão/Dinheiro</label>
			<input type="radio" name="pagamento2" value="1" checked>
            <label>outro</label>
			<input type="radio" name="pagamento2" value="2"><br>
            <label>Digite o cpf da terceira pessoa </label> 
			<input type="text" name="cpf3" autofocus>
            <label>Digite o nome dessa pessoa </label> 
			<input type="text" name="nome3">
			<label> Digite o valor de compra dessa pessoa: </label>
			<input type="number" name="valor3"s min="0"><br>
			<label> Selecione a forma de pagamento: </label><br>
            <label>Cartão/Dinheiro</label>
			<input type="radio" name="pagamento3" value="1" checked>
            <label>outro</label>
			<input type="radio" name="pagamento3" value="2"><br>
            <label>Digite o cpf da quarta pessoa </label> 
			<input type="text" name="cpf4" autofocus>
            <label>Digite o nome dessa pessoa </label> 
			<input type="text" name="nome4">
			<label> Digite o valor de compra dessa pessoa: </label>
			<input type="number" name="valor4"s min="0"><br>
			<label> Selecione a forma de pagamento: </label><br>
            <label>Cartão/Dinheiro</label>
			<input type="radio" name="pagamento4" value="1" checked>
            <label>outro</label>
			<input type="radio" name="pagamento4" value="2">            
            
            
             <br> <br>
			
			<label> Selecione uma operação: </label> 
			
			<select name="operacao">
				<option value="1">Salvar </option>
				
				<option value="2"> Menor Compra </option>	

			    <option value="3"> Compras no cartão ou dinheiro </option>
			
			    <option value="4"> Dotz </option>
			
			    
		</select>
	</fieldset>
		
		<button type="submit" name="enviar"> Executar operação selecionada </button>		
    </form> 
    <?php
    if(isset($_POST["enviar"])){
        $tabela = 8;
        $operacao = $_POST["operacao"];
        if($operacao == 1){
            $clientes = encapsular($clientes);
            salvarAlteracao($nomeArquivo,$clientes);
              
        }elseif($operacao == 2){
            $valor=[];
                foreach($clientes as $cliente => $dados){
                   ;
                    
                    array_push($valor, $dados["valor"]);
                }
                $menor = min($valor);
                foreach($clientes as $cliente => $dados){
                    $existe = array_search($menor,$dados);
                    if($existe){
                        echo"<p>O cliente ".$dados['nome']." efetuou a compra no valor de ".$dados['valor']." sendo o menor valor entre os clientes.</p>";
                    }
                }    
        }elseif($operacao == 3){
           $cardDin = [];
           $nomeColuna1 = "Nome";
           $nomeColuna2 = "CPF";
           $nomeColuna3 = "Valor";
            foreach($clientes as $cliente => $dados){
                if($dados['forma']= 1){
                    $cardDin[$cliente] = [
                                            "nome" => $dados["nome"], 
                                            "valor" => $dados["valor"]
                                        ];
                }
            }
            tabelar($cardDin,$nomeColuna1,$nomeColuna2,$tabela,$nomeColuna3);
            
        }
        elseif($operacao == 4){
            $dotz = [];
            $nomeColuna1 = "Nome";
            $nomeColuna2 = "CPF";
            $nomeColuna3 = "DOTZ";
            foreach($clientes as $cliente => $dados){
                if($dados['forma'] == 1){
                    $cash = $dados['valor'] / 2;
                }else{
                    $cach = $dados['valor'] / 4;
                }
                $dotz[$cliente] = [
                                    "nome" => $dados["nome"], 
                                    "valor" => $cash
                                ];
                        
                
            }
            
                tabelar($dotz,$nomeColuna1,$nomeColuna2,$tabela,$nomeColuna3);
            
            
        }
    }
    
    ?>
</body>
</html>