<?php

session_start();



include_once './connection_sql.php';

if ($_GET["Command"] == "pass_quot") {
    
  header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $cuscode = $_GET["custno"];
    
    $sql = "Select * from vehicle_master1 where vehicle_ref =  '" . $cuscode . "'";

    $result = $conn->query($sql);
    $row = $result->fetch();
    
   
   
    $ResponseXML .= "<obj><![CDATA[" . json_encode($row) . "]]></obj>";
    $ResponseXML .= "<stname><![CDATA[" . $_GET['stname'] . "]]></stname>";
    $ResponseXML .= "</new>";
   

    echo $ResponseXML;
  }


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table   class=\"table table-bordered\">
                <tr>
                    <th>Vehicle Ref</th>
                    <th>Department</th>
                    <th>Vehicle No</th>
                    <th>Vehicle Type</th>
                </tr>";

     $sql = "Select * from vehicle_master1 where vehicle_ref<> ''";
 
    if ($_GET['vehicle_ref'] != "") {
        $sql .= " and vehicle_ref like '%" . $_GET['vehicle_ref'] . "%'";
    }
    if ($_GET['department'] != "") {
        $sql .= " and department like '%" . $_GET['department'] . "%'";
    }
     if ($_GET['vehicle_number'] != "") {
        $sql .= " and vehicle_number like '%" . $_GET['vehicle_number'] . "%'";
    }
    if ($_GET['vehicle_type'] != "") {
        $sql .= " and vehicle_type like '%" . $_GET['vehicle_type'] . "%'";
    }
 
    $sql .= " ORDER BY vehicle_ref limit 50 ";

    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['vehicle_ref'];
        $stname = $_GET["stname"];

        $ResponseXML .= "<tr>               
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['vehicle_ref'] . "</a></td>
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['department'] . "</a></td>
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['vehicle_number'] . "</a></td> 
                              <td onclick=\"custno('$cuscode','$stname');\">" . $row['vehicle_type'] . "</a></td>
                            </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
