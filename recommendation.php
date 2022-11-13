<?php
	session_start();
	if(!isset($_SESSION["loggedin"])){
        header("location: signup_login.php");
    }

	$idUtente = $_SESSION['id'];
    $_SESSION['id'] = $idUtente;
?>


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	
	<link rel="stylesheet" href="./styles/style.css" />

	<title>EMO - MUSIC Web App</title>
</head>

<body>
	<!--NAVBAR-->
	<nav class="navbar navbar-dark fixed-top bg-dark">
		<div class="container-fluid navcontainer">
			<a class="navbar-brand brand-name" href="intro.php"><b>EMO - MUSIC</b>: Music for your Emotions</a>
			
			<div class="input-field button">
				<a href="graph.php"><button type="submit" id="btn_graph" class="btn btn-outline-light">RE-READ YOUR EMOTIONS</button></a>
				<form action="/php/logout.php" style="display:contents">
                	<button type="submit" id="btn_logout" class="btn btn-outline-light">LOGOUT</button>
                </form>
      		</div>
		</div>
	</nav>
    


    <!--HEADER-->
    <section class="header py-5">
		<div class="container py-5 emodisplay">
            <?php
              $emozione_dominante = $_GET['emozione_dominante'];
    		echo
        	"<div>
				<p class='fs-4 my-1 text-white' style='text-align:center; font-size:35px !important;'>Your dominant emotion: <b style='color:#FFD700 !important;'>".strtoupper($emozione_dominante)."</b><br></p>	
			</div>";
			
			include './php/config.php';
			if (mysqli_connect_errno()) echo "Connessione al database non riuscita: " . mysqli_connect_error();
			
			$sql = "SELECT immagine FROM EMOZIONE WHERE emozione ='$emozione_dominante'";
			$result = $link -> query($sql);
			$row = $result -> fetch_assoc();
			$immagine = $row['immagine'];   
            $_SESSION['emozione'] = $emozione_dominante;
			echo
			"<td valign='middle' width='20%'><center><img style='width=10%;height=20%;align=center' src='data:image/gif;base64," .base64_encode($immagine). "'/></center></td>";                    
    ?>
			<div class="row">
				<div class="col-md-6">
					<div class="h-100 d-flex flex-column justify-content-center py-5">
						<div class='card bg-dark text-white cardvideo' style='width:100%; height: 17rem'>
                    			
					
							<!--PHP CONNESSIONE + VISUALIZZAZIONE CANZONE SINGOLA-->
							<?php
								include './php/config.php';

								// Check connection
								if (mysqli_connect_errno())
									echo "Connessione al database non riuscita: " . mysqli_connect_error();

								$sql = "SELECT max(id) AS massimo FROM CANZONE"; 
								$result = $link -> query($sql);
								$row = $result -> fetch_assoc();
								$id_massimo = $row['massimo'];
														
								$randomic_value = rand(1, $id_massimo);
								$sql = "SELECT link, id FROM CANZONE  WHERE id='$randomic_value'"; //seleziona info di una canzone random
								$result = $link -> query($sql);
								$row = $result -> fetch_assoc();
								$link_c = $row['link'];
                    			$idCanzone = $row['id'];
                                
                                $_SESSION['idCanzone'] = $idCanzone;
                               

								// COLONNA CONTENENTE IL VIDEO
								echo "
							<iframe width='100%' height='315' src='".$link_c."' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture'></iframe>
									";              
								echo"
							<div  class='wrapper'>
        						<div class='like'>
                               		<i onclick='like(&quot;$idCanzone&quot;)' id='li' class='bi bi-hand-thumbs-up'>Like</i>
        						</div>
        						<div class='dislike'>
            						<i onclick='dislike(&quot;$idCanzone&quot;)' id='di' class='bi bi-hand-thumbs-down-fill'>Dislike</i>
        						</div>
								<!--<div id='likeAlert' class='alert alert-primary' role='alert' hidden></div>
                        		<div id='dislikeAlert' class='alert alert-secondary' role='alert' hidden></div>-->
							</div>
                    			";
							?>
						</div>
                        <div id='likeAlert' class='alert alert-primary' role='alert' hidden></div>
                    	<div id='dislikeAlert' class='alert alert-secondary' role='alert' hidden></div>
					</div>
				</div>


				<div class="col-md-6">
					<div class="h-100 d-flex flex-column justify-content-center py-5">
						<div class="text-wrapper tableplaylist">
							<div class="text-inner">
								<p class="fs-4 my-1 text-white" style="text-align:center">Other songs that would fit your emotional status: </br></p>
								
								<div class="containertable">
									<table class="table table-striped table-dark">
										<thead>
											<tr>
												<th scope="col"></th>
												<th scope="col">Song Name</th>
												<th scope="col">Artist</th>
											</tr>
										</thead>

										<tbody>

											<!-- PHP LISTA CANZONI -->
											<?php
												include './php/config.php';

												// Check connection
												if (mysqli_connect_errno())
													echo "Connessione al database non riuscita: " . mysqli_connect_error();
                                                    
                                                $idCanzone = $_SESSION['idCanzone'];

												$sql = "SELECT max(id) AS massimo FROM CANZONE";
												$result = $link -> query($sql);
												$row = $result -> fetch_assoc();
												$id_massimo = $row['massimo'];
                                                
                                                $numbers = range(1, $id_massimo); // genero numeri compresi tra 1 e l'id max di CANZONI
    											shuffle($numbers);
    											$listaCanzoni = array_slice($numbers, 0, 8); // genero 8 numeri casuali
                                                
                                                $lunghezza = count($listaCanzoni);
                                                
                                                // controllo che nell'array non vi sia la canzone da stampare in video
                                               
                                               	for($i=0;$i<$lunghezza;$i++)
                                                {
                                                	if($listaCanzoni[$i] == $idCanzone)
                                                    {
                                                    	unset($listaCanzoni[$i]); // elimino la cella in cui c'è la canzone del video
														$listaCanzoni = array_values($listaCanzoni);
                                                        break;
                                                    }
                                                }
                                                
                                                $lunghezza = count($listaCanzoni);
                                           
												for($i=1; $i<$lunghezza; $i++)
												{
													$sql = "SELECT nome, artista, copertina FROM CANZONE WHERE id ='$listaCanzoni[$i]'";
													$result = $link -> query($sql);
													$row = $result -> fetch_assoc();
													$nome_canzone = $row['nome'];
													$artista = $row['artista'];
													$copertina = $row['copertina'];
                                                    if($i>5)
                                                    {
                                                    	break;
                                                    }
													echo "
												<tr>
													<td valign='middle' width='20%'><img class='card-img' src='data:image/gif;base64," .base64_encode($copertina). "'/></td>
													<td valign='middle' width='40%'>" . $nome_canzone . "</td>
													<td valign='middle' width='40%'>" . $artista . "</td>
												</tr>
													";
												}											
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
	

    <!--scripts-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./script/TweenMax.min.js"></script>
    
    <script src="./script/function.js"></script>
    <script src="./script/transition_recommendation.js"></script>
</body>
</html>
