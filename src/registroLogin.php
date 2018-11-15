<?php
  	session_start();
  	require 'database.php';
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

<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/boton.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    <title>Login o registro | MetaWars</title>
  </head>
  <body>
       		<?php if(!empty($user)): ?>
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

              <div class="imagenSupUser">

                <div class="divderUser">
                  <form class="" action="../test.php" method="post">
                    <button   type="submit" class="id" >
                      <div class="cuadrito2">
                      <p>Iniciar Test</p>
                      </div>
                      <br>
                      <img src="../img/menu/test.png" alt="
                       texto alternativo" width="180" height="180">
                    </button>
                  </form>
                </div>
                <div class="divmidUser">
                  <form class="" action="jugar/escojermazo.php" method="post">
                    <button   type="submit" class="id" >
                      <div class="cuadrito2">
                      <p>Jugar</p>
                      </div>
                      <br>
                      <img src="../img/menu/jugar.png" alt="
                       texto alternativo" width="180" height="180">
                    </button>
                  </form>
                </div>
                <div class="divizqUser">
                  <form class="" action="../test.php" method="post">
                    <button   type="submit" class="id" >
                      <div class="cuadrito2">
                      <p>Test Final</p>
                      </div>
                      <br>
                      <img src="../img/menu/tienda.png" alt="
                       texto alternativo" width="180" height="180">
                    </button>
                  </form>
                </div>
              </div>

              <footer>
                  <p>DonsInc, Copyright &copy; 2018</p>
              </footer>
        <?php else: ?>
    <header>
      <div class="contenedor">
        <div id="marca">
          <h1><span class="resaltado">MetaWars</span> Rutas Metabolicas</h1>
        </div>
      </div>
    </header>
    <section id="boletin">
      <div class="contenedor"></div>
    </section>
      <div class="divSupLogin">
        <div class="divizqlogin">
          <div class="centrado">
              <a class="boton_personalizado"  href="signup.php">Registro</a>
          </div>
        </div>
        <div class="divmidlogin"></div>
        <div class="divderlogin">
          <div class="centradoder">
              <a class="boton_personalizado" href="login.php">Iniciarsesion</a>
          </div>
        </div>
      </div>

      <footer>
        <p>DonsInc, Copyright &copy; 2018</p>
      </footer>
      <?php endif; ?>
  </body>
</html>
