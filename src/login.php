<?php
  	session_start();
  	if (isset($_SESSION['user_id']))
  	{
    	header('Location: /MetaWars/src/registroLogin.php');
  	}
  	require 'database.php';
  	if (!empty($_POST['email']) && !empty($_POST['password']))
  	{
    	$records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    	$records->bindParam(':email', $_POST['email']);
    	$records->execute();
    	$results = $records->fetch(PDO::FETCH_ASSOC);
    	$message = '';
    	if (count($results) > 0 && password_verify($_POST['password'], $results['password']))
    	{
     		$_SESSION['user_id'] = $results['id'];
      		header("Location: /MetaWars/src/registroLogin.php");
    	}
    	else
    	{
      		$message = 'Contraseña o usuario incorrectos';
          echo "<script>
                   alert('Contraseña o usuario incorrecto');
                   window.location= '/MetaWars/src/login.php'
                   </script>";
    	}
  	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
		<h1>Ingresar</h1>
		<span>o <a href="signup.php">Registrar</a></span>
		<form action="login.php" method="post">
			<input type="text" name="email" placeholder="Ingresa tu email">
			<input type="password" name="password" placeholder="Ingresa tu contraseña">
			<input type="submit" value="Ingresar">
		</form>
	</body>
</html>
