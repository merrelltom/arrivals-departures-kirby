
<?php snippet('header');
$MAPS_API_KEY = apache_getenv("MAPS_API_KEY"); ?>

    <div id="map" style="height: 100%"></div>

    <script>
      var customLabel = {
        arrival: {
          label: 'A'
        },
        departure: {
          label: 'D'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(0, 0),
          zoom: 2
        });
        var infoWindow = new google.maps.InfoWindow;
          downloadUrl('./get_map.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var date = markerElem.getAttribute('date');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = date + " " + name;
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $MAPS_API_KEY; ?>&callback=initMap">
    </script>
  </body>
</html>