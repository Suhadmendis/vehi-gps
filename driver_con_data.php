<?php

session_start();


require_once ("connection_unit.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

   $sql = "SELECT date_time_gps,lat,lon,speed FROM device_356307041502070 limit 3";
    $result = $conn->query($sql);
    // $row = $result->fetch();
                $ary = Array();
                foreach ($conn->query($sql) as $row) {
                   array_push($ary,$row); 
                }

    
    
    $ResponseXML .= "<driver><![CDATA[".json_encode($ary)."]]></driver>";

   
    
    
    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

            $sql = "delete from driver_master_file where driver_ref = '" . $_GET['driver_ref'] . "'";
        
       $result = $conn->query($sql);

    $sql1 = "Insert into driver_master_file(driver_ref,sdate,driver_name,Diver_Add1,Diver_Add2,Diver_Tel_1,Diver_Tel_2,Driving_License,NIC,uniq)values 
                        ('" . $_GET['driver_ref'] . "','" . $_GET['sdate'] . "','" . $_GET['driver_name'] . "','" . $_GET['Diver_Address_1'] . "','" . $_GET['Diver_Address_2'] . "','" . $_GET['Diver_Tel_1'] . "','" . $_GET['Diver_Tel_2'] . "','" . $_GET['Driving_License'] . "','" . $_GET['NIC'] . "','" . $_GET['uniq'] . "')";
        $result = $conn->query($sql1);
//        echo $sql;

        $sql = "SELECT driver_master_file_code FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['driver_master_file_code'];
        $no2 = $no + 1;
        $sql = "update invpara set driver_master_file_code = $no2 where driver_master_file_code = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "update") {
    try {
        $sql = "update customer set name = '" . $_GET['name'] . "' ,address = '" . $_GET['address'] . "' ,dob = '" . $_GET['dob'] .  "'  where cid = '" . $_GET['cid'] . "'";
        $result = $conn->query($sql);
//        cid = '" . $_GET['cid'] . "',
        echo "update";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($_GET["Command"] == "delete") {
   
        $sql = "delete from customer where cid = '" . $_GET['cid'] . "'";
        $result = $conn->query($sql);
      //  echo $sql;
        echo "delete";
   
}

?>