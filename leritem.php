<?php
    require 'conecta.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: grid.php");
    } else {
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
    }
?>
 
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
</head>
 
<body>
<?php 
	echo "Status ....: " . count($dados);
	if ( count($dados) == 1 )  { 
		echo "Livro não encontrado ! - Verificar parametro e acesso !"; 
	}

?>
	<div> 
		Detalhes do Livro	
	</div> 
	<div> 
		<label>Name</label>
	</div>
	<div>  
		<label><?php echo $dados['NOME'];?></label>
	</div> 
	<div> 
		<label>ID</label>
	</div>
	<div>  
		<label><?php echo $dados['ID'];?></label>
	</div> 
	<div> 
		<a href="grid.php">Voltar para o Grid</a>
	</div>
  </body>
</html>