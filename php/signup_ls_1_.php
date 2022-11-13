<?php

    require_once "config.php";
   
    //$bool = false;
    $erroreNome = "Nickname already taken!";
    $erroreEmail = "E-mail already taken!";
    $errorePassword = "Passwords do not match!";

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    if($password1 != $password2)
    {
        echo "<script type='text/javascript'>alert('$errorePassword');</script>";
        header("Location: ../signup.html");
    }

    // verifico che il nickname e/o la mail non siano già in uso

    $sql = "SELECT nome, email FROM UTENTE";

	//echo $sql;

    $result = $link -> query($sql);
    //$row = $result -> fetch_assoc();

	while($row = $result -> fetch_assoc())
	{
		 if($row['nome'] == $nome)
		{
			echo "<script type='text/javascript'>alert('$erroreNome');</script>";
            header("Location: ../signup.html");
		}
		if($row['email'] == $email)
		{
			echo "<script type='text/javascript'>alert('$erroreEmail');</script>";
            header("Location: ../signup.html");
		}
	}

    // se nickname/email NON sono in uso, allora l'utente può creare il suo account
    
    // definisco qual è l'ID da associare al nuovo utente

    $sql = "SELECT max(id) AS massimo FROM UTENTE";

    $result = $link -> query($sql);
    $row = $result -> fetch_assoc();
    $idNuovo = $row['massimo'] + 1;

    // inserimento dati utente nel DB

    $sql = "INSERT INTO UTENTE (id, nome, email, password) VALUES ('$idNuovo', '$nome', '$email', '$password1')";

    echo $sql;

    $result = $link -> query($sql);
    //$row = $result -> fetch_assoc();

?>