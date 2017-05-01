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
    	//if ( null == $this->db ) {     
        //	try {
        		$this->db = new PDO( "sqlsrv:Server=".this$->dbServidor.";"."Database=".this$->dbNome, this$>dbUsuario, this$->dbSenha); 
        		$this->db->autocommit(FALSE);
        //	} 
        //	catch(PDOException $e) {
          		// Se ocorrer erro de conexão, apresentar e parar a app 
         // 		die($e->getMessage()); 
         // 	}
        }

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
            echo "$id has $nome uses remaining!";
        }
        $stmt->close();
    }
}

$api = new RedeemAPI;
$api->redeem();

?>