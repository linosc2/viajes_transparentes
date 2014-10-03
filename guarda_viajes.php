<?php
$latlong=$_POST['latlong'];
$inst_genera=$_POST['inst_genera'];
$ur=$_POST['ur'];
$tipo_rep=$_POST['tipo_rep'];
$consecutivo=$_POST['consecutivo'];
$correo=$_POST['nombre'];
$cargo=$_POST['cargo'];
$acuerdo=$_POST['acuerdo'];
$pais_origen=$_POST['pais_origen'];
$estado_origen=$_POST['estado_origen'];
$ciudad_origen=$_POST['ciudad_origen'];
$pais_destino=$_POST['pais_destino'];
$estado_destino=$_POST['estado_destino'];
$ciudad_destino=$_POST['ciudad_destino'];			
$tarifa_diaria=$_POST['tarifa_diaria'];
$moneda=$_POST['moneda'];
$tema=$_POST['tema'];
$tipo_com=$_POST['tipo_com'];
$evento=$_POST['evento'];
$url_evento=$_POST['url_evento'];
$fechainicio_part=$_POST['fechainicio_part'];
$fechafin_part=$_POST['fechafin_part'];
$motivo=$_POST['motivo'];
$antecedente=$_POST['antecedente'];
$cubre_pasaje=$_POST['cubre_pasaje'];
$tipo_pasaje=$_POST['tipo_pasaje'];
$linea_origen=$_POST['linea_origen'];
$vuelo_origen=$_POST['vuelo_origen'];
$linea_regreso=$_POST['linea_origen'];
$vuelo_regreso=$_POST['vuelo_regreso'];
$fechainicio_com=$_POST['fechainicio_com'];
$fechafin_com=$_POST['fechafin_com'];
$gasto_pasaje=$_POST['gasto_pasaje'];
$gasto_viatico=$_POST['gasto_viatico'];
$inst_hospedaje=$_POST['inst_hospedaje'];
$hotel=$_POST['hotel'];
$fechainicio_hotel=$_POST['fechainicio_hotel'];
$fechafin_hotel=$_POST['fechafin_hotel'];
$costo_hotel=$_POST['costo_hotel'];
$comprobado=$_POST['comprobado'];
$sin_comprobar=$_POST['sin_comprobar'];
$viatico_devuelto=$_POST['viatico_devuelto'];
$observaciones=$_POST['observaciones'];
$latlong1 = preg_replace('#\((.+?)\)#i', '$1', $latlong, 1);
$vowels = array('L', 'a', 't', 'L', 'n', 'g');
$newlatlong = str_replace($vowels, "", $latlong1);

include("config.php");
$mysqli = new mysqli($sql_host,$sql_user,$sql_pass,$sql_db);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$mysqli->real_query('SELECT * FROM servidores_publicos WHERE correo=\'' . $correo . '\'');
$resultado = $mysqli->use_result();
while ($fila = $resultado->fetch_assoc()) {
    $nombre=$fila['nombre'];
}


$news = 'INSERT INTO viajes (inst_genera, ur, tipo_rep, consecutivo, nombre, cargo, acuerdo, pais_origen, estado_origen, ciudad_origen, pais_destino, estado_destino, ciudad_destino, tarifa_diaria, moneda, tema, tipo_com, evento, url_evento, fechainicio_part, fechafin_part, motivo, antecedente, cubre_pasaje, tipo_pasaje, linea_origen, vuelo_origen, linea_regreso, vuelo_regreso, fechainicio_com, fechafin_com, gasto_pasaje, gasto_viatico, inst_hospedaje, hotel, fechainicio_hotel, fechafin_hotel, costo_hotel, comprobado, sin_comprobar, viatico_devuelto, observaciones, latlong, correo)VALUES(\''.$inst_genera.'\',\''.$ur.'\',\''.$tipo_rep.'\',\''.$consecutivo.'\',\''.$nombre.'\',\''.$cargo.'\',\''.$acuerdo.'\',\''.$pais_origen.'\',\''.$estado_origen.'\',\''.$ciudad_origen.'\',\''.$pais_destino.'\',\''.$estado_destino.'\',\''.$ciudad_destino.'\',\''.$tarifa_diaria.'\',\''.$moneda.'\',\''.$tema.'\',\''.$tipo_com.'\',\''.$evento.'\',\''.$url_evento.'\',\''.$fechainicio_part.'\',\''.$fechafin_part.'\',\''.$motivo.'\',\''.$antecedente.'\',\''.$cubre_pasaje.'\',\''.$tipo_pasaje.'\',\''.$linea_origen.'\',\''.$vuelo_origen.'\',\''.$linea_regreso.'\',\''.$vuelo_regreso.'\',\''.$fechainicio_com.'\',\''.$fechafin_com.'\',\''.$gasto_pasaje.'\',\''.$gasto_viatico.'\',\''.$inst_hospedaje.'\',\''.$hotel.'\',\''.$fechainicio_hotel.'\',\''.$fechafin_hotel.'\',\''.$costo_hotel.'\',\''.$comprobado.'\',\''.$sin_comprobar.'\',\''.$viatico_devuelto.'\',\''.$observaciones.'\',\''.$newlatlong.'\',\''.$correo.'\')';  
$mysqli->query($news);
echo 'se guardo exitosamente';
?>