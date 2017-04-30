<?php
    require 'conecta.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: grid.php");
    } 
    else {
    	try { 
    		$conexao = Conecta::abrir();
        	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	$sql = "SELECT ID,NOME FROM meuslivros where ID = ?";
        	$query = $conexao->prepare($sql);
        	$query->execute(array($id));
        	$dados = $query->fetch(PDO::FETCH_ASSOC);
			Conecta::fechar();
		}
		catch (PDOException $e) {
				// Se ocorrer erro, apresentar e parar a app 
				die($e->getMessage()); 
    }
?>
 
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
</head>
 
<body>
<?php echo "Passei por aqui";  ?> 
Detalhes do Livro </br>
<label>Name</label> </br> 
<label><?php echo $dados['nome'];?></label></br>
<a href="grid.php">Back</a>
  </body>
</html>