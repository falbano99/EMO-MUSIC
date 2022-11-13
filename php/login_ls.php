<?php
   
    session_start();

    $err=0;
    require_once "config.php";

    $message_error = "Wrong Credentials. Try again.";
   
    $email = $_POST["email"];
    $password = $_POST["password"];
    $chk=$_POST["logCheck"];
    
	$sql = "select count(*) as cntUser, id from UTENTE where email='".$email."' and password='".$password."'";
	$result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result);
    $count = $row['cntUser'];
    $id = $row['id'];
    
    
    if(strpos($email, "@") === false) {
    	echo "MANCA";
        exit();
    }
    if($count > 0){
        //$_SESSION['uname'] = $uname;
        $_SESSION["loggedin"]="True";
        $_SESSION["id"] = $id;
        if(isset($chk)) {
        	setcookie ("email",$email,time()+ 3600, '/');
			setcookie ("password",$password,time()+ 3600, '/');
            echo "ATTIVO";
        }
        else
        	echo "OK";
        //header("Location: ../forgotPSW_insertPassword.html");
    }else{
        echo "ERRORE";
    }

mysqli_close($link);

?>
