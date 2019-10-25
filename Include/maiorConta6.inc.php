<?php
function maiorConta($clientes){
    $array = [];
	foreach($clientes as $conta => $cliente){
		foreach($clientes[$conta] as $cliente => $saldo){
			$array[$cliente] = $saldo;
	}}
	$maior = max($array);
	$nomecliente = array_search($maior,$array);
	foreach($clientes as $conta => $cliente){
		foreach($cliente as $nome => $saldo){
			$existe = array_key_exists($nomecliente,$cliente);
				if($existe){
					echo "<p>o maior saldo é da conta ".$conta." cliente $nome com saldo de $saldo</p>";
	}}}
}