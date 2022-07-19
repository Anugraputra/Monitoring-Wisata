<head>
<link rel="stylesheet" href="assets/style/style.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgjB1tjtgEz88jTm3xCeOAERjS9363aA4&callback=initMap"
        async defer></script>
    <style>      
        #map {
            height: 83%;
            width: 100%;
            
        }
    </style>
</head>
<body>
<div class="jumbotron">
    <div class="container">
        <h3 class="display-4 text-center text-dark">Peta</h3>
        <hr class="my-2">
    <div id="map"></div>
    <script>
        function initMap() {
       
        var mapCanvas = document.getElementById('map');      
        // Center maps
        var myLatlng = new google.maps.LatLng(-6.9633729,107.8789278);
        // Map Options    
        var mapOptions = {
          zoom: 6 ,
          center: myLatlng
        };
        
        // Create the Map
        map = new google.maps.Map(mapCanvas, mapOptions);

        var infoWindow = new google.maps.InfoWindow;

        //request data from data-maps.php
        $.getJSON( "data-maps.php", function( data ) {
          //parsing data json 
          $.each( data, function( i, item ) {

            //set point marker
            var point = new google.maps.LatLng(
                        parseFloat(item.latitude),
                        parseFloat(item.longtitude));

            //create pop up info header
            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = item.nama;
            infowincontent.appendChild(strong);
            
            infowincontent.appendChild(document.createElement('br'));

            //create pop up info content
            var text = document.createElement('text');
            text.textContent = item.alamat
            infowincontent.appendChild(text);

            //marker option
            var marker = new google.maps.Marker({
                map: map,
                animation: google.maps.Animation.DROP,
                position: point,
                icon: item.image_path
            });

            //popup info 
            marker.addListener('click', function() {
              infoWindow.setContent(infowincontent);
              infoWindow.open(map, marker);
            });

          });
          
        });
        }
    </script>
</div>

</body>