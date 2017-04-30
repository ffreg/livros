<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>

<?php
     
    require 'conecta.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
         
        // keep track post values
        $name = $_POST['nome'];
         
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Por favor, entre com o Nome';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Conecta::abrir();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO novolivro (NOME) values(?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name));
            Conecta::fechar();
            header("Location: grid.php");
        }
    }
?>


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
        