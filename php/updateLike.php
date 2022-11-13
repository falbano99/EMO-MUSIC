<?php

session_start();

require_once "config.php";

$user = $_SESSION['user'];
$loggeduserid = $user['id'];

$emozione = $_SESSION['emozione'];

$nomeCanzone = $_POST['songName'];
$like=$_POST['like'];
$idUtente = $_SESSION['id'];
$DateAndTime = date('Y-m-d H:i:s', time()); 

$sql = "INSERT INTO PLAYLIST (idCanzone, idUtente, dataOra, likes, emozione) VALUES($nomeCanzone, $idUtente, '$DateAndTime', $like, '$emozione')";
if($result = mysqli_query($link,$sql)) echo("OK");
else echo($sql);

mysqli_close($link);
?>
