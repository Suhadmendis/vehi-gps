<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Marker Clustering</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: {lat: 6.863225, lng: 79.877445}
        });

        var trafficLayer = new google.maps.TrafficLayer();
  trafficLayer.setMap(map);


        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location
           
          });
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }
      var locations = [
      {lat: 6.863225, lng: 79.877445},
      {lat: 6.829223, lng: 79.872381},
      {lat: 6.874134, lng: 79.880279},
      {lat: 6.883849, lng: 79.894444},
      {lat: 6.830160, lng: 79.892980},
      {lat: 6.812348, lng: 79.881136},
      {lat: 6.860413, lng: 79.894783},
      {lat: 6.866208, lng: 79.911434},
      {lat: 6.870778, lng: 79.910973},
      {lat: 6.873929, lng: 79.902709},
      {lat: 6.871852, lng: 79.893600},
      {lat: 7.174008, lng: 79.880537},
      {lat: 7.181898, lng: 79.884456},
      {lat: 7.169569, lng: 79.874822},
      {lat: 7.163378, lng: 79.981222},
      {lat: 7.162360, lng: 80.022424},
      {lat: 7.122311, lng: 80.065825},
      {lat: 6.599187, lng: 80.014389},
      {lat: 6.255079, lng: 80.151046},
      {lat: 6.180883, lng: 80.194276},
      {lat: 6.870714, lng: 79.877443}
       
      ]
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClBKRU9iKfSLnXVTvdv11RvKwpCrfdoQI&callback=initMap">
    </script>
  </body>
</html>