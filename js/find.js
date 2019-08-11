var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!'
  }
})


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

function newent() {
    document.getElementById('uniq').value = "";

    document.getElementById('driver_ref').value = "";
    document.getElementById('driver_name').value = "";
    
    document.getElementById('Diver_Address_1').value = "";
    document.getElementById('Diver_Address_2').value = "";
    document.getElementById('Diver_Tel_1').value = "";
    document.getElementById('Diver_Tel_2').value = "";
    document.getElementById('Driving_License').value = "";
    document.getElementById('NIC').value = "";
    document.getElementById('uniq').value = "";
    
    getdt();
}




function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "driver_master_file_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function assign_dt() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("driver_ref");
        document.getElementById('driver_ref').value = XMLAddress1[0].childNodes[0].nodeValue;
//
         XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("uniq");
        document.getElementById('uniq').value = XMLAddress1[0].childNodes[0].nodeValue;
    }
}

function getD(argument) {
     xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var di = "https://maps.googleapis.com/maps/api/geocode/json?latlng=06.8646784,80.0091200&key=AIzaSyClBKRU9iKfSLnXVTvdv11RvKwpCrfdoQI";
   
    xmlHttp.onreadystatechange = getde;
    xmlHttp.open("GET", di, true);
    xmlHttp.send(null);
    
}



function getde() {
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        var jobj = JSON.parse(xmlHttp.response);
console.log(jobj);
        jobj1 = jobj.results[3].address_components;
        jobj2 = jobj.results[0].formatted_address;
console.log(jobj2);
document.getElementById('di1').innerHTML =  "Country : "+jobj1[4].long_name;
document.getElementById('di2').innerHTML =  "Road : "+jobj1[0].long_name;
document.getElementById('di3').innerHTML =  "City : "+jobj1[1].long_name;
document.getElementById('di4').innerHTML =  "District : "+jobj1[2].long_name;
document.getElementById('di5').innerHTML =  "Province : "+jobj1[3].long_name;

document.getElementById('di6').innerHTML =  "Address : "+jobj2;


    }
}


