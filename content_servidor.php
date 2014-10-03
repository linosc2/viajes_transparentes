<?php 
include("config.php");
$mysqli = new mysqli($sql_host,$sql_user,$sql_pass,$sql_db);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$id=$_POST['id'];
$mysqli->real_query('SELECT * FROM viajes WHERE id=\'' . $id . '\'');
$resultado = $mysqli->use_result();
while ($fila = $resultado->fetch_assoc()) {
    $mec_origen=$fila['mec_origen'];
    $inst_genera=$fila['inst_genera'];
    $ur=$fila['ur'];
    $tipo_rep=$fila['tipo_rep'];
    $consecutivo=$fila['consecutivo'];
    $nombre=$fila['nombre'];
    $cargo=$fila['cargo'];
    $acuerdo=$fila['acuerdo'];
    $oficio=$fila['oficio'];
    $pais_origen=$fila['pais_origen'];
    $estado_origen=$fila['estado_origen'];
    $ciudad_origen=$fila['ciudad_origen'];
    $pais_destino=$fila['pais_destino'];
    $estado_destino=$fila['estado_destino'];
    $ciudad_destino=$fila['ciudad_destino'];
    $tarifa_diaria=$fila['tarifa_diaria'];
    $moneda=$fila['moneda'];
    $tema=$fila['tema'];
	$tipo_com=$fila['tipo_com'];
    $evento=$fila['evento'];
    $url_evento=$fila['url_evento'];
    $fechoinicio_part=$fila['fechainicio_part'];
    $fechafin_part=$fila['fechafin_part'];
    $motivo=$fila['motivo'];
    $antecedente=$fila['antecedente'];
    $url_comunicado=$fila['url_comunicado'];
    $cubre_pasaje=$fila['cubre_pasaje'];
    $tipo_pasaje=$fila['tipo_pasaje'];
    $linea_origen=$fila['linea_origen'];
    $vuelo_origen=$fila['vuelo_origen'];
    $linea_regreso=$fila['linea_regreso'];
    $vuelo_regreso=$fila['vuelo_regreso'];
    $fechainicio_com=$fila['fechainicio_com'];
    $fechafin_com=$fila['fechafin_com'];
    $gasto_pasaje=$fila['gasto_pasaje'];
    $gasto_viatico=$fila['gasto_viatico'];
    $inst_hospedaje=$fila['inst_hospedaje'];
    $hotel=$fila['hotel'];
    $fechainicio_hotel=$fila['fechainicio_hotel'];
    $fechafin_hotel=$fila['fechafin_hotel'];
    $costo_hotel=$fila['costo_hotel'];
    $comprobado=$fila['comprobado'];
    $sin_comprobar=$fila['sin_comprobar'];
    $viatico_devuelto=$fila['viatico_devuelto'];
    $observaciones=$fila['observaciones'];
    $correo=$fila['correo'];
}

?>
<div class="gen_content"><div class="gen_par">Quien invita:</div><div class="gen_dato"><?php echo utf8_encode($inst_genera);?></div></div>
<div class="gen_content"><div class="gen_par">Unidad Resposable:</div><div class="gen_dato"> <?php echo utf8_encode($ur);?></div></div>
<div class="gen_content"><div class="gen_par">Tipo de representación:</div><div class="gen_dato"><?php echo utf8_encode($tipo_rep);?></div></div>
<div class="gen_content"><div class="gen_par">Numero de comisión:</div><div class="gen_dato"><?php echo  $consecutivo;?></div></div>
<div class="gen_content"><div class="gen_par">No. de acuerdo de autorización del pleno / de coordinadores:</div><div class="gen_dato"><?php echo $acuerdo;?></div></div>
<div class="gen_content"><div class="gen_par">Origen:</div><div class="gen_dato"><?php echo utf8_encode($pais_origen);?>, <?php echo utf8_encode($estado_origen);?>, <?php echo utf8_encode($ciudad_origen);?></div></div>
<div class="gen_content"><div class="gen_par">Destino:</div><div class="gen_dato"><?php echo utf8_encode($pais_destino);?>, <?php echo utf8_encode($estado_destino);?>, <?php echo utf8_encode($ciudad_destino);?></div></div>
<div class="gen_content"><div class="gen_par">Tarifa diaria de viáticos por dia: </div><div class="gen_dato">$<?php echo utf8_encode($tarifa_diaria);?> <?php echo $moneda;?></div></div>
<div class="gen_content"><div class="gen_par">Tema / tipo de comision:</div><div class="gen_dato"><?php echo utf8_encode($tema);?>, <?php echo utf8_encode($tipo_com);?></div></div>
<div class="gen_content"><div class="gen_par">Evento / URL:</div><div class="gen_dato"><?php echo utf8_encode($evento);?> / <?php echo $url_evento;?></div></div>
<div class="gen_content"><div class="gen_par">Inicio / Fin Participacion:</div><div class="gen_dato">de <?php echo $fechoinicio_part;?> a <?php  echo $fechafin_part;?></div></div>
<div class="gen_content"><div class="gen_par">Motivo:</div><div class="gen_dato"><?php echo utf8_encode($motivo);?></div></div>
<div class="gen_content"><div class="gen_par">Antecedente:</div><div class="gen_dato"><?php echo utf8_encode($antecedente);?></div></div>
<div class="gen_content"><div class="gen_par">Institución que cubre pasaje:</div><div class="gen_dato"><?php echo utf8_encode($cubre_pasaje);?></div></div>
<div class="gen_content"><div class="gen_par">Tipo de pasaje / Linea de origen: </div><div class="gen_dato"><?php echo utf8_encode($tipo_pasaje);?> / <?php echo utf8_encode($linea_origen);?> Vuelo No. <?php echo $vuelo_origen;?></div></div>
<div class="gen_content"><div class="gen_par">Linea de regreso:</div><div class="gen_dato"><?php echo utf8_encode($linea_regreso);?> Vuelo No. <?php echo $vuelo_regreso;?></div></div>
<div class="gen_content"><div class="gen_par">Inicio / fin de la comisión:</div><div class="gen_dato"> de <?php echo $fechainicio_com;?> a <?php echo $fechafin_com;?></div></div>
<div class="gen_content"><div class="gen_par">Gasto por concepto de pasajes en M.N.:</div><div class="gen_dato">$<?php echo $gasto_pasaje;?></div></div>
<div class="gen_content"><div class="gen_par">Gasto por concepto de viáticos en M.N.:</div><div class="gen_dato">$<?php echo $gasto_viatico;?></div></div>
<div class="gen_content"><div class="gen_par">Institución que cubre hospedaje:</div><div class="gen_dato"><?php echo utf8_encode($inst_hospedaje);?></div></div>
<div class="gen_content"><div class="gen_par">Hotel, entrada / salida, costo;</div><div class="gen_dato"><?php echo utf8_encode($hotel);?>, Entrada <?php echo $fechainicio_hotel;?> Salida <?php echo $fechafin_hotel;?>, Costo <?php echo $costo_hotel;?></div></div>
<div class="gen_content"><div class="gen_par">Monto comprobado de viáticos:</div><div class="gen_dato">$<?php echo $comprobado;?></div></div>
<div class="gen_content"><div class="gen_par">Monto sin comprobación:</div><div class="gen_dato">$<?php echo $sin_comprobar;?></div></div>
<div class="gen_content"><div class="gen_par">Monto de viáticos devueltos:</div><div class="gen_dato">$<?php echo $viatico_devuelto;?></div></div>
<div class="gen_content"><div class="gen_par">Observaciones: </div><div class="gen_dato"><?php echo utf8_encode($observaciones);?></div></div>
<hr class="line"> 



