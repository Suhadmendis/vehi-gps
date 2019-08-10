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

    $sql = "select * from brand_info  where brand_ref= '" . $cuscode . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {

        $ResponseXML .= "<brand_ref><![CDATA[" . $row['brand_ref'] . "]]></brand_ref>";
        $ResponseXML .= "<brand_id><![CDATA[" . $row['brand_id'] . "]]></brand_id>";
        
        
       

    }

   $ResponseXML .= "<stname><![CDATA[" . $_GET['stname'] . "]]></stname>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table class=\"table table-bordered\">
                <tr>
                    <th>Brand Ref</th>
                     <th>Brand</th>
                    
                </tr>";
    
     $sql = "Select * from brand_info where brand_ref<> ''";
// 
    if ($_GET['brand_ref'] != "") {
        $sql .= " and brand_ref like '%" . $_GET['brand_ref'] . "%'";
    }
    if ($_GET['brand_id'] != "") {
        $sql .= " and brand_id like '%" . $_GET['brand_id'] . "%'";
    }
   

    $sql .= " ORDER BY brand_ref limit 50";


    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['brand_ref'];
        $stname = $_GET["stname"];

        $ResponseXML .= "<tr>               
                               <td onclick=\"custno('$cuscode', '$stname');\">" . $row['brand_ref'] . "</a></td>
                               <td onclick=\"custno('$cuscode', '$stname');\">" . $row['brand_id'] . "</a></td>
                              
                               
                            </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
