<?php 
session_start();
include("config.php");
$mysqli = new mysqli($sql_host,$sql_user,$sql_pass,$sql_db);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$login=$_POST['login'];
$mysqli->real_query('SELECT * FROM usuarios WHERE usuario=\'' . $login . '\'LIMIT 1');
$resultado = $mysqli->use_result();
while ($fila = $resultado->fetch_assoc()) {
	$salt1=$fila['salt'];
	}	
	$pass = crypt(md5($_POST['pass']), '$1$'. $salt1 .'usuario'); 
 
    $result = $mysqli->query('SELECT usuario FROM usuarios WHERE usuario=\'' . $login . '\'AND password=\'' . $pass . '\'');  
     
	  if($result->num_rows== 1)
	  { 
	  $array= $result->fetch_array();
         $_SESSION['login']=$array['usuario'];
		 header('Location:viajes.php');
       }  else {
		   echo 'bien';
		   }
		   ?>