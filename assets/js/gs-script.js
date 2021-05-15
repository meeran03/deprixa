var googleMapDirections = function(elem){
    elem.centerMapLat =  elem.centerMapLat || 5.29826;
    elem.centerMapLong = elem.centerMapLong || -75.24790610000002;
    elem.detectLocation = elem.detectLocation || false;
    elem.initialStart = elem.initialStart || 'Colombia';
    elem.initialEnd = elem.initialEnd || 'Medellin';
    elem.map = elem.map || 'map';
    elem.routeDirections = elem.routeDirections || 'waypoints';
    elem.mainPointsContainer = elem.mainPointsContainer || '.end-point-container';
    elem.startPoint = elem.startPoint || 'start-point';
    elem.endPoint = elem.endPoint || 'end-point';
    var startPointCurrentPosition = document.querySelector('.start-point-current-location'),
        currentLocation = []
        currentLocationButton = false,
        printButton = document.querySelector('.print');
    this.initMap = function (){
        var map = new google.maps.Map(document.getElementById(elem.map),{
            zoom: 6,
            center: {lat: elem.centerMapLat, lng: elem.centerMapLong}
        });

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({
            draggable: true,
            map: map,
            panel: document.getElementById(elem.routeDirections)
        });

        directionsDisplay.addListener('directions_changed', function(){
            computeTotalDistance(directionsDisplay.getDirections());
        });

        if (elem.initialStart && !elem.detectLocation) {
            displayRoute(elem.initialStart, elem.initialEnd, directionsService, directionsDisplay);
        } else {
            getLocation();
        }


        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, onError);
              } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function jsonp(url, callback) {
            var callbackName = 'jsonp_callback_' + Math.round(100000 * Math.random());
            window[callbackName] = function(data) {
                delete window[callbackName];
                document.body.removeChild(script);
                callback(data);
            };

            var script = document.createElement('script');
            script.src = url + (url.indexOf('?') >= 0 ? '&' : '?') + 'callback=' + callbackName;
            document.body.appendChild(script);
        }


        function onError(){
            jsonp('http://ipinfo.io', function(data) {
              getInitialLocation(data.loc.split(',')[0], data.loc.split(',')[1]);
            });
            showNotification();
        }

        function showPosition(position) {
            getInitialLocation(position.coords.latitude, position.coords.longitude);
        }

        function getInitialLocation(latitude, longitude){
            var xmlhttp = new XMLHttpRequest(),
                    url = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+latitude+","+longitude;

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var initialLocation = JSON.parse(xmlhttp.responseText).results[0].formatted_address;

                    if (currentLocationButton) {
                        newPoints[0] = initialLocation;
                        startPoint.value = initialLocation;
                    } else {
                        displayRoute(initialLocation, elem.initialEnd, directionsService, directionsDisplay);
                    }
                }
            }
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        var startPoint = document.getElementById(elem.startPoint),
            startPointBox = new google.maps.places.SearchBox(startPoint),
            endPoint = document.getElementById(elem.endPoint),
            endPointBox = new google.maps.places.SearchBox(endPoint),
            newPoints = [];
        //Get start point from current position
        startPointCurrentPosition.addEventListener("click", function(){
            currentLocationButton = true;
            document.querySelector(elem.mainPointsContainer).style.display = 'block';
            document.querySelector(elem.mainPointsContainer).querySelector('#end-point').value = '';
            getLocation();
        })
        //End get start point from current position

        //Add Print functionality if the button exist
        if (printButton !== null) {
            printButton.addEventListener("click", function(){
                window.print();
            })
        }
        //End print

        //Input start point
        startPointBox.addListener('places_changed', function() {
            var places = startPointBox.getPlaces();

            if (places.length == 0) {
                return;
            }
            document.querySelector(elem.mainPointsContainer).style.display = 'block';
            document.querySelector(elem.mainPointsContainer).querySelector('#end-point').value = '';
            newPoints[0] = places[0]['formatted_address'];
            if (newPoints[1]!== undefined){
                displayRoute(newPoints[0], newPoints[1], directionsService, directionsDisplay);
            }
        });
        //End Input start point

        //Input end point
        endPointBox.addListener('places_changed', function() {
            var placesEnd = endPointBox.getPlaces();

            if (placesEnd.length == 0) {
                return;
            }
            newPoints[1] = placesEnd[0]['formatted_address'];
            displayRoute(newPoints[0], newPoints[1], directionsService, directionsDisplay);
        });
        //End Input end point
    }

    //Display the route points
    function displayRoute (origin, destination, service, display){
        service.route({
            origin:origin,
            destination: destination,
            waypoints: [],
            travelMode: google.maps.TravelMode.DRIVING,
            avoidTolls: true
        },function(response, status){
            if (status === google.maps.DirectionsStatus.OK) {
                display.setDirections(response);
            } else {
                alert('Could not display directions due to:' + status);
            }
        });
    }
    //End display the route points

    //Calculate the total distance
    function computeTotalDistance(result){
        var total = 0;
        var myroute = result.routes[0];
        for(var i = 0; i < myroute.legs.length; i++){
            total += myroute.legs[i].distance.value;
        }
        total = Math.round(total / 1000);
        document.getElementById('total-distance-value').innerHTML = total + ' km';
        document.getElementById('print-info-start').innerHTML = myroute.legs[0].start_address;
        document.getElementById('print-info-end').innerHTML = myroute.legs[0].end_address;
    }
    //End calculate the total distance
}
