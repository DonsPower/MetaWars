<?php
  	session_start();
  	require '../database.php';
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
<html  >
  <head>
    <meta charset="utf-8">
    <title>prueba</title>
    <link rel="stylesheet" href="../../css/estilos.css">
    <link rel="stylesheet" href="../../css/boton.css">
    <link rel="stylesheet" href="../../css/manual.css">

    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/escogerMazo.js" charset="utf-8"></script>
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
          <li><a href="../logout.php">Cerrar sesion	</a></li>

        </ul>
      </nav>
    </div>
  </header>
  <section id="boletin">
    <div class="contenedor">
    <span class="colortext">--Escoge la ruta metabolica(gen)--</span>
    </div>
  </section>
<div class="divJuegoEscogeGenSup">
  <div class="Divjuego1">
    <input type="radio" name="nombre" value="CDK1" class="formulario" >
    <img src="../../img/imgGen/CDK1.jpg" alt="
     texto alternativo" width="130" height="180">
  </div>
  <div class="Divjuego2">
    <input type="radio" name="nombre" value="DDT" class="formulario" >
    <img src="../../img/imgGen/DDT.jpg" alt="
     texto alternativo" width="130" height="180">
  </div>
  <div class="Divjuego3">
    <input type="radio" name="nombre" value="GLU" class="formulario" >
    <img src="../../img/imgGen/GLU.jpeg" alt="
     texto alternativo" width="130" height="180" >
  </div>
  <div class="Divjuego4">
    <input type="radio" name="nombre" value="MET" class="formulario" >
    <img src="../../img/imgGen/MET.jpg" alt="
     texto alternativo" width="130" height="180">
  </div>
  <div class="Divjuego4">
    <input type="radio" name="nombre" value="TOL" class="formulario" >
    <img src="../../img/imgGen/TOL.jpeg" alt="
     texto alternativo" width="128" height="177">
  </div>
  <div class="botoncentrao">
    <input type="button"value="obener" class="id" onclick="capturar()" >
  </div>

</div>


  <footer>
    <p>DonsInc, Copyright &copy; 2018</p>
  </footer>
</body>
</html>
