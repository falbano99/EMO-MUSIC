<?php

session_start();

require_once "config.php";
  
$nomeCanzone = $_SESSION['nomeCanzone'];

$sql = "UPDATE PLAYLIST SET like = 1 WHERE canzone = .'$nomeCanzone'.";
$result = $conn -> query($sql);
header("Location: risultati.php"); // ritorniamo alla pagina di stampa della canzone

?>