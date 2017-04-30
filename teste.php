<!DOCTYPE html>
<html lang="pt">
<html>
	<head>
		<title>Teste do PHP no Azure</title> 
	</head>
	<body> 
		<?php echo '<p>Hello World !!</p>'; ?>
		<?php
		// Conexao SQL database 
		$host = "tcp:meuslivros.database.windows.net,1433";
		$user = "ffreg@meuslivros.database.windows.net";
		$pwd = "Sistema53!";
		$db = "livrosdb";
 
		try {
	   	 	$conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
	    	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 
		    $sqlQuery = $conn->query("SELECT * FROM meuslivros");
			$result = $sqlQuery->fetchAll();
			echo "Row count: " . count($result) . ".";
		}
		catch(Exception $e){
    		die(var_dump($e));
		}
		?>
	</body>
</html>
