<?php
 
class RedeemAPI {

    private $db;
    private $cont; 
    
    // Dados da conexao - propriedades da classe
    private static $dbNome = 'livrosdb' ;
    private static $dbServidor = '';
    private static $dbUsuario = 'ffreg@meuslivros.database.windows.net';
    private static $dbSenha = 'Sistema53!';
    
    // Metodo Construtor - Abre uma nova conexao com o DB
    // ao inves de self::$db estou utilizando $this como outra forma de acessar o objeto
    function __construct() {
    	echo "Constroe ...";
    
    	//if ( null == self::$cont ) {     
    	//    try {
        //	  self::$cont =  new PDO( "sqlsrv:Server=tcp:meuslivros.database.windows.net,1433";"."Database=livrosdb", self::$dbUsuario, self::$dbSenha); 
          	// se fosse uma conexao com o MySQL a string de conexao seria: mysql:host ao inves de sqlsrv:Server= | dbname= as inves de Database="
       	//	}
        //	catch(PDOException $e) {
          	// Se ocorrer erro de conexão, apresentar e parar a app 
         // 	die($e->getMessage()); 
        //	}
       	//}
       //return self::$cont;
    }
 

    // Destructor - close DB connection
    function __destruct() {
    	echo "Deconstroe..."; 
       // $this->db->close();
    }

    // Main method to redeem a code
    function redeem() {
    		echo "Hello, PHP!";
    
    
        // Print all codes in database
        //$stmt = $this->db->prepare('SELECT id,nome FROM meuslivros');
        //$stmt->execute();
        //$stmt->bind_result($id, $nome);
        //while ($stmt->fetch()) {
        //    echo "Passei por aqui - Debug Step 1";
        }
        $stmt->close();
    }
}

$api = new RedeemAPI;
$api->redeem();

?>