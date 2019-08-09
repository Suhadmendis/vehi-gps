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

function keyset(key, e) {

    if (e.keyCode == 13) {
        document.getElementById(key).focus();
    }
}

function got_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000066";
}

function lost_focus(key) {
    document.getElementById(key).style.backgroundColor = "#000000";
}



function load1() {

    getdt();

}




function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "mapp_data.php";
    url = url + "?Command=" + "backtrack";
    url = url + "&ls=" + "new";

    // url = url + "&ST_DATE=" + opener.document.form1.txt_start.value;
    // url = url + "&ED_DATE=" + opener.document.form1.txt_end.value;
    // url = url + "&DR=" + opener.document.form1.txt_name.value;
    // url = url + "&VH=" + opener.document.form1.txt_vehi.value;
    

    // if (opener.document.form1.pk_on.checked) {
    //   url = url + "&PARK=" + "Y";
    // }else{
    //   url = url + "&PARK=" + "N";
    // }
    // if (opener.document.form1.dr.checked) {
    //   url = url + "&D=" + "Y";
    // }else{
    //   url = url + "&D=" + "N";
    // }
    // if (opener.document.form1.vr.checked) {
    //   url = url + "&V=" + "Y";
    // }else{
    //   url = url + "&V=" + "N";
    // }

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}
var neighborhoods = [
{lat: 52.50814  , lng:  13.45008  },
{lat: 52.50813  , lng:  13.45009  },
{lat: 52.50812  , lng:  13.4501 }



  
];

function assign_dt() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
  
         XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("driver");
        // document.getElementById('uniq').value = XMLAddress1[0].childNodes[0].nodeValue;

        // console.log(XMLAddress1[0].childNodes[0].nodeValue); 
        var obj = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);
 var loc = [];
  for (var i=0; i<XMLAddress1.length; i+=1) {
         loc.push(JSON.parse(XMLAddress1[i].childNodes[0].nodeValue));

          
        }

        console.log(loc);


console.log(neighborhoods);


        neighborhoods = loc;

    }
}



var markers = [];
var map;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: {lat: 6.908690, lng: 79.916984}
  });
}

function drop() {

  // alert(opener.document.form1.txt_start.value);
  clearMarkers();
  for (var i = 0; i < neighborhoods.length; i++) {
    addMarkerWithTimeout(neighborhoods[i], i * 50);
  }
}

function addMarkerWithTimeout(position, timeout) {
  window.setTimeout(function() {
    markers.push(new google.maps.Marker({
    position: position,
    map: map,
    animation: google.maps.Animation
    }));
  }, timeout);
}

function clearMarkers() {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(null);
  }
  markers = [];
}



function pointer() {
    
    var rep = document.getElementById("txt_name").value;
    var dtFrom = document.getElementById("txt_start").value;
    var dtTo = document.getElementById("txt_end").value;
}



