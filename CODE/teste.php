<!-- MAPA -->



<div style='overflow:hidden;height:280px;width:100%;color: #0095eb'>
    <div id='gmap_canvas' style='height:280px;width:100%;'></div>
    <style>
        #gmap_canvas img {
            max-width: none !important;
            background: none !important
        }

        .gm-ui-hover-effect {
            display: none !important;
        }
    </style>
</div>

<!-- Alterar apenas Aqui -->
<script type='text/javascript'>
    function init_map() {
        var myOptions = {
            zoom: 13,
            center: new google.maps.LatLng(-22.439430, -46.968392),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
        marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(-22.439430, -46.968392)
        });
        infowindow = new google.maps.InfoWindow({
            content: '<strong> MINHA EMPRESA </strong><br> MEU ENDEREÇO <br>'
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });
        infowindow.open(map, marker);
    }
    google.maps.event.addDomListener(window, 'load', init_map);
</script>
<!-- Alterar apenas Aqui -->

<!-- MAPA -->