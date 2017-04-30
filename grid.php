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
                <table border=1 >
                    <tr>
                      <td>ID</td>
                      <td>Nome do Livro</td>
                    </tr>
                  <?php
                   include 'conecta.php';
                   $conexao = Conecta::abrir();
                   echo '<tr><td colspan=2>Conectou ...</td></tr>';
                   $sql = 'SELECT * FROM meuslivros ORDER BY id DESC';
                   foreach ($conexao->query($sql) as $row) {
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