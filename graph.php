<?php
	session_start();
	if(!isset($_SESSION["loggedin"])){
        header("location: signup_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">

  <link rel="stylesheet" href="./styles/style.css" />

  <title>EMO - MUSIC Web App</title>
</head>

<body>

  <!--NAVBAR-->
  <nav class="navbar navbar-dark fixed-top bg-dark">
		<div class="container-fluid navcontainer">
			<a class="navbar-brand brand-name" href="intro.php"><b>EMO - MUSIC</b>: Music for your Emotions</a>

			<div class="input-field button">
				<form action="/php/logout.php" style="display:contents">
         	<button type="submit" id="btn_logout" class="btn btn-outline-light">LOGOUT</button>
        </form>
    	</div>
		</div>
	</nav>

  <!--HEADER-->
  <section class="header py-5">
    <div class="container py-5">

      <!--MESSAGGIO-->
      <div class="message">
        <div class="text-wrapper">
          <div class="text-inner">
            <p class="text-white">We are reading your emotions.<br></p>
            <p class="text-white">The process will take at least 40 seconds. <br></p>
            <p class="text-white">Then you will choose when to stop it.<br></p>
            <p class="text-white">Wait and then click on the button.<br></p>
          </div>
        </div>
      </div>

      <div class="row">

        <!-- Quality of Signal -->
        <div class="text-wrapper">
				  <table class="quality scndpart" style="position: absolute; display:grid; margin: auto; top: 14%; right: 75%;">
            <caption style="padding-top:0rem; padding-bottom:0rem; text-align:center">
                <p style="color:white;"><b>Quality of Signal</b></p>
            </caption>
            <tbody>
              <tr>
                <td style="width: 10%; text-align: -webkit-right;" >
						      <img src = "/static/red_dot.png" id="img_qos_red" width = "15%" height="15%">
						      <img src = "/static/green_label.png" id="img_qos_green" width = "15%" height="15%">
						      <img src = "/static/orange_label.png" id="img_qos_orange" width = "15%" height="15%">
					      </td>
					      <td style="width: 10%;">
						      <a style="color:white;" class="navbar-brand brand-name" id= "signal_label"><b></b></a>
					      </td>
              </tr>
            </tbody>
				  </table>
        </div>

        <!--PULSANTE-->
        <div class="h-100 d-flex flex-column justify-content-center py-5" style="padding-bottom: 30px !important;">
          <div class="input-field buttonstop">
            <button type="button" class="btn btn-bd-primary stop" id="stop_button" onclick="stoppa()">ARE YOU READY? STOP AND LISTEN
              YOUR MUSIC</button>
          </div>
          <div class="input-field buttonstop">
          <!--PROGRESS BAR-->
          <div id='progressbar1'></div>
          </div>
        </div>
      </div>

      <div class="row scndpart">

        <!--GRAFICO-->
        <div class="col-md-6">
          <div class="h-90 d-flex flex-column justify-content-center py-5" style="padding-top: 0 !important; padding-bottom: 0 !important;">
          <p style="color:white" align="center" id = "label_eeg"><b>E.E.G. Calibration ...</b></p>
            <div class="graphrectangle">
              <canvas id="myChart0" style="width:100%;max-width:100%;max-height:75px"></canvas>
              <canvas id="myChart1" style="width:100%;max-width:100%;max-height:75px"></canvas>
              <canvas id="myChart2" style="width:100%;max-width:100%;max-height:75px"></canvas>
              <canvas id="myChart3" style="width:100%;max-width:100%;max-height:75px"></canvas>
              <canvas id="myChart4" style="width:100%;max-width:100%;max-height:75px"></canvas>
            </div>
          </div>
        </div>


        <!--MANOPOLE-->
        <div class="col-md-6" style="display: grid; align-content:center;">
          <div class="container_manopole h-110 d-flex flex-column justify-content-center py-5" style="padding-top: 0 !important; padding-bottom: 0 !important;">
           <p style="color:white;" align="center" id="label_manopole"><b>Emotion Recognitions loading...</b></p>
            <table id="tableindicators">
              <tr>
                <td>
                  <div id='myDiv0' style='display: flex; justify-content:center'>
                    <!-- Plotly chart will be drawn inside this DIV -->
                  </div>
                </td>
                <td>
									<div id='myDiv1' style='display: flex; justify-content:center'>
                    <!-- Plotly chart will be drawn inside this DIV -->
                  </div>
                </td>
                <td>
                  <p style="color:white; font-size: x-large; margin-top: 5rem;" align="center" id="label_avviso"><b><br><br><br>Your emotions will be presented here in 40 seconds.<br>Please, wait here.<br><br><br><br><br><br></b></p>
                  <div id='myDiv2' style='display: flex; justify-content:center'>
                    <!-- Plotly chart will be drawn inside this DIV -->
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div id='myDiv3' style='display: flex; justify-content:center'>
                    <!-- Plotly chart will be drawn inside this DIV -->
                  </div>
                </td>
                <td>
                  <div id='myDiv4' style='display: flex; justify-content:center'>
                    <!-- Plotly chart will be drawn inside this DIV -->
                  </div>
                </td>
                <td>
                  <div id='myDiv5' style='display: flex; justify-content:center'>
                    <!-- Plotly chart will be drawn inside this DIV -->
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div id='myDiv6' style='display: flex; justify-content:center'>
                    <!-- Plotly chart will be drawn inside this DIV -->
                  </div>
                </td>
                <td>
                  <div id='myDiv7' style='display: flex; justify-content:center'>
                    <!-- Plotly chart will be drawn inside this DIV -->
                  </div>
                </td>
                <td>
                  <div id='myDiv8' style='display: flex; justify-content:center'>
                    <!-- Plotly chart will be drawn inside this DIV -->
                  </div>
                </td>
              </tr>
            </table>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!--scripts-->

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src='https://cdn.plot.ly/plotly-2.14.0.min.js'></script>
  <script src="./script/TweenMax.min.js"></script>

  <script src="./script/transition_graph.js"></script>

  <!-- script per visualizzare indicatore -->
  <script>

  function createProgressbar(id, duration, callback) {
  // We select the div that we want to turn into a progressbar
  var progressbar = document.getElementById(id);
  progressbar.className = 'progressbar';

  // We create the div that changes width to show progress
  var progressbarinner = document.createElement('div');
  progressbarinner.className = 'inner';

  // Now we set the animation parameters
  progressbarinner.style.animationDuration = duration;

  // Eventually couple a callback
  if (typeof(callback) === 'function') {
    progressbarinner.addEventListener('animationend', callback);
  }

  // Append the progressbar to the main progressbardiv
  progressbar.appendChild(progressbarinner);

  // When everything is set up we start the animation
  progressbarinner.style.animationPlayState = 'running';
  }

  window.onload = setTimeout(function () {}, 5000);
    addEventListener('load', function() {
          createProgressbar('progressbar1', '40s');
        });

// Funzione per aggiornare la label da "E.E.G. Calibration ..." a "E.E.G. Signal"
	window.onload = setTimeout(function () {
		var elem = document.getElementById("label_eeg");
		elem.innerHTML="E.E.G. Signal";
		elem.style.fontWeight = "bold";
	}, 40000);


 // Funzione per aggiornare ogni 3 sec la label del QoS
  setInterval(function () {
		document.getElementById('img_qos_green').style.display = "none";
		document.getElementById('img_qos_red').style.display = "none";
		document.getElementById('img_qos_orange').style.display = "none";
		var min = 1;
		var max = 100;
		var qos = Math.floor(Math.random() * (max - min + 1) + min);
		document.getElementById("signal_label").innerHTML = qos+'%';
		if(qos>=70 && qos<=100){
			document.getElementById('img_qos_green').style.display = "block";
			document.getElementById('img_qos_red').style.display = "none";
			document.getElementById('img_qos_orange').style.display = "none";
		}
		else if (qos>40 && qos<70) {
			document.getElementById('img_qos_orange').style.display = "block";
			document.getElementById('img_qos_red').style.display = "none";
			document.getElementById('img_qos_green').style.display = "none";
		}
		else{
			document.getElementById('img_qos_red').style.display = "block";
			document.getElementById('img_qos_green').style.display = "none";
			document.getElementById('img_qos_orange').style.display = "none";
		}
	}, 3000)

    var emozioni = ["amusement", "excitement", "happiness", "surprise", "calmness", "sadness", "disgust", "fear", "hanger"];
    var emozione_dominante;
    var percentuali;
		document.getElementById("label_avviso").style.display = "block";
		document.getElementById('label_manopole').style.display = "none";

		window.onload = setTimeout(function () {

    setInterval(function () {

	// viene scelto un numero compreso tra 1 e 11
    percentuali = [Math.floor(Math.random() * 12) + 1, Math.floor(Math.random() * 12) + 1, Math.floor(Math.random() * 12) + 1, Math.floor(Math.random() * 12) + 1, Math.floor(Math.random() * 12) + 1, Math.floor(Math.random() * 12) + 1, Math.floor(Math.random() * 12) + 1, Math.floor(Math.random() * 12) + 1, Math.floor(Math.random() * 12) + 1];
	var somma = percentuali[0] + percentuali[1] + percentuali[2] + percentuali[3] + percentuali[4] + percentuali[5] + percentuali[6] + percentuali[7] + percentuali[8];
	somma = 100 - somma;

    var scelta = Math.floor(Math.random() * 9); // sceglie un numero tra 0 e 8
    percentuali[scelta] = percentuali[scelta] + somma;

    var massimo = Math.max(...percentuali);
    var posizione = 0;

    for (var i = 0; i < percentuali.length; i++) {
        if (percentuali[i] == massimo) {
          posizione = i;
          break;
        }
      }

    emozione_dominante=emozioni[posizione];

    // console.log(percentuali.max());
		document.getElementById('label_manopole').style.display = "block";
		document.getElementById("label_avviso").style.display = "none";

    var data = [
      {
        type: "indicator",
        mode: "gauge+number",
        value: percentuali[0],
        title: { text: "Amusement", font: { size: 18 } },
        gauge: {
          axis: { range: [0, 100], tickwidth: 1, tickcolor: "black" },
          bar: { color: "white" },
          bgcolor: "blue",
          borderwidth: 2,
          bordercolor: "fuchsia",
        }
      }
    ];


    var layout = {
      width: 100,
      height: 140,
      margin: {
        l: 5,
        r: 5,
        b: 0,
        t: 0,
      },
      paper_bgcolor: "transparent",
      font: { color: "white", family: "Arial" },
      tracetoggle: false
    };

    Plotly.newPlot('myDiv0', data, layout, { displayModeBar: false });

    var data = [
      {
        type: "indicator",
        mode: "gauge+number",
        value: percentuali[1],
        title: { text: "Excitement", font: { size: 18 } },
        gauge: {
          axis: { range: [0, 100], tickwidth: 1, tickcolor: "black" },
          bar: { color: "white" },
          bgcolor: "blue",
          borderwidth: 2,
          bordercolor: "fuchsia",
        }
      }
    ];

    var layout = {
      width: 100,
      height: 140,
      margin: {
        l: 5,
        r: 5,
        b: 0,
        t: 0,
      },
      paper_bgcolor: "transparent",
      font: { color: "white", family: "Arial" },
      tracetoggle: false
    };

    Plotly.newPlot('myDiv1', data, layout, { displayModeBar: false });

    var data = [
      {
        type: "indicator",
        mode: "gauge+number",
        value: percentuali[2],
        title: { text: "Happiness", font: { size: 18 } },
        gauge: {
          axis: { range: [0, 100], tickwidth: 1, tickcolor: "black" },
          bar: { color: "white" },
          bgcolor: "blue",
          borderwidth: 2,
          bordercolor: "fuchsia",
        }
      }
    ];

    var layout = {
      width: 100,
      height: 140,
      margin: {
        l: 5,
        r: 5,
        b: 0,
        t: 0,
      },
      paper_bgcolor: "transparent",
      font: { color: "white", family: "Arial" },
      tracetoggle: false
    };

    Plotly.newPlot('myDiv2', data, layout, { displayModeBar: false });

    var data = [
      {
        type: "indicator",
        mode: "gauge+number",
        value: percentuali[3],
        title: { text: "Surprise", font: { size: 18 } },
        gauge: {
          axis: { range: [0, 100], tickwidth: 1, tickcolor: "black" },
          bar: { color: "white" },
          bgcolor: "blue",
          borderwidth: 2,
          bordercolor: "fuchsia",
        }
      }
    ];

    var layout = {
      width: 100,
      height: 140,
      margin: {
        l: 5,
        r: 5,
        b: 0,
        t: 0,
      },
      paper_bgcolor: "transparent",
      font: { color: "white", family: "Arial" },
      tracetoggle: false
    };


    Plotly.newPlot('myDiv3', data, layout, { displayModeBar: false });

    var data = [
      {
        type: "indicator",
        mode: "gauge+number",
        value: percentuali[4],
        title: { text: "Calmness", font: { size: 18 } },
        gauge: {
          axis: { range: [0, 100], tickwidth: 1, tickcolor: "black" },
          bar: { color: "white" },
          bgcolor: "blue",
          borderwidth: 2,
          bordercolor: "fuchsia",
        }
      }
    ];

    var layout = {
      width: 100,
      height: 140,
      margin: {
        l: 5,
        r: 5,
        b: 0,
        t: 0,
      },
      paper_bgcolor: "transparent",
      font: { color: "white", family: "Arial" },
      tracetoggle: false
    };

    Plotly.newPlot('myDiv4', data, layout, { displayModeBar: false });

    var data = [
      {
        type: "indicator",
        mode: "gauge+number",
        value: percentuali[5],
        title: { text: "Sadness", font: { size: 18 } },
        gauge: {
          axis: { range: [0, 100], tickwidth: 1, tickcolor: "black" },
          bar: { color: "white" },
          bgcolor: "blue",
          borderwidth: 2,
          bordercolor: "fuchsia",
        }
      }
    ];

    var layout = {
      width: 100,
      height: 140,
      margin: {
        l: 5,
        r: 5,
        b: 0,
        t: 0,
      },
      paper_bgcolor: "transparent",
      font: { color: "white", family: "Arial" },
      tracetoggle: false
    };

    Plotly.newPlot('myDiv5', data, layout, { displayModeBar: false });

    var data = [
      {
        type: "indicator",
        mode: "gauge+number",
        value: percentuali[6],
        title: { text: "Disgust", font: { size: 18 } },
        gauge: {
          axis: { range: [0, 100], tickwidth: 1, tickcolor: "black" },
          bar: { color: "white" },
          bgcolor: "blue",
          borderwidth: 2,
          bordercolor: "fuchsia",
        }
      }
    ];

    var layout = {
      width: 100,
      height: 140,
      margin: {
        l: 5,
        r: 5,
        b: 0,
        t: 0,
      },
      paper_bgcolor: "transparent",
      font: { color: "white", family: "Arial" },
      tracetoggle: false
    };

    Plotly.newPlot('myDiv6', data, layout, { displayModeBar: false });

    var data = [
      {
        type: "indicator",
        mode: "gauge+number",
        value: percentuali[7],
        title: { text: "Fear", font: { size: 18 } },
        gauge: {
          axis: { range: [0, 100], tickwidth: 1, tickcolor: "black" },
          bar: { color: "white" },
          bgcolor: "blue",
          borderwidth: 2,
          bordercolor: "fuchsia",
        }
      }
    ];

    var layout = {
      width: 100,
      height: 140,
      margin: {
        l: 5,
        r: 5,
        b: 0,
        t: 0,
      },
      paper_bgcolor: "transparent",
      font: { color: "white", family: "Arial" },
      tracetoggle: false
    };

    Plotly.newPlot('myDiv7', data, layout, { displayModeBar: false });

    var data = [
      {
        type: "indicator",
        mode: "gauge+number",
        value: percentuali[8],
        title: { text: "Hanger", font: { size: 18 } },
        gauge: {
          axis: { range: [0, 100], tickwidth: 1, tickcolor: "black" },
          bar: { color: "white" },
          bgcolor: "blue",
          borderwidth: 2,
          bordercolor: "fuchsia",
        }
      }
    ];

    var layout = {
      width: 100,
      height: 140,
      margin: {
        l: 5,
        r: 5,
        b: 0,
        t: 0,
      },
      paper_bgcolor: "transparent",
      font: { color: "white", family: "Arial" },
      tracetoggle: false
    };

    Plotly.newPlot('myDiv8', data, layout, { displayModeBar: false });
    }, 3000)
	}, 37000);

    var t;
    /*function stoppa() {
      alert('Your main emotion is ' + emozioni[posizione] + ". Press on the button below to see what we recommended for you.");
      $.post("/php/recommendation.php", emozioni[posizione]);
      clearInterval(t);
      window.location.replace("/php/recommendation.php");
    }*/

    function stoppa() {
      /*
      var somma = percentuali[0] + percentuali[1] + percentuali[2] + percentuali[3] + percentuali[4] + percentuali[5] + percentuali[6] + percentuali[7] + percentuali[8];
      somma = 100 - somma;

      var scelta = Math.floor(Math.random() * 9); // sceglie un numero tra 0 e 8
      percentuali[scelta] = percentuali[scelta] + somma;

      var massimo = Math.max(...percentuali);
      var posizione = 0;

      for (var i = 0; i < percentuali.length; i++) {
        if (percentuali[i] == massimo) {
          posizione = i;
          break;
        }
      }

      emozione_dominante=emozioni[posizione];*/

      //alert('Your main emotion is ' + emozione_dominante + ". Press on the button below to see what we recommended for you.")
      /*$.post("recommendation.php", emozione_dominante);*/
      clearInterval(t);
      window.location.replace("recommendation.php?emozione_dominante="+emozione_dominante);
    }

    function starta() {
      t = setInterval(prova, 1000);
    }

    function cancel() {
      const btn = document.getElementById('cancella');
      btn.addEventListener('click', () => {
        const box = document.getElementById('grafico');
        box.style.display = 'none';
        box.style.visibility = 'hidden';
      });
    }

    function prova() {
      var matrix = [];
      for (var i = 0; i < 5; i++) {
        matrix[i] = [];
        for (var j = 0; j < 128; j++) {
          matrix[i][j] = Math.random() * (100);
        }
      }
      //console.log(matrix[0]);

      var xValues = [];
      for (var i = 0; i < 128; i++) {
        xValues[i] = i;
      }

      new Chart("myChart0",
        {
          type: "line",
          data:
          {
            labels: xValues,
            datasets: [{ fill: false, lineTension: 0, backgroundColor: "#FE3F92", borderColor: "#FE3F92", data: matrix[0] }]
          },
          options:
          {
            legend: { display: false },
            scales: { yAxes: [{ ticks: { min: 0, max: 100 }, display: false }], xAxes: [{ display: false }], },
            animation: { duration: 0 }
          }
        });

      new Chart("myChart1",
        {
          type: "line",
          data:
          {
            labels: xValues,
            datasets: [{ fill: false, lineTension: 0, backgroundColor: "#CA2C91", borderColor: "#CA2C91", data: matrix[0] }]
          },
          options:
          {
            legend: { display: false },
            scales: { yAxes: [{ ticks: { min: 0, max: 100 }, display: false }], xAxes: [{ display: false }], },
            animation: { duration: 0 }
          }
        });

      new Chart("myChart2",
        {
          type: "line",
          data: {
            labels: xValues,
            datasets: [{ fill: false, lineTension: 0, backgroundColor: "#333398", borderColor: "#333398", data: matrix[2] }]
          },
          options:
          {
            legend: { display: false },
            scales: { yAxes: [{ ticks: { min: 0, max: 100 }, display: false }], xAxes: [{ display: false }], },
            animation: { duration: 0 }
          }
        });

      new Chart("myChart3",
        {
          type: "line",
          data: {
            labels: xValues,
            datasets: [{ fill: false, lineTension: 0, backgroundColor: "#225DCF", borderColor: "#225DCF", data: matrix[3] }]
          },
          options:
          {
            legend: { display: false },
            scales: { yAxes: [{ ticks: { min: 0, max: 100 }, display: false }], xAxes: [{ display: false }], },
            animation: { duration: 0 }
          }
        });

      new Chart("myChart4",
        {
          type: "line",
          data: {
            labels: xValues,
            datasets: [{ fill: false, lineTension: 0, backgroundColor: "#0088DE", borderColor: "#0088DE", data: matrix[1] }]
          },
          options:
          {
            legend: { display: false },
            scales: { yAxes: [{ ticks: { min: 0, max: 100 }, display: false }], xAxes: [{ display: false }], },
            animation: { duration: 0 }
          }
        });
    }

    t = setInterval(prova, 1000);


    //script per attivazione dello stop button dopo 40 secondi a partire da DOPO il display del MESSAGGIO
    window.onload = setTimeout(function () {}, 5000); // si aspetta i 5 sec del messaggio per far partire il timer del pulsante
    var button = document.getElementById("stop_button");
    document.getElementById("stop_button").disabled = true;

    setTimeout(function () {
      document.getElementById("stop_button").disabled = false;
    }, 40000); //si attiva dopo 40 secondi (40.000 ms)

  </script>
</body>
</html>
