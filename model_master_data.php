<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT model_code FROM invpara";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['model_code'];
    $uniq = uniqid();

    $tmpinvno = "0000000" . $row["model_code"];
    $lenth = strlen($tmpinvno);
    $no = trim("MDL/") . substr($tmpinvno, $lenth - 7);

    $ResponseXML .= "<id><![CDATA[$no]]></id>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";
    
    $ResponseXML .= "</new>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction(); 
        
        $sql = "delete from model_mas where model_ref = '" . $_GET['model_ref'] . "'";
        $result = $conn->query($sql);

        $sql1 = "Insert into model_mas(model_ref, model, uniq)values ('" . $_GET['model_ref'] . "','" . $_GET['model'] . "','" . $_GET['uniq'] . "') ";

        $result = $conn->query($sql1);
      
        
        $sql = "SELECT model_code FROM invpara";
        $result = $conn->query($sql);
        $row = $result->fetch();
        $no = $row['model_code'];
        $no2 = $no + 1;
        $sql = "update invpara set model_code = $no2 where model_code = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "delete") {
   
        $sql = "delete from model_mas where model_ref = '" . $_GET['model_ref'] . "'";
        $result = $conn->query($sql);
        echo "delete";
   
}