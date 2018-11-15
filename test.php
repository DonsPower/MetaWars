<?php
  	session_start();
  	require 'src/database.php';
  	if (isset($_SESSION['user_id']))
  	{
    	$records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    	$records->bindParam(':id', $_SESSION['user_id']);
    	$records->execute();
    	$results = $records->fetch(PDO::FETCH_ASSOC);
    	$user = null;
    	if (count($results) > 0)
    	{
      		$user = $results;
    	}
  	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title>MetaWars | Test</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/test.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header>
      <div class="contenedor">
        <div id="marca">
          <h1><span class="resaltado">Bienvenido</span><br><?= $user['email']; ?></h1>
        </div>
        <nav>
          <ul>
            <li>Te has conectado correctamente.</li>
            <li><a href="logout.php">Cerrar sesion	</a></li>

          </ul>
        </nav>
      </div>
    </header>

    <section id="cabecera">
      <div class="contenedor"></div>
    </section>

    <section id="boletin">
      <div class="contenedor">

      </div>
    </section>


      <div class="grid">
        <div id="quiz">
            <h1>Test</h1>
            <hr style="margin-top: 20px">

            <p  id="question"> </p>
            <div class="buttons">
            <button id="btn0"><span id="choice0"> </span></button>
            <button id="btn1"><span id="choice1"> </span></button>
            <button id="btn2"><span id="choice2"> </span></button>
            </div>
            <hr style="margin-top: 50px ">
        </div>
            <p  id="progress">Pregunta x de y.</p>
      </div>
      <script src="js/quiz_controller.js"></script>
      <script src="js/question.js"></script>
      <script src="js/app.js"></script>


    <footer>
      <p>Dons. Inc, Copyright &copy; 2018</p>
    </footer>
  </body>
</html>
