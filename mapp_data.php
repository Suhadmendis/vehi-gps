<?php

session_start();


require_once ("connection_unit.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "backtrack") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $STD = $_GET['ST_DATE'];
    $ETD = $_GET['ED_DATE'];
    $DR = $_GET['DR'];
    $VH = $_GET['VH'];

    $PK = $_GET['PK'];
    

    if ($PK == "true") {
         $sql = "SELECT lat,lon FROM device_356307041502070 where date_time_gps BETWEEN  '".$STD." 00:00:00". "' and '".$ETD." 00:00:00"."'";
    }else{
         $sql = "SELECT lat,lon FROM device_356307041502070 where date_time_gps BETWEEN  '".$STD." 00:00:00". "' and '".$ETD." 00:00:00"."' and speed <> '0000'";
    }


    // $sql = "SELECT * FROM device_356307041502070";
      
  // echo $sql;
 // $sql = "SELECT * FROM device_356307041502070 where speed <> '0000'  ";

  $myObj;
// $myJSON = json_encode($myObj);

$myJSON;

    $latlon=array();
    $count = 0;
    foreach ($conn->query($sql) as $row) {
            ++$count;

            if ($count>5) {
                $myObj->lat = floatval($row['lat']);
                $myObj->lng = floatval($row['lon']);

                $myJSON = json_encode($myObj);

                $ResponseXML .= "<driver><![CDATA[".$myJSON."]]></driver>";
                $count = 0;
            }
    
        
                 
    }

// {lat: 52.50814  , lng:  13.45008  },
    
    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

?>