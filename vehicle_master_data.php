<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT vahical_code FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['vahical_code'];
    $uniq = uniqid();

    $tmpinvno = "0000000" . $row["vahical_code"];
    $lenth = strlen($tmpinvno);
    $no = trim("V/") . substr($tmpinvno, $lenth - 7);

    $ResponseXML .= "<reference_no><![CDATA[$no]]></reference_no>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";
    
    $ResponseXML .= "</new>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction(); 
        
        $sql = "delete from vehicle_master1 where vehicle_ref = '" . $_GET['vehicle_ref'] . "'";
        $result = $conn->query($sql);

        $sql1 = "Insert into vehicle_master1(item_count, Vehicle_Ref, uniq, Vehicle_Number, sdate, Seats, Fuel_Type, Year, Brand, Model)values ('" . $_GET['item_count'] . "','" . $_GET['Vehicle_Ref'] . "','" . $_GET['uniq'] . "','" . $_GET['Vehicle_Number'] . "','" . $_GET['sdate'] . "','" . $_GET['Seats'] . "','" . $_GET['Fuel_Type'] . "','" . $_GET['Year'] . "','" . $_GET['Brand'] . "','" . $_GET['Model'] . "') ";

        $result = $conn->query($sql1);
      
        
        $sql = "SELECT vahical_code FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['vahical_code'];
        $no2 = $no + 1;
        $sql = "update invpara set vahical_code = $no2 where vahical_code = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "delete") {
   
        $sql = "delete from vehicle_master1 where vehicle_ref = '" . $_GET['vehicle_ref'] . "'";
        $result = $conn->query($sql);
        echo "delete";
   
}