<?php

$username=$_POST['email1'];

mysqli_connect("localhost", "root", "", "meta_wars");

$query="SELECT * FROM profesor where acceso= '".$username."'";
$q=mysql_query($query);
  if($username==1234){

    echo "Usuario valido";
  }else{
    echo "<script>
             alert('Codigo Invalido');
             window.location= '../profesor.php'
             </script>";
  }


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>holaaaaaaaaaaa</h1>
  </body>
</html>
