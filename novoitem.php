<?php
    // Classe de conexao ao DB
    require 'conecta.php';
 
    // Se for um post do formulario vamos tratar 
    if ( !empty($_POST)) {
        // variavel para tratar os erros
        $nameError = null;
         
        // obtem o campo de entrada Nome e atribuii para variavel
        $name = $_POST['nome'];
         
        // Valida a entrada
        $valid = true;
        if (empty($name)) {
            $nameError = 'Por favor, entre com o Nome';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Conecta::abrir();
            try {
            	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            	$sql = "INSERT INTO novolivro (NOME) values (?)";
            	$q = $pdo->prepare($sql);
            	$q->execute(array($name));
            	Conecta::fechar();
            }
            catch(PDOException $e) {
				// Se ocorrer erro, apresentar e parar a app 
				die($e->getMessage()); 
        	}
            // echo "Gravado..." . $name
            // header("Location: grid.php");
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
            	<h3>Inserir um Novo Livro</h3>
            </div>
                <form action="novoitem.php" method="post">
                    <div>
                        <label>Nome</label>
                    </div>
                    <div>
                    <input name="nome" type="text"  placeholder="Nome" value="<?php echo !empty($name)?$name:'';?>">
                        <?php if (!empty($nameError)): ?>
                            <span><?php echo $nameError;?></span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit">Gravar</button>
                        <a href="grid.php">Voltar</a>
                    </div>
                </form>
        </div>        
    </div>
  </body>
</html>
        