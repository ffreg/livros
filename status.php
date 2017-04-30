<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
</head>
<body>
	<div> 
		<?php
			$tipo = $_GET['stat']; 
			if ( $tipo == 'N' ) { 
			 	echo "Novo livro " . $_GET['nome'] . " foi gravado com sucesso!";
			} elseif ( $tipo == 'U' ) {
				echo "Livro " . $_GET['nome'] . " foi atualizado com sucesso!";
			}
		?>
	</div
	<div> 	
		<a href="grid.php">Voltar para o Grid</a> 
	</div>  
</body>
<html> 