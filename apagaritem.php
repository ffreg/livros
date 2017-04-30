<?php
    require 'conecta.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // 
        $id = $_POST['id'];
         
        // Apaga o registro
        try {
        	$conexao = Conecta::abrir();
        	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        	$sql = "DELETE FROM customers  WHERE id = ?";
        	$query = $conexao->prepare($sql);
        	$query->execute(array($id));
        	Conecta::fechar();
		}  catch(PDOException $e) {
				// Se ocorrer erro, apresentar e parar a app 
				die($e->getMessage()); 
        }
		header("Location: status.php?nome=" . $name . "&stat=D");  
    } else { 
    	// Ler os dados do livro para apresentar ao usuario antes da acao
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
     
                <div>
                    <div>
                        <h3>Apagar um Livro<h3>
                    </div>
                     
                    <form action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p color=red>Tem certeza que deseja apagar o Livro ?</p>
                      <div class="form-actions">
                          <button type="submit">Sim</button>
                          <a href="grid.php">Não - Voltar para o Grid</a>
                        </div>
                    </form>
                </div>
                 
    </div>
  </body>
</html>