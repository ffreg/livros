<?php
    require 'conecta.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: grid.php");
    }
     
    if ( !empty($_POST)) {
        // 
        $nameError = null;

        // 
        $name = $_POST['name'];

        // 
        $valid = true;
        if (empty($name)) {
            $nameError = 'Por favor entre com o Nome';
            $valid = false;
        }
         
        // 
        if ($valid) {
        	try {
				$conexao = Conecta::abrir();
            	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            	$sql = "UPDATE meuslivros set name = ? WHERE id = ?";
            	$query = $conexao->prepare($sql);
            	$query->execute(array($name,$id));
            	Conecta::fechar();
            } catch(PDOException $e) {
				// Se ocorrer erro, apresentar e parar a app 
				die($e->getMessage()); 
        	}
            header("Location: status.php?nome=" . $name . "&stat=U");
        }
    } else {
    		try { 
    			$conexao = Conecta::abrir();
		        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        		$sql = "SELECT ID,NOME FROM meuslivros where id = ?";
        		$query = $conexao->prepare($sql);
        		$query->execute(array($id));
        		$dados = $query->fetch(PDO::FETCH_ASSOC);
        		$name = $dados['NOME'];
        		Conecta::fechar();
        	} catch(PDOException $e) {
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
    <div>
    	<div>
    		<div>
            	<h3>Atualizar dados do Livro</h3>
            </div>
                <form action="atualizaritem.php?id=<?php echo $id?>" method="post">
                    <div">
                    	<label>Nome</label>
                    <div>
                        <input name="nome" type="text"  placeholder="Nome" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                            	<span><?php echo $nameError;?></span>
                            <?php endif; ?>
                    </div>
                    </div>
                    <div>
                        <button type="submit">Atualizar</button>
                        <a class="btn" href="grid.php">Voltar para o Grid</a>
                    </div>
                </form>
            </div>     
    </div>
  </body>
</html>
        