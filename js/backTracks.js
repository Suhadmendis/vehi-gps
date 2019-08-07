var customIcons = {
    PAS: {
        icon: 'http://www.alldayrentacar.com/wp-content/uploads/2015/09/icoCountPassengerL.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
    },
    CAB: {
        icon: 'http://downloadicons.net/sites/default/files/a-taxi-icon-12540.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
    }

};

function load1() {

    pointer();

}

function pointer() {
        var map = new google.maps.Map(document.getElementById("map1"), {
        center: new google.maps.LatLng(6.842473, 79.908388),
        zoom: 17,
        mapTypeId: 'roadmap',
        gestureHandling: 'greedy'
    });
    var infoWindow = new google.maps.InfoWindow;    
    var rep = document.getElementById("txt_name").value;
    var dtFrom = document.getElementById("txt_start").value;
    var dtTo = document.getElementById("txt_end").value;
    downloadUrl("backTrack_data.php?rep=" + rep + "&dtFrom=" + dtFrom + "&dtTo=" + dtTo, function (data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        var destination = new google.maps.MVCArray();


        for (var i = 0; i < markers.length; i++) {
            
            var id = markers[i].getAttribute("id");
            var name = markers[i].getAttribute("name");
            var address = markers[i].getAttribute("address");
            var address1 = markers[i].getAttribute("address1");
            var telNo = markers[i].getAttribute("telephone");
            var type = markers[i].getAttribute("type");
            var latitude = markers[i].getAttribute("lat");
            var logitude = markers[i].getAttribute("lng");
            var point = new google.maps.LatLng(
                    parseFloat(markers[i].getAttribute("lat")),
                    parseFloat(markers[i].getAttribute("lng")));

            destination.push(new google.maps.LatLng(parseFloat(markers[i].getAttribute("lat")), parseFloat(markers[i].getAttribute("lng"))));
            var html = "";
            if (type == "PAS") {
                html = "<b>" + name + "</b> <br/><b>From</b> =" + address1 + "<br/><b>To</b> =" + address;
            } else {
                html = "<b>" + name + "</b> <br/><b>Mob</b> =" + telNo + "<br/><b>Latitude</b> =" + latitude + "<br/><b>Latitude</b> =" + logitude + "<br/>" + "<a>Tracking</a>" + " " + "<a href=home.php?url=backTrack&?&var=" + name + ">PlayBack</a>" + " " + "<a href=home.php?url=reports&asad>Reports</a>" + " " + "<a href=index.php>Geo-Fence</a>" + "<br/>";
            }


            var icon = customIcons[type] || {};



            var marker = new google.maps.Marker({
                id: id,
                type: type,
                map: map,
                position: point,
                icon: icon.icon,
                shadow: icon.shadow
            });
            bindInfoWindow(marker, map, infoWindow, html, id);
        }
        var flightPath = new google.maps.Polyline({
            path: destination,
            strokeColor: "#0000FF",
            strokeOpacity: 0.6,
            strokeWeight: 6
        });

        flightPath.setMap(map);
        // console.log(map);

    });
}



function bindInfoWindow(marker, map, infoWindow, html, id) {
    google.maps.event.addListener(marker, 'click', function () {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
        getdata(this.id, this.type);
    });
}
function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };
    request.open('GET', url, true);
    request.send(null);
}
function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}







function doNothing() {

}





// The following example creates a marker in Stockholm, Sweden using a DROP
// animation. Clicking on the marker will toggle the animation between a BOUNCE
// animation and no animation.

var marker;

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: {lat: 59.325, lng: 18.070}
  });

  marker = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: {lat: 59.327, lng: 18.067}
  });
  marker.addListener('click', toggleBounce);
}

function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}