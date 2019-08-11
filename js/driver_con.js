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
  
    getdt();
}




function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "driver_con_data.php";
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
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("driver");
        console.log(XMLAddress1[0].childNodes[0].nodeValue);
var data = JSON.parse(XMLAddress1[0].childNodes[0].nodeValue);
        console.log(data);
        var table = "<table class='table table-bordered'>"+
                      "<thead>"+
                        "<tr>"+
                            "<th>Driver Name</th>"+
                            "<th>Vehicle No</th>"+
                            "<th>ddddddd</th>"+
                            "<th>ddddddd</th>"+
                          
                        
                          "</tr>"+
                      "</thead>"+
                      "<tbody>";


        
        for (var i = data.length - 1; i >= 0; i--) {
            table = table + "<tr>";



            table = table + "<td>" + data[i].date_time_gps + "</td>";
          
            table = table + "<td>" + data[i].lat + "</td>";
            table = table + "<td>" + data[i].lon + "</td>";
            table = table + "<td>" + data[i].speed + "</td>";
          
          



            table = table + "</tr>";
            // console.log(data[i].Bene_Add_1);
        }

        table = table + "</tbody></table>";

        // table = "<table style='width:100%'>  <tr>    <th>Firstname</th>    <th>Lastname</th>     <th>Age</th>  </tr>  <tr>    <td>Jill</td>    <td>Smith</td>     <td>50</td>  </tr>  <tr>    <td>Eve</td>    <td>Jackson</td>     <td>94</td>  </tr></table>";

        document.getElementById("itemdetails").innerHTML = table;
    }
}
