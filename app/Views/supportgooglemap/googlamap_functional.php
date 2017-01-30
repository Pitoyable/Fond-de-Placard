<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test final google map</title>
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous">
    </script>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
      .controls {
      margin-top: 10px;
      border: 1px solid transparent;
      border-radius: 2px 0 0 2px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      height: 32px;
      outline: none;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
      background-color: #fff;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
      margin-left: 12px;
      padding: 0 11px 0 13px;
      text-overflow: ellipsis;
      width: 300px;
      }

      #pac-input:focus {
      border-color: #4d90fe;
      }

      .pac-container {
      font-family: Roboto;
      }

      #type-selector {
      color: #fff;
      background-color: #4d90fe;
      padding: 5px 11px 0px 11px;
      }

      #type-selector label {
      font-family: Roboto;
      font-size: 13px;
      font-weight: 300;
      }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <input id="pac-input" class="controls" type="text"
        placeholder="Enter a location">
    <div id="type-selector" class="controls">
      <input type="radio" name="type" id="changetype-all" checked="checked">
      <label for="changetype-all">All</label>

      <input type="radio" name="type" id="changetype-establishment">
      <label for="changetype-establishment">Establishments</label>

      <input type="radio" name="type" id="changetype-address">
      <label for="changetype-address">Addresses</label>

      <input type="radio" name="type" id="changetype-geocode">
      <label for="changetype-geocode">Geocodes</label>
    </div>
    <div id="map"></div>
    <script>
//[--------------------------------------------------------
// {START} Déclaration des variables globals
//--------------------------------------------------------]
      var map;
      var infowindow;
//[--------------------------------------------------------
// {END} Déclaration des variables globals
//--------------------------------------------------------]

//[--------------------------------------------------------
// {START} fonction de création de la map
//--------------------------------------------------------]
      function initMap() {

        // variable pour une positionnement par défault
        var dieppe = new google.maps.LatLng(79.9333300,1.0833300);
        // variable pour le initMap
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: dieppe
        });

        // variable pour la géoloc
        var infoWindow = new google.maps.InfoWindow({map:map});

        // variable de récup de la recherche
        var input = (document.getElementById('pac-input'));

        // variable pour les filtres de la recherche
        var types = document.getElementById('type-selector');

        // variable pour l'autocomplétion
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        }); // place un marquer lorsqu'un lieu est entrer

        // On commence la création de la map

        // Sert pour les filtre de recherche
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);


            // condition si le navigateur autorise la géolocalisation
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {
                //variable contenant la position de l'utilisateur
                var pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
                }; // fin var pos

                // variable contenant la requête de zone pour trouver les magasin
                var request = {
                  location: pos,
                  radius: '10000',
                  types: ['grocery_or_supermarket']
                }; // fin var request

                // variable créant les objets contenant les service
                var service = new google.maps.places.PlacesService(map);
                service.nearbySearch(request, function(results, status) {
                  if (status == google.maps.places.PlacesServiceStatus.OK) {
                    for (var i = 0; i < results.length; i++) {

                      // variable contenant les position des magasins
                      var placemarket = results[i];

                      // variable contenant les marqueur pour les magasins
                      var marker = new google.maps.Marker({
                        map:map,
                        position: placemarket.geometry.location
                      }); // fin objet marqueur des magasins
                    } // fin du for pour trouver les magasins
                  } // fin du if PlacesServiceStatus
                })// fin instruction fonction nearbySearch / fin fonction nearbySearch

                // lancement de la map
                infoWindow.setPosition(pos);
                infoWindow.setContent('Vous êtes ici');
                map.setCenter(pos);
              }, function() { // fin instruction de la fonction getCurrentPosition
                handleLocationError(true, infoWindow, map.getCenter());
              }) // fin de la fonction handle / fin de la fonction getCurrentPosition
            } else { // fin if navigator.geolocation
              handleLocationError(false, infoWindow, map.getCenter());
            } // fin else handle


          var textInput = document.getElementById('pac-input');
          textInput.onkeyup = function () {
            console.log('vckjszhwbsdijflkej');
          };
            if (autocomplete) {
            //
              //activation de l'autocomplétion ?
              autocomplete.addListener('place_changed', function() {
                infowindow.close();
                marker.setVisible(false);
                // variable contenant les données saisie
                var place = autocomplete.getPlace();

                var request = {
                  location: place,
                  radius: '10000',
                  types: ['grocery_or_supermarket']
                };

                var service = new google.maps.places.PlacesService(map);
                service.nearbySearch(request, function(results, status) {
                  if (status == google.maps.places.PlacesServiceStatus.OK) {
                    for (var i = 0; i < results.length; i++) {
                      var placemarket = results[i];

                      var marker = new google.maps.Marker({
                        map: map,
                        position: placemarket.geometry.location
                      })
                    }
                  }
                })
              // if (!place.geometry) {
              //   window.alert("Une erreur, je ne sais pas encore pourquoi ! ");
              //   return;
              // } // fin if (!place.geometry)

              // condition si le lieu saisie est trouver / If the place has a geometry, then present it on a map.
              if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
              } else { // fin if (place.geometry.viewport)
                map.setCenter(place.geometry.viewport);
                map.setZoom(16);
              } // fin else du if (place.geometry.viewport)

              marker.setIcon(/** @type {google.maps.Icon} */({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
              }));

              marker.setPosition(place.geometry.location);
              marker.setVisible(true);

              var address = '';
              if (place.address_components) {
                address = [
                  (place.address_components[0] && place.address_components[0].short_name || ''),
                  (place.address_components[1] && place.address_components[1].short_name || ''),
                  (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
              } // fin if (place.address_components)
// test pour faire marcher le champ de saisie

              // input.keypress(function () {
              //   console.log("HOY !");
              // });

// fin du test champ de saisie
              infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
              infowindow.open(map, marker);
// on fait le test !!!

// fin du test !!!
              console.log(autocomplete.getPlace());
            });
            } // fin addListener


      } // fin initMap

      // $('#pac-input').on('keyup', function () {
      //   console.log('HOY !');
      // });
//[--------------------------------------------------------
// {END} fonction de création de la map
//--------------------------------------------------------]

//[--------------------------------------------------------
// {START} fonction needed
//--------------------------------------------------------]
      function setupClickListener(id, types) {
        var radioButton = document.getElementById(id);
        radioButton.addEventListener('click', function() {
          autocomplete.setTypes(types);
        });
      }
      setupClickListener('changetype-all', []);
      setupClickListener('changetype-address', ['adress']);
      setupClickListener('changetype-establishment', ['establishment']);
      setupClickListener('changetype-geocode', ['geocode']);

//[--------------------------------------------------------
// {END} fonction needed
//--------------------------------------------------------]
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaChm9LkY-J9jbHX3P8NIkdlGaNf6W5HM&signed_in=true&libraries=places&callback=initMap">
    </script>
  </body>
</html>
