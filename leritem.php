<?php
    require 'conecta.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_GET['id'];
    }
     
    if ( null==$id ) {
        header("Location: grid.php");
    } 
    else {
    	try { 
    		$conexao = Conecta::abrir();
        	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        	$sql = "SELECT ID,NOME FROM meuslivros where id = ?";
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
    <div>
    	<div>
    		<div>
    			<h3>Detalhes do Livro</h3>
    		</div>
    		<div>
    			<div>
    				<label>Name</label>
    			</div>
    			<div>
    				<label><?php echo $dados['nome'];?></label>
    			</div>
            </div>
        </div>
        <div><a href="grid.php">Back</a></div> 
    </div>
  </body>
</html>