<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 700px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>Poslovni prostori Mestne občine Velenje</h3>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 46.357989, lng: 15.113282};
        var uluru1 = {lat: 46.357915, lng: 15.113014};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
        var marker = new google.maps.Marker({
          position: uluru1,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBs37Y0Dt8JcLo7bJlkLEHJjqjQ50JCb4Q&callback=initMap">
    </script>
  </body>
</html>