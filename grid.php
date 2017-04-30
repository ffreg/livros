<html>
	<head>
		<title>Grid</title> 
	</head>
	<body>
	
	   <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <table class="table table-striped table-bordered">
                    <tr>
                      <th>Name</th>
                      <th>Email Address</th>
                      <th>Mobile Number</th>
                    </tr>
                  <?php
                   include 'conecta.php';
                   $pdo = Conecta::abreconexao();
                   $sql = 'SELECT * FROM meuslivros ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['mobile'] . '</td>';
                            echo '</tr>';
                   }
                   Conecta::fechaconexao();
                  ?>
            </table>
        </div>
    </body>
</html> 