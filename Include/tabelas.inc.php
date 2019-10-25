<?php
function tabelar($vetorMatriz,$nomeColuna1,$nomeColuna2,$tabela,$nomeColuna3 = null){
    echo "<table>";
    if($tabela == 8 || $tabela == 6){
        echo "<tr>
            <th>$nomeColuna1</th>
            <th>$nomeColuna2</th>
            <th>$nomeColuna3</th>
        </tr>";
        switch ($tabela) {
            case 8:
                tabela8($vetorMatriz);
                break;
        
            case 6:
                tabeal6($vetorMatriz);
                break;
        }
    }else{
        echo "<caption>$nomeColuna3</caption>
                <tr>
                    <th>$nomeColuna1</th>
                    <th>$nomeColuna2</th>
                </tr>";

        switch ($tabela) {
            case 4:
                tabela4($vetorMatriz);
                break;
        
            case 2:
                tabela2($vetorMatriz);
                break;
        }
        
    }
    echo "</table>"; 
}

function tabela8($vetorMatriz){
    
    foreach ($vetorMatriz as $cliente => $dados) {
        echo"<tr>
        <td>".$dados['nome']."</td>
        <td>".$cliente."</td>
        <td>".$dados['valor']."</td>
        </tr>";  
    }
}

function tabeal6($vetorMatriz){
    
    foreach($vetorMatriz as $conta => $cliente){
        echo"<tr>
            <td>$conta</td>";
            
            foreach($vetorMatriz[$conta] as $pessoa => $saldo){
            echo"<td>$pessoa</td>
            <td>$saldo</td>
            </tr>";
    }}
}

function tabela4($vetorMatriz){

    foreach($vetorMatriz as $nome => $idade){
        echo"<tr>
            <td>$nome</td>
            <td>$idade</td>
        </tr>";
    } 
}

function tabela2($vetorMatriz){
    
    foreach($vetorMatriz as $capital => $populacao){
        echo"<tr>
            <td>$capital</td>
            <td>$populacao</td>
        </tr>";
    } 
}