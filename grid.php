<html>
	<head>
		<title>Grid</title> 
	</head>
	<body>	
	   <div>
            <div >
                <h3>Grid - Meus Livros</h3>
            </div>
            <div>
            	<p>
                    <a href="novoitem.php">Novo Livro</a>
                </p>
            </div> 
            <div>
                <table border=1 width="50%">
                    <tr>
                      <td>ID</td>
                      <td>Nome do Livro</td>
                    </tr>
                  <?php
                   include 'conecta.php';
                   $conexao = Conecta::abrir();
                   $query = $conexao->prepare("SELECT ID,NOME FROM meuslivros");
                   $query->execute();
                   for($i=0; $row = $query->fetch(); $i++){
                            echo '<tr>';
                            echo '<td>' . $row[ID] . '</td>';
                            echo '<td>' . $row[NOME] . '</td>';
                            echo '</tr>';
                   }
                   Conecta::fechar();
                  ?>
            </table>
        </div>
    </body>
</html> 

