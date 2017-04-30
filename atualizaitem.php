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
                <form action="atualizaitem.php?id=<?php echo $id?>" method="post">
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
        