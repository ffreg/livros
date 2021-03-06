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
	if ( count($dados) == 1 )  { 
		// Caso o usuario altera o parametro de chamada URL para algo invalido  
		// exemplo: ?id=090990989
		echo "Livro não encontrado ! - Verificar o ID utilizado como parametro !"; 
	} else {
		echo "
		<div> 
			Detalhes do Livro
		</div>
		<div>
		<label>Name</label>
		</div>
		<div>
		<label>" . $dados['NOME'] . "</label>
		</div>
		<div>
		<label>ID</label>
		</div>
		<div>
			<label>" . $dados['ID'] . "</label>
		</div>";	
	}

?>
	<div> 
		<a href="grid.php">Voltar para o Grid</a>
	</div>
  </body>
</html>