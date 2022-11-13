<!-- IN QUESTA PAGINA APPAIONO LE CANZONI CONSIGLIATE, LIKE/DISLIKE, DIAGRAMMA EEG-->
<!-- PAGINA TEMPORANEA DA MIGLIORARE-->

<!DOCTYPE html>

<html>
<head>
<title>LOGIN</title>
</head>

<body>
	
    RISULTATI

    <?php

		session_start();

		$sql = "SELECT nome FROM CANZONE WHERE valence=1"; 
		// Query da cambiare. Dovrebbe restituire solo un valore (e così non lo fa), 
		// ma supponiamo lo faccia per ora

		// Stiamo anche supponendo che non esistano canzoni uguali
		
		$result = $conn -> query($sql);
    	$row = $result -> fetch_assoc();

		echo "Canzone consigliata: ".$row['nome'];
		
		$nomeCanzone = $row['canzone'];

		$_SESSION['nomeCanzone'] = $nomeCanzone;
	?>

    <form action="risultati_like.php">
		<button type="submit">LIKE</button>
	</form>

    <form action="risultati_dislike.php">
		<button type="submit">DISLIKE</button>
	</form>

</body>

</html>