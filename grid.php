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
                   $query = $conexao->prepare("SELECT ID,NOME FROM meuslivros");
                   $query->execute();
                   
                   // $sql = 'SELECT id,nome FROM meuslivros';
                   for($i; $row = $query->fetch(); $i++){ {
                            echo '<tr>';
                            echo '<td>' . $i . "-" . $row[ID] . '</td>';
                            echo '<td>' . $row[NOME] . '</td>';
                            echo '</tr>';
                   }
                   Conecta::fechar();
                  ?>
            </table>
        </div>
    </body>
</html> 


$query = $pdo->prepare("select name FROM tbl_name");
      $query->execute();
      
      for($i=0; $row = $query->fetch(); $i++){
        echo $i." - ".$row['name']."<br/>";
      }

      unset($pdo); 
      unset($query);