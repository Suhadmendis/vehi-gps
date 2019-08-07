
    //<![CDATA[
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

    function load() {

        var map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(6.9822356, 80.1950661),
            zoom: 10,
            mapTypeId: 'roadmap',
            gestureHandling: 'greedy'
        });
        var infoWindow = new google.maps.InfoWindow;
        // Change this depending on the name of your PHP file
        downloadUrl("driver_map_data.php", function (data) {
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
                    html = "<b>" + name + "</b> <br/><b>Mob</b> =" + telNo + "<br/><b>Latitude</b> =" + latitude + "<br/><b>Latitude</b> =" + logitude + "<br/>" + "<a>Tracking</a>" + " " + "<a href=home.php?url=backTrack&?&var="+name+">PlayBack</a>" + " " + "<a href=home.php?url=reports&asad>Reports</a>" + " " + "<a href=index.php>Geo-Fence</a>" + "<br/>";
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
//            var flightPath = new google.maps.Polyline({
//                path: destination,
//                strokeColor: "#0000FF",
//                strokeOpacity: 0.8,
//                strokeWeight: 2,
//
//            });
//            marker = new google.maps.Marker({
//                position: map.getCenter(),
//                icon: {
//                    path: google.maps.SymbolPath.CIRCLE,
//                    scale: 10
//                },
//                draggable: true,
//                map: map
//            });

            flightPath.setMap(map);

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

    function getdata(cdata, cdata1) {

        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null) {
            alert("Browser does not support HTTP Request");
            return;
        }

        var url = "view_pend_data.php";
        url = url + "?Command=" + "get_data";
        url = url + "&id=" + cdata;
        url = url + "&ptype=" + cdata1;


        xmlHttp.onreadystatechange = assign_dt;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);

    }




    function assign_dt() {

        var XMLAddress1;

        if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("ptype");
            if (XMLAddress1[0].childNodes[0].nodeValue == "CAB") {

                document.getElementById('txt_did').value = "";
                document.getElementById('fname').value = "";
                document.getElementById('lname').value = "";
                document.getElementById('mob_no').value = "";


                XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("did");
                document.getElementById('txt_did').value = XMLAddress1[0].childNodes[0].nodeValue;

                XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("dfName");
                document.getElementById('fname').value = XMLAddress1[0].childNodes[0].nodeValue;

                XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("dlName");
                document.getElementById('lname').value = XMLAddress1[0].childNodes[0].nodeValue;

                XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("dMobileNo");
                document.getElementById('mob_no').value = XMLAddress1[0].childNodes[0].nodeValue;


            } else {

                document.getElementById('txt_hireid').value = "";
                document.getElementById('txthtime').value = "";
                document.getElementById('fname1').value = "";
                document.getElementById('lname1').value = "";
                document.getElementById('mob_no1').value = "";


                XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("hireID");
                document.getElementById('txt_hireid').value = XMLAddress1[0].childNodes[0].nodeValue;

                XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("hireT");
                document.getElementById('txthtime').value = XMLAddress1[0].childNodes[0].nodeValue;

                XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("fname");
                document.getElementById('fname1').value = XMLAddress1[0].childNodes[0].nodeValue;

                XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lname");
                document.getElementById('lname1').value = XMLAddress1[0].childNodes[0].nodeValue;

                XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("contact");
                document.getElementById('mob_no1').value = XMLAddress1[0].childNodes[0].nodeValue;
            }
        }

    }

    function doNothing() {

    }
