<?php

require("./connection_sql.php");


header("Content-type: text/xml");

function parseToXML($htmlStr) {
    $xmlStr = str_replace('<', '&lt;', $htmlStr);
    $xmlStr = str_replace('>', '&gt;', $xmlStr);
    $xmlStr = str_replace('"', '&quot;', $xmlStr);
    $xmlStr = str_replace("'", '&#39;', $xmlStr);
    $xmlStr = str_replace("&", '&amp;', $xmlStr);
    return $xmlStr;
}

// Select all the rows in the markers table
$sql = "SELECT * FROM driver order by date_time_gps limit 2";
// echo $sql;
header("Content-type: text/xml");
echo '<markers>';

// Iterate through the rows, adding XML nodes for each
foreach ($conn->query($sql) as $row) {
    // ADD TO XML DOCUMENT NODE

    echo '<marker ';
    echo 'id="' . parseToXML($row['did']) . '" ';
//    echo 'address="' . parseToXML($row['did']) . '" ';
    echo 'name="' . $row['dfName'] . " " . $row['dlName'] . '" ';
    echo 'telephone="' . $row['dMobileNo'] . '" ';
    echo 'lat="' . $row['dlatitude'] . '" ';
    echo 'lng="' . $row['dLongitude'] . '" ';
    echo 'type="CAB"';
    echo '/>';
}


$sql = "SELECT * FROM hires WHERE did='0'";

// Iterate through the rows, adding XML nodes for each
foreach ($conn->query($sql) as $row) {

    $latitude = $row['dLatitude'];
    $longitude = $row['dLongitude'];

    $geocodeFromLatLong = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng=' . trim($latitude) . ',' . trim($longitude) . '&sensor=false');
    $output = json_decode($geocodeFromLatLong);
    $status = $output->status;
    $address = ($status == "OK") ? $output->results[1]->formatted_address : '';

    $latitude = $row['pasLatitude'];
    $longitude = $row['pasLongitude'];

    $geocodeFromLatLong = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng=' . trim($latitude) . ',' . trim($longitude) . '&sensor=false');

    $output = json_decode($geocodeFromLatLong);
    $status = $output->status;
    $address1 = ($status == "OK") ? $output->results[1]->formatted_address : '';




    // ADD TO XML DOCUMENT NODE
    echo '<marker ';
    echo 'id="' . parseToXML($row['hireID']) . '" ';
    echo 'name="' . parseToXML($row['hireID']) . '" ';
    echo 'address="' . $address . '" ';
    echo 'address1="' . $address1 . '" ';
    echo 'lat="' . $row['pasLatitude'] . '" ';
    echo 'lng="' . $row['pasLongitude'] . '" ';
    echo 'type="PAS"';
    echo '/>';
}

// End XML file
echo '</markers>';
?>
