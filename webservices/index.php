<?php
 
class RedeemAPI {

    private $db;

    // Dados da conexao - propriedades da classe
    private static $dbNome = 'livrosdb' ;
    private static $dbServidor = 'tcp:meuslivros.database.windows.net,1433';
    private static $dbUsuario = 'ffreg@meuslivros.database.windows.net';
    private static $dbSenha = 'Sistema53!';
    
    // Metodo Construtor - Abre uma nova conexao com o DB
    // ao inves de self::$db estou utilizando $this como outra forma de acessar o objeto
    function __construct() {
    
    	if ( null == self::$cont ) {     
    	    try {
        	  self::$cont =  new PDO( "sqlsrv:Server=".self::$dbServidor.";"."Database=".self::$dbNome, self::$dbUsuario, self::$dbSenha); 
          	// se fosse uma conexao com o MySQL a string de conexao seria: mysql:host ao inves de sqlsrv:Server= | dbname= as inves de Database="
       		}
        	catch(PDOException $e) {
          	// Se ocorrer erro de conexão, apresentar e parar a app 
          	die($e->getMessage()); 
        	}
       	}
       return self::$cont;
    }
 

    // Destructor - close DB connection
    function __destruct() {
        $this->db->close();
    }

    // Main method to redeem a code
    function redeem() {
        // Print all codes in database
        $stmt = $this->db->prepare('SELECT id,nome FROM meuslivros');
        $stmt->execute();
        $stmt->bind_result($id, $nome);
        while ($stmt->fetch()) {
            echo "Passei por aqui - Debig Step 1";
        }
        $stmt->close();
    }
}

$api = new RedeemAPI;
$api->redeem();

?>