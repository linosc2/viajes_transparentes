L.Control.SimpleMarkers = L.Control.extend({
    options: {
        position: 'topleft'
    },
    onAdd: function () {
		var marker_container = L.DomUtil.create('div', 'marker_controls');
        var add_marker_div = L.DomUtil.create('div', 'add_marker_control', marker_container);
        var del_marker_div = L.DomUtil.create('div', 'del_marker_control', marker_container);
        add_marker_div.title = 'Agregar marcador';
        del_marker_div.title = 'Eliminar marcador';
        
        L.DomEvent.addListener(add_marker_div, 'click', L.DomEvent.stopPropagation)
            .addListener(add_marker_div, 'click', L.DomEvent.preventDefault)
            .addListener(add_marker_div, 'click', (function () { this.enterAddMarkerMode() }).bind(this));
        
        L.DomEvent.addListener(del_marker_div, 'click', L.DomEvent.stopPropagation)
            .addListener(del_marker_div, 'click', L.DomEvent.preventDefault)
            .addListener(del_marker_div, 'click', (function () { this.enterDelMarkerMode() }).bind(this));
        
        return marker_container;
    },
    
    enterAddMarkerMode: function () {
        if (markerList !== '') {
            for (var marker = 0; marker < markerList.length; marker++) {
                if (typeof(markerList[marker]) !== 'undefined') {
                    markerList[marker].removeEventListener('click', this.onMarkerClickDelete);
                } 
            }
        }
		
        document.getElementById('map').style.cursor = 'crosshair';
		map.addEventListener('click', this.onMapClickAddMarker);
    },
    
    enterDelMarkerMode: function () {
        for (var marker = 0; marker < markerList.length; marker++) {
            if (typeof(markerList[marker]) !== 'undefined') {
                markerList[marker].addEventListener('click', this.onMarkerClickDelete);
            }
        }
    },
    
    onMapClickAddMarker: function (e) {
		  if (marcador < 1) {
        map.removeEventListener('click'); 
        document.getElementById('map').style.cursor = 'auto';
        
        var popupContent =  "Da click sobre el marcador";
        var the_popup = L.popup({maxWidth: 160, closeButton: false});
        the_popup.setContent(popupContent);
        document.getElementById('latlong').value=e.latlng.toString(4);
        var marker = L.marker(e.latlng);
        marker.addTo(map).on('click', function(){document.getElementById('latlong').value=e.latlng.toString(4); sidebar.show()});
        marker.bindPopup(the_popup).openPopup();
        markerList.push(marker);
        marcador= marcador + 1;
		return false;
		  }
    },

    onMarkerClickDelete: function (e) {
        map.removeLayer(this);
        var marker_index = markerList.indexOf(this);
        delete markerList[marker_index];
        marcador=marcador-1;
        for (var marker = 0; marker < markerList.length; marker++) {
            if (typeof(markerList[marker]) !== 'undefined') {
                markerList[marker].removeEventListener('click', arguments.callee);
            } 
        }
        return false;  
    }
});

var markerList = [];
var marcador=0;
