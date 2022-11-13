<!-- logout -->

<?php
    session_start(); // avvio della sessione
    session_destroy(); // eliminazione della sessione con le relative variabili
    header("location: ../signup_login.php"); //dopo il logout si viene reindirizzati alla pagine di login
?>