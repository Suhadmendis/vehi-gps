<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT brand_code FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['brand_code'];
    $uniq = uniqid();

    $tmpinvno = "0000000" . $row["brand_code"];
    $lenth = strlen($tmpinvno);
    $no = trim("BN/") . substr($tmpinvno, $lenth - 7);

    $ResponseXML .= "<id><![CDATA[$no]]></id>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";
    
    $ResponseXML .= "</new>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction(); 
        
        $sql = "delete from brand_info where brand_ref = '" . $_GET['brand_ref'] . "'";
        $result = $conn->query($sql);

        $sql1 = "Insert into brand_info(brand_ref, brand_id, uniq)values ('" . $_GET['brand_ref'] . "','" . $_GET['brand_id'] . "','" . $_GET['uniq'] . "') ";

        $result = $conn->query($sql1);
      
        
        $sql = "SELECT brand_code FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['brand_code'];
        $no2 = $no + 1;
        $sql = "update invpara set brand_code = $no2 where brand_code = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "delete") {
   
        $sql = "delete from brand_info where brand_ref = '" . $_GET['brand_Ref'] . "'";
        $result = $conn->query($sql);
        echo "delete";
   
}