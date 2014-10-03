<?php 
include("config.php");
$mysqli = new mysqli($sql_host,$sql_user,$sql_pass,$sql_db);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$correo=$_POST['correo'];
$mysqli->real_query('SELECT * FROM servidores_publicos WHERE correo=\'' . $correo . '\'');
$resultado = $mysqli->use_result();
while ($fila = $resultado->fetch_assoc()) {
    $correo=$fila['correo'];
    $institucion=$fila['institucion'];
    $nombre=$fila['nombre'];
    $cargo=$fila['cargo'];
    $clave_puesto=$fila['clave_puesto'];
}
echo $cargo;
?>
