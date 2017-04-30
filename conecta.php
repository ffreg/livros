<?php
class Conecta
{
	// Dados da conexao - propriedades da classe
    private static $dbNome = 'livrosdb' ;
    private static $dbServidor = 'tcp:meuslivros.database.windows.net,1433';
    private static $dbUsuario = 'ffreg@meuslivros.database.windows.net';
    private static $dbSenha = 'Sistema53!';
     
    private static $cont = null;
     
    public function __construct() {
        die('Init nao eh permitido');
    }
     
    public static function abrir()
    {
       // Uma conexão para ser utilizada por toda a aplicação
       // Se nao exsite a conexao, vamos tentar criar uma nova
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "sqlsrv::host=".self::$dbServidor.";"."dbname=".self::$dbNome, self::$dbUsuario, self::$dbSenha); 
        }
        catch(PDOException $e)
        {
          // Se ocorrer erro de conexão, apresentar e parar a app 
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function fechar()
    {
        self::$cont = null;
    }
}
?>