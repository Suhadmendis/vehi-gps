<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Marker Animations With setTimeout()</title>
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
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
        margin-left: -52px;
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
      <button id="drop" onclick="drop()">Go !!</button>
    </div>


    <div id="map"></div>


    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClBKRU9iKfSLnXVTvdv11RvKwpCrfdoQI&&callback=initMap">
    </script>
  </body>

<script src="js/mapp.js"></script>
<script>load1();</script>

</html>