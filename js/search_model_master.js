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

function getdt() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "search_model_master_data.php";
    url = url + "?Command=" + "getdt";
    url = url + "&ls=" + "new";

    xmlHttp.onreadystatechange = assign_dt;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function custno(code, stname)
{
   
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "search_model_master_data.php";
    url = url + "?Command=" + "pass_quot";
    url = url + "&custno=" + code;
    url = url + "&stname=" + stname;

    xmlHttp.onreadystatechange = passcusresult_quot;

    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}
function passcusresult_quot()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("stname");
        var stname = XMLAddress1[0].childNodes[0].nodeValue;
        if (stname === "Master") {
            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("model_ref");
            opener.document.getElementById('model_ref').value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("model");
            opener.document.getElementById('model').value = XMLAddress1[0].childNodes[0].nodeValue;

           
        }

        if (stname === "trip") {
            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("driver_ref");
            opener.document.getElementById('driver_ref').value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("driver_name");
            opener.document.getElementById('driver_name').value = XMLAddress1[0].childNodes[0].nodeValue;


        }
        
         if (stname === "expen") {
            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("driver_ref");
            opener.document.getElementById('driver_ref').value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("driver_name");
            opener.document.getElementById('driver_name').value = XMLAddress1[0].childNodes[0].nodeValue;


        }
    self.close();
    }
    
}


function update_cust_list(stname)
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "search_model_master_data.php";
    url = url + "?Command=" + "search_custom";


    
    url = url + "&model_ref=" + document.getElementById('model_ref').value;
    url = url + "&model=" + document.getElementById('model').value;
   
    url = url + "&stname=" + stname;


    xmlHttp.onreadystatechange = showcustresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}

function showcustresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {


        document.getElementById('filt_table').innerHTML = xmlHttp.responseText;



    }
}

