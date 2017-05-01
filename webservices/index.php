<?php

require conecta.php; 

class RedeemAPI {

	function __construct() {
    }
 
    function __destruct() {
    }

    function redeem() {
    	$conexao = Conecta::abrir();
        $query = $conexao->prepare("SELECT ID,NOME FROM meuslivros ORDER BY NOME");
        $query->execute();
        $query->bind_result($id, $nome); 
        while ($query->fetch()) {
        	echo "$nome"; 
        }
        
        Conecta::fechar();
    
    	echo "Hello, PHP!";
    }
}

$api = new RedeemAPI;
$api->redeem();

?>