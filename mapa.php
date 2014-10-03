<?php include("config.php"); 
$mysqli = new mysqli($sql_host,$sql_user,$sql_pass,$sql_db);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
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
		$('#sidebar').load('content.php',params,function(){});
}
</script>

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
    <div style="width:100%; display:block; font-size:14px; color:#970704; padding:10px 0px 10px 10px">Ahora enterarse a donde viajan nuestros servidores publicos es muy facil.</div>
    <p><div style="width:100%; height:100px"><div style="width:30%; height:100px; display:inline-block"><img src="images/mapa.png" class="index_imagen"></div><div class="index_text">Da click sobre algun marcador</div></div></p>
	<p><div style="width:100%; height:100px"><div style="width:30%; height:100px; display:inline-block"><img src="images/leer.png" class="index_imagen1"></div><div class="index_text">Enterate de los detalles.</div></div></p>
    <br>
<div style="font-size:14px; padding:10px 0px 10px 0px; color:#e8f2fd; text-align:center; background:#143d69">Si estas usando un dispositivo mobil (tablets o smartphones) cierra esta ventana y da click sobre algun marcador.</div>
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
		$mysqli->real_query('SELECT * FROM viajes');
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
