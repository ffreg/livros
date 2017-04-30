<!DOCTYPE html>
<html lang="pt-br">
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
                          <button type="submit">Gravar</button>
                          <a href="grid.php">Voltar</a>
                        </div>
                    </form>
                </div>
                 
    </div>
  </body>
</html>
        