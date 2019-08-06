<?php
session_start();
include_once './connection_sql.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />


        <title>Search Customer</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">


            <script language="JavaScript" src="js/search_vehicleinfo.js"></script>



    </head>

    <body>

        <?php if (isset($_GET['cur'])) { ?>
            <input type="hidden" value="<?php echo $_GET['cur']; ?>" id="cur" />
            <?php
        } else {
            ?>
            <input type="hidden" value="" id="cur" />
            <?php
        }
        ?>
        <table width="735"   class="table table-bordered">

            <tr>
                <?php
                $stname = "";
                if (isset($_GET['stname'])) {
                    $stname = $_GET["stname"];
                }
                ?>
<!--                <td width="24" ><input type="text" size="20" name="cusno" id="cusno" value=""  class="form-control" tabindex="1" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                <td width="24" ><input type="text" size="70" id="customername1" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                <td width="24" ><input type="text" size="70" id="customername2" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>-->
                <!--<td width="24" ><input type="text" size="70" name="customername" id="customername" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>-->
        </table>    
        <div id="filt_table" class="CSSTableGenerator">  <table width="735"   class="table table-bordered">
                <tr>
                    <th>Ink Ref.</th>
                    <th>Description</th>
                    <th>Average Cost</th>
                    <th>No. Of SQFT</th>

                </tr>
                <?php

                function generateId($id, $ref, $switch) {

                    if ($switch == "pre") {
                        $temp = substr($id, strlen($ref));
                        $id = (int) $temp;

                        return $id;
                    } else if ($switch == "post") {

                        $temp = substr("0000000" . $id, -7);
                        $id = $ref . $temp;

                        return $id;
                    }
                }

                $sql = "SELECT * from s_mas where GROUP1 = 'PRE_INK' order by STK_NO limit 50";

               

                $stname = "";
                if (isset($_GET['stname'])) {
                    $stname = $_GET["stname"];
                }

                foreach ($conn->query($sql) as $row) {
                    $cuscode = $row['STK_NO'];
                    echo "<tr>       
                              <td onclick=\"custno('$cuscode', '$stname');\">" . generateId($row['STK_NO'], "PREINK/", "post") . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['DESCRIPT'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['GROUP2'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['GROUP3'] . "</a></td>
                           
                            </tr>";
                }
                ?>
            </table>
        </div>

    </body>
</html>
