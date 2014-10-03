<?php
session_start();
if(!isset($_SESSION["login"])){
header("location:index.html");
} else {
include("config.php");
$mysqli = @new mysqli($sql_host,$sql_user,$sql_pass,$sql_db);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>CAPTURA DE VIAJES</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
        <link rel="stylesheet" href="src/L.Control.Sidebar.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="libs/leaflet.ie.css" /><![endif]-->
		<link rel="stylesheet" href="lib/Control.SimpleMarkers.css" />
    	<link rel="stylesheet" href="css/style.css" />
    	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

 		<script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
    	<script src="lib/Control.SimpleMarkers.js"></script>
    	<script src="src/L.Control.Sidebar.js"></script>
		<script src="js/jquery-1.10.2.js"></script>
    
<script>

function servidor_pub()
	
{
		    var correo=$('#nombre').val();
				params={};
				params.correo=correo;
				$.post("select.php",params,function(data){
				  	$('#cargo').val(data);
										});
}
		function suscriptor()
	
{
		    var latlong=$('#latlong').val();
			var inst_genera=$('#inst_genera').val();
			var ur=$('#ur').val();
			var tipo_rep=$('#tipo_rep').val();
			var consecutivo=$('#consecutivo').val();
			var nombre=$('#nombre').val();
			var cargo=$('#cargo').val();
			var acuerdo=$('#acuerdo').val();
			var pais_origen=$('#pais_origen').val();
			var estado_origen=$('#estado_origen').val();
			var ciudad_origen=$('#ciudad_origen').val();
			var pais_destino=$('#pais_destino').val();
			var estado_destino=$('#estado_destino').val();
			var ciudad_destino=$('#ciudad_destino').val();			
			var tarifa_diaria=$('#tarifa_diaria').val();
			var moneda=$('#moneda').val();
			var tema=$('#tema').val();
			var tipo_com=$('#tipo_com').val();
			var evento=$('#evento').val();
			var url_evento=$('#url_evento').val();
			var fechainicio_part=$('#fechainicio_part').val();
			var fechafin_part=$('#fechafin_part').val();
			var motivo=$('#motivo').val();
			var antecedente=$('#antecedente').val();
			var cubre_pasaje=$('#cubre_pasaje').val();
			var tipo_pasaje=$('#tipo_pasaje').val();
			var linea_origen=$('#linea_origen').val();
			var vuelo_origen=$('#vuelo_origen').val();
			var linea_regreso=$('#linea_origen').val();
			var vuelo_regreso=$('#vuelo_regreso').val();
			var fechainicio_com=$('#fechainicio_com').val();
			var fechafin_com=$('#fechafin_com').val();
			var gasto_pasaje=$('#gasto_pasaje').val();
			var gasto_viatico=$('#gasto_viatico').val();
			var inst_hospedaje=$('#inst_hospedaje').val();
			var hotel=$('#hotel').val();
			var fechainicio_hotel=$('#fechainicio_hotel').val();
			var fechafin_hotel=$('#fechafin_hotel').val();
			var costo_hotel=$('#costo_hotel').val();
			var comprobado=$('#comprobado').val();
			var sin_comprobar=$('#sin_comprobar').val();
			var viatico_devuelto=$('#viatico_devuelto').val();
			var observaciones=$('#observaciones').val();



		

				params={};
				params.latlong=latlong;
				params.inst_genera=inst_genera;
				params.ur=ur;
				params.tipo_rep=tipo_rep;
			    params.consecutivo=consecutivo;
			    params.nombre=nombre;
			    params.cargo=cargo;
			    params.acuerdo=acuerdo;
			    params.pais_origen=pais_origen;
			    params.estado_origen=estado_origen;
			    params.ciudad_origen=ciudad_origen;
				params.pais_destino=pais_destino;
			    params.estado_destino=estado_destino;
			    params.ciudad_destino=ciudad_destino;			
			    params.tarifa_diaria=tarifa_diaria;
			    params.moneda=moneda;
			    params.tema=tema;
				params.tipo_com=tipo_com;
			    params.evento=evento;
			    params.url_evento=url_evento;
			    params.fechainicio_part=fechainicio_part;
			    params.fechafin_part=fechafin_part;
			    params.motivo=motivo;
			    params.antecedente=antecedente;
			    params.cubre_pasaje=cubre_pasaje;
			    params.tipo_pasaje=tipo_pasaje;
		        params.linea_origen=linea_origen;
				params.vuelo_origen=vuelo_origen;
			    params.linea_regreso=linea_origen;
			    params.vuelo_regreso=vuelo_regreso;
			    params.fechainicio_com=fechainicio_com;
				params.fechafin_com=fechafin_com;
			    params.gasto_pasaje=gasto_pasaje;
			    params.gasto_viatico=gasto_viatico;
			    params.inst_hospedaje=inst_hospedaje;
			    params.hotel=hotel;
			    params.fechainicio_hotel=fechainicio_hotel;
			    params.fechafin_hotel=fechafin_hotel;
				params.costo_hotel=costo_hotel;
				params.comprobado=comprobado;
			    params.sin_comprobar=sin_comprobar;
			    params.viatico_devuelto=viatico_devuelto;
			    params.observaciones=observaciones;
				
			    

				
								
					$.post("guarda_viajes.php",params,function(data){
				  	$('#message').html(data);
					window.location.href='viajes.php';
										});
}


</script>
</head>
<body>
<header id="branding" role="banner" class="clearfix">
  <hgroup id="logo">
    <div class="ribbon">
      <h1 id="site-title"><span><img src="images/logo4.png" class="imagen"></span></h1>
    </div>
  </hgroup>
</header>

    <div id="sidebar">
<div><img src="images/logo4.png" style="width:150px; height:130;"></div>
<div style="width:100%; font-size:14px; color:#e8f2fd; padding:10px 0px 10px 0px; text-align:center; background:#143d69">Agrega un marcador y llena la informacion que se pide</div>
<br>
<span id="message"></span>
<input type="text" id="latlong" class="input_text">
<div class="insert_text">Quien invita:</div><div><textarea class="text_tarea" id="inst_genera"></textarea></div>
<div class="insert_text">Unidad Resposable:</div><div><textarea class="text_tarea" id="ur"></textarea></div>
<div class="insert_text">Tipo de representacion:</div>
<div><select class="input_text" id="tipo_rep">
<option value="Tecnico">Tecnico</option>
<option value="Alto nivel">Alto nivel</option>
</select></div>
<div class="insert_text">Numero de comision:</div><div><input type="text" id="consecutivo" class="input_text"></div>
<div class="insert_text">Servidor publico comisionado:</div>
<div>
<select id="nombre" class="input_text" onChange="servidor_pub()">
<option value="0">Elija una opcion</option>
<?php $mysqli->real_query('SELECT * FROM servidores_publicos');
		$resultado = $mysqli->use_result();
		while ($fila = $resultado->fetch_assoc()) {
        echo "<option value='".$fila['correo']."'>".$fila['nombre']."</option>"; 
    }
 ?>
</select></div>
<div class="insert_text">Cargo:</div><div><input type="text" id="cargo" class="input_text"></div>
<div class="insert_text">No. de acuerdo de autorizacion del pleno / de coordinadores:</div><div><input type="text" id="acuerdo" class="input_text"></div>
<div class="insert_text">Pais origen:</div><div><input type="text" id="pais_origen" class="input_text"></div>
<div class="insert_text">Estado origen:</div><div><input type="text" id="estado_origen" class="input_text"></div>
<div class="insert_text">Ciudad origen:</div><div><input type="text" id="ciudad_origen" class="input_text"></div>
<div class="insert_text">Pais destino:</div><div><input type="text" id="pais_destino" class="input_text"></div>
<div class="insert_text">Estado destino:</div><div><input type="text" id="estado_destino" class="input_text"></div>
<div class="insert_text">Ciudad destino:</div><div><input type="text" id="ciudad_destino" class="input_text"></div>
<div class="insert_text">Tarifa diaria de viaticos por dia:</div><div><input type="text" id="tarifa_diaria" class="input_text"></div>
<div class="insert_text">Tipo de moneda:</div>
<div><select class="input_text" id="moneda">
<option value="MXP">MXP</option>
<option value="USD">USD</option>
</select></div>

<div class="insert_text">Tema:</div><div><input type="text" id="tema" class="input_text"></div>
<div class="insert_text">tipo de comision:</div><div><input type="text" id="tipo_com" class="input_text"></div>
<div class="insert_text">Evento:</div><div><input type="text" id="evento" class="input_text"></div>
<div class="insert_text">URL del evento:</div><div><input type="text" id="url_evento" class="input_text"></div>
<div class="insert_text">Fecha inicio Participacion:</div><div><input type="text" id="fechainicio_part" class="input_text"></div>
<div class="insert_text">Fecha fin Participacion:</div><div><input type="text" id="fechafin_part" class="input_text"></div>
<div class="insert_text">Motivo:</div><div><textarea class="text_tarea" id="motivo"></textarea></div>
<div class="insert_text">Antecedente:</div><div><textarea class="text_tarea" id="antecedente"></textarea></div>
<div class="insert_text">Institucion que cubre pasaje:</div><div><input type="text" id="cubre_pasaje" class="input_text"></div>
<div class="insert_text">Tipo de pasaje:</div>
<div><select class="input_text" id="tipo_pasaje">
<option value="Terrestr">Terrestre</option>
<option value="Aereo">Aereo</option>
<option value="Maritimo">Maritimo</option>
</select></div>
<div class="insert_text">Linea de Origen:</div><div><input type="text" id="linea_origen" class="input_text"></div>
<div class="insert_text">No vuelo de Origen:</div><div><input type="text" id="vuelo_origen" class="input_text"></div>
<div class="insert_text">Linea de Regreso:</div><div><input type="text" id="linea_regreso" class="input_text"></div>
<div class="insert_text">No de vuelo regreso:</div><div><input type="text" id="vuelo_regreso" class="input_text"></div>
<div class="insert_text">Fecha inicio de comision:</div><div><input type="text" id="fechainicio_com" class="input_text"></div>
<div class="insert_text">Fecha fin de comision:</div><div><input type="text" id="fechafin_com" class="input_text"></div>
<div class="insert_text">Gasto por concepto de pasajes M.N.:</div><div><input type="text" id="gasto_pasaje" class="input_text"></div>
<div class="insert_text">Gasto por concepto de viaticos:</div><div><input type="text" id="gasto_viatico" class="input_text"></div>
<div class="insert_text">Institucion que cubre le hospedaje:</div><div><input type="text" id="inst_hospedaje" class="input_text"></div>
<div class="insert_text">Nombre del hotel:</div><div><input type="text" id="hotel" class="input_text"></div>
<div class="insert_text">Fecha de entrada :</div><div><input type="text" id="fechainicio_hotel" class="input_text"></div>
<div class="insert_text">Fecha de salida:</div><div><input type="text" id="fechafin_hotel" class="input_text"></div>
<div class="insert_text">Costo hotel:</div><div><input type="text" id="costo_hotel" class="input_text"></div>
<div class="insert_text">Monto comprobado de viaticos:</div><div><input type="text" id="comprobado" class="input_text"></div>
<div class="insert_text">Monto sin comprobacion:</div><div><input type="text" id="sin_comprobar" class="input_text"></div>
<div class="insert_text">Monto de viaticos devueltos:</div><div><input type="text" id="viatico_devuelto" class="input_text"></div>
<div class="insert_text">Observaciones:</div><div><textarea class="text_tarea" id="observaciones"></textarea></div>
<p><input type="submit" onClick="suscriptor()" value="Guardar" style="width:150px; height:50px; text-align:center; font-size:14px; color:#e8f2fd; background:#143d69"></p>
<p><a href="logout.php">CERRA SESSION</a></p>
<br>
</div>
	<div id="map"></div>
	
	<script type="text/JavaScript">
    
        // Create the map
        var map = L.map('map');
        map.setView([16.47, -54.14], 3);

        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: 'Map data &copy; IFAI, Powered by <a href="http://joae.com.mx" target="_blank" target>JOAE</a>'
        }).addTo(map);
        
		// Create the marker controls
        var marker_controls = new L.Control.SimpleMarkers();
        map.addControl(marker_controls);
        
		        var sidebar = L.control.sidebar('sidebar', {
            closeButton: true,
            position: 'left'
        });
        map.addControl(sidebar);

        setTimeout(function () {
            sidebar.show();
        }, 500);

        map.on('click', function () {
            sidebar.show();
        })

        sidebar.on('show', function () {
            console.log('Sidebar will be visible.');
        });

        sidebar.on('shown', function () {
            console.log('Sidebar is visible.');
        });

        sidebar.on('hide', function () {
            console.log('Sidebar will be hidden.');
        });

        sidebar.on('hidden', function () {
            console.log('Sidebar is hidden.');
        });

        L.DomEvent.on(sidebar.getCloseButton(), 'click', function () {
            console.log('Close button clicked.');
        });

		
		
	</script>
</body>
</html>
<?php } ?>