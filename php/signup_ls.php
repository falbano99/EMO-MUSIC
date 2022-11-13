<?php

    require_once "config.php";

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    // verifico che il nickname e/o la mail non siano già in uso

    $sql = "SELECT count(*) as cntUser FROM UTENTE where email='".$email."' or nome='".$nome."'";
    $result = $link -> query($sql);
    $row = mysqli_fetch_array($result);
    $count = $row['cntUser'];
    
    if(strpos($email, "@") === false) {
    	echo "MANCA";
        exit();
    }

    if($count > 0) // controllo se l'utente esiste già
    {
        $_SESSION['uname'] = $uname;
        echo "ERRORE_CREDENZIALI"; //significa che l'utente esiste già
    }
    else // se l'utente non esiste
    {
        if($password1 != $password2) //password non combaciano
        {
            $_SESSION['uname'] = $uname;
            echo "ERRORE_PASSWORD";
        }
        else // entro in questo else se: utente NON esiste e se password combaciano
        {
            // se nickname/email NON sono in uso, allora l'utente può creare il suo account
            // definisco qual è l'ID da associare al nuovo utente
            $sql = "SELECT max(id) AS massimo FROM UTENTE";
            $result = $link -> query($sql);
            $row = $result -> fetch_assoc();
            $idNuovo = $row['massimo'] + 1;

            // inserimento dati utente nel DB
            $sql = "INSERT INTO UTENTE (id, nome, email, password) VALUES ('$idNuovo', '$nome', '$email', '$password1')";
            $result = $link -> query($sql);  
            
            echo "OK";
        }

    }

    mysqli_close($link);

?>