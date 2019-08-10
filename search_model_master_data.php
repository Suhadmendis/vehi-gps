<?php

session_start();



include_once './connection_sql.php';

if ($_GET["Command"] == "pass_quot") {

    $_SESSION["custno"] = $_GET['custno'];

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $cuscode = $_GET["custno"];

    $sql = "select * from model_mas where model_ref= '" . $cuscode . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {

        $ResponseXML .= "<model_ref><![CDATA[" . $row['model_ref'] . "]]></model_ref>";
        $ResponseXML .= "<model><![CDATA[" . $row['model'] . "]]></model>";
        
        
       

    }

   $ResponseXML .= "<stname><![CDATA[" . $_GET['stname'] . "]]></stname>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table class=\"table table-bordered\">
                <tr>
                     <th>Model Ref</th>
                     <th>Model</th>
                    
                </tr>";
    
     $sql = "Select * from model_mas where model_ref<> ''";
// 
    if ($_GET['model_ref'] != "") {
        $sql .= " and model_ref like '%" . $_GET['model_ref'] . "%'";
    }
    if ($_GET['model'] != "") {
        $sql .= " and model like '%" . $_GET['model'] . "%'";
    }
   

    $sql .= " ORDER BY model_ref limit 50";


    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['model_ref'];
        $stname = $_GET["stname"];

        $ResponseXML .= "<tr>               
                               <td onclick=\"custno('$cuscode', '$stname');\">" . $row['model_ref'] . "</a></td>
                               <td onclick=\"custno('$cuscode', '$stname');\">" . $row['model'] . "</a></td>
                              
                               
                            </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
