
<?php 
    snippet('header');
    $MAPS_API_KEY = apache_getenv("MAPS_API_KEY"); 
?>
    <main class="main map-main">
        
        <section class="page-section">
            <div class="wrapper">
                <div class="row">
                    <h2 class="section-title col-xs-12 col-md-4 col-lg-5"><?= $page->pageTitle();?></h2>
                    <div class="introduction large-text col-xs-12 col-md-8 col-lg-7">
                        <?= $page->pageIntroduction()->kt(); ?>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="page-section map-section">
                     <div id="map-wrapper">
                        <div id="map"></div>
                    </div>
        </section>

    </main>

    <script>
        const MAP_MARKER = 'M7-6.33A9.33,9.33,0,0,0-2.33,3C-2.33,9.08,7,20.33,7,20.33S16.33,9.35,16.33,3A9.33,9.33,0,0,0,7-6.33ZM5,6.24L3.93,9.63H2.49L6.15-1.15H7.83L11.51,9.63H10L8.87,6.24H5ZM8.58,5.15L7.53,2.05C7.29,1.35,7.13.71,7,.08h0c-0.16.64-.34,1.3-0.54,2L5.34,5.15H8.58Z';

        var customIcon = {
            arrival: {
              icon: '<?= $site->url()?>/assets/images/arrival-marker-1.png'
            },
            departure: {
              icon: '<?= $site->url()?>/assets/images/departure-marker-1.png'
            }
        };
        
        var styles = [
          {
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#B8E986"
              }
            ]
          },
          {
            "elementType": "labels.icon",
            "stylers": [
              {
                "visibility": "off"
              }
            ]
          },
          {
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#616161"
              }
            ]
          },
          {
            "elementType": "labels.text.stroke",
            "stylers": [
              {
                "color": "#f5f5f5"
              }
            ]
          },
          {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#bdbdbd"
              }
            ]
          },
          {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#eeeeee"
              }
            ]
          },
          {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#757575"
              }
            ]
          },
          {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#e5e5e5"
              }
            ]
          },
          {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#9e9e9e"
              }
            ]
          },
          {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#ffffff"
              }
            ]
          },
          {
            "featureType": "road.arterial",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#757575"
              }
            ]
          },
          {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#dadada"
              }
            ]
          },
          {
            "featureType": "road.highway",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#616161"
              }
            ]
          },
          {
            "featureType": "road.local",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                "color": "#9e9e9e"
              }
            ]
          },
          {
            "featureType": "transit.line",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#e5e5e5"
              }
            ]
          },
          {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#eeeeee"
              }
            ]
          },
          {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#ABDBFF"
              }
            ]
          },
          {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [
              {
                visibility: "off"
              }
            ]
          }
        ];

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(0, 0),
            streetViewControl: false,
            mapTypeControl: false,
            zoom: 2,
            styles: styles
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
              var icon = customIcon[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: {
                    path: MAP_MARKER,
                    fillColor: '#f1f900',
                    fillOpacity: 1,
//                    strokeColor: '#000',
                    anchor: { x: 16, y: 32 },
                },
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

    
<?php snippet('footer') ?>


