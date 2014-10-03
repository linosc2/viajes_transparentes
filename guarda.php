<?php
$correo=$_POST['correo'];  
$correo_servidor = $_POST['correo_servidor'];
include("config.php");
$mysqli = new mysqli($sql_host,$sql_user,$sql_pass,$sql_db);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$result = $mysqli->query('SELECT * FROM noticias WHERE correo=\'' . $correo . '\' AND `correo_servidor`=\'' . $correo_servidor . '\'');
if(preg_match('/^([a-zA-Z0-9_\\.\\-])+\\@(([a-zA-Z0-9\\-])+\\.)+([a-zA-Z0-9]{2,4})+$/', $correo)) {
	if($result->num_rows == 0) {
$news = 'INSERT INTO noticias (correo, correo_servidor)VALUES(\''.$correo.'\',\''.$correo_servidor.'\')';  
$mysqli->query($news);
echo 'Ahora recibiras noticias de este servidor publico';
}
else{
echo 'Ya estas siguiendo a este servidor publico';
	}
}
else
{
echo 'correo invalido';	
}