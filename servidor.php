<?php 
include("config.php");
$mysqli = new mysqli($sql_host,$sql_user,$sql_pass,$sql_db);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$correo=$_GET['correo'];
$id=$_GET['id'];
if (strlen($id)==0){
$mysqli->real_query('SELECT * FROM servidores_publicos WHERE correo=\'' . $correo . '\'');
$resultado = $mysqli->use_result();
while ($fila = $resultado->fetch_assoc()) {
    $correo=$fila['correo'];
    $institucion=$fila['institucion'];
    $nombre=$fila['nombre'];
    $cargo=$fila['cargo'];
    $clave_puesto=$fila['clave_puesto'];
    $id=$fila['id'];

}
}
elseif(strlen($correo)==0){
$mysqli->real_query('SELECT * FROM servidores_publicos WHERE id=\'' . $id . '\'');
$resultado = $mysqli->use_result();
while ($fila = $resultado->fetch_assoc()) {
    $correo=$fila['correo'];
    $institucion=$fila['institucion'];
    $nombre=$fila['nombre'];
    $cargo=$fila['cargo'];
    $clave_puesto=$fila['clave_puesto'];
    $id=$fila['id'];
}
}
else{
	?><script>window.location.href='index.php'</script><?php
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>VIAJES TRANSPARENTES</title>
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
    <link rel="stylesheet" href="src/L.Control.Sidebar.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.ie.css" /><![endif]-->
 	<script src="js/jquery-1.10.2.js"></script>

</head>
   <script type="text/javascript" language="javascript">
    function load_page(id)
{
		params={};
		params.id=id;
		$('#viajes').load('content_servidor.php',params,function(){});
}
		function suscriptor()
	
{
		    var correo=$('#correo').val();
				params={};
				params.correo=correo;
				params.correo_servidor='<?php echo $correo;?>';

				$.post("guarda.php",params,function(data){
				  	$('#menssage').html(data);
					$('#correo').val('');
										});
}
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script><body>
<header id="branding" role="banner" class="clearfix">
  <hgroup id="logo">
    <div class="ribbon">
      <h1 id="site-title"><span><img src="images/logo4.png" class="imagen"></span></h1>
    </div>
  </hgroup>
</header>

    <div id="sidebar">
<div><img src="images/logo4.png" style="width:150px; height:130;"></div>
    <div class="gen_content"><div class="gen_par"><strong>Institucion:</strong></div><div class="gen_dato"><?php echo utf8_encode($institucion);?></div></div>
    <div class="gen_content"><div class="gen_par"><strong>Nombre:</strong></div><div class="gen_dato"><?php echo utf8_encode($nombre);?></div></div>
    <div class="gen_content"><div class="gen_par"><strong>Cargo:</strong></div><div class="gen_dato"><?php echo utf8_encode($cargo);?></div></div>
 	<p style="width:100%; font-size:14px; color:#970704">Escribe aqui tu correo si deseas recibir noticas de este servidor publico</p>
    <p><input type="text" size="50" id="correo" class="input_text"><br><input type="submit" onClick="suscriptor()" value="Suscribirse" style="width:150px; height:50px; text-align:center; font-size:14px; color:#e8f2fd; background:#143d69"></p>
    <span id="menssage" style="color:#970704; font-size:12px;"></span>
    <p><a href="mapa.php" target="_parent" style="width:100%; height:50px; font-size:14px; text-decoration:none; color:#970704;">volver a el mapa principal</a></p>
<div class="fb-share-button" data-href="http://joae.com.mx/clientes/concurso/servidor.php?id=<?php echo $id; ?>&correo="></div>
    <hr>
    <div id="viajes">
    </div>
    </div>
    <div id="map"></div>

    <script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
    <script src="src/L.Control.Sidebar.js"></script>

    <script>
        var map = L.map('map');
        map.setView([16.47, -54.14], 3);

        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: 'Map data &copy; IFAI, Powered by <a href="http://joae.com.mx" target="_blank" target>JOAE</a>'
        }).addTo(map);

        var sidebar = L.control.sidebar('sidebar', {
            closeButton: true,
            position: 'left'
        });
        map.addControl(sidebar);

        setTimeout(function () {
            sidebar.show();
        }, 500);
		
		var LeafIcon = L.Icon.extend({
			options: {
				iconSize:     [30, 48],
				iconAnchor:   [12 , 39]
			}
		});

		<?php
		$mysqli->real_query('SELECT * FROM viajes WHERE correo=\'' . $correo . '\'');
		$resultado = $mysqli->use_result();
		while ($fila = $resultado->fetch_assoc()) {
		?>
		var marcadorIcon<?php echo $fila['id'];?> = new LeafIcon({iconUrl: 'images/marker13.png'})
			L.marker([<?php echo $fila['latlong'];?>], {icon: marcadorIcon<?php echo $fila['id'];?>}).addTo(map).on('click', function () {
			var id=<?php echo $fila['id'];?>;
			sidebar.show();
			load_page(id);
        });
		<?php }?>

        map.on('click', function () {
            sidebar.hide();
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
