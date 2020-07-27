
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
        
        var customIcon = {
            arrival: {
                path: 'M11-2.33A9.33,9.33,0,0,0,1.67,7C1.67,13.08,11,24.33,11,24.33s9.33-11,9.33-17.33A9.33,9.33,0,0,0,11-2.33ZM9.56,8.39L8.73,10.89H7.67l2.71-8h1.24l2.72,8h-1.1L12.38,8.39H9.56Zm2.61-.8L11.39,5.29c-0.18-.52-0.3-1-0.41-1.45h0c-0.12.47-.25,1-0.4,1.44L9.77,7.58h2.4Z',
                fillColor: '#f1f900'
                
            },
            departure: {
                path: 'M11-2.33A9.33,9.33,0,0,0,1.67,7C1.67,13.08,11,24.33,11,24.33s9.33-11,9.33-17.33A9.33,9.33,0,0,0,11-2.33ZM11.17,11H8.31V3.16H11.4c1.78,0,3.38,1.17,3.38,3.82C14.78,9,13.83,11,11.17,11Zm0-7H9.27v6.17h1.81c1.19,0,2.72-.56,2.72-3.14C13.79,4.69,12.51,4,11.14,4Z',
                fillColor: '#FF8300',
              }
        };
        
        var styles = [
          {
            "elementType": "geometry",
            "stylers": [
              {
                "color": "#efefef"
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
                "color": "#cccccc"
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
              var id = markerElem.getAttribute('ID');
              var name = markerElem.getAttribute('name');
              var date = markerElem.getAttribute('date');
              var story_mod = markerElem.getAttribute('story_mod');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = date + " " + name;
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));
              console.log("Showing story link for:" + id);
              if (story_mod === 1) {
                  var story_link = document.createElement('a');
                  story_link.href = './stories#' + id;
                  story_link.appendChild(document.createTextNode("Story"));
                  infowincontent.appendChild(story_link);
              }
              var icon = customIcon[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon:{
                    fillColor: icon.fillColor,
                    fillOpacity: 1,
                    anchor: { x: 16, y: 32 },
                    path: icon.path
                }
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


