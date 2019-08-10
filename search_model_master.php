<?php
session_start();
include_once './connection_sql.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />


        <title>Search service invoice</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">


            <script language="JavaScript" src="js/search_model_master.js"></script>



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
                <td width="110" ><input type="text" size="20" id="model_ref" name="cusno" value=""  class="form-control" tabindex="1" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                <td width="200" ><input type="text" size="70" id="model" name="customername"  value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                
                
        </table>    
        <div id="filt_table" class="CSSTableGenerator">  <table width="735"   class="table table-bordered">
                <tr>
                    <th width="110">Model Ref</th>
                    <th width="200">Model</th>
                    
                    

                </tr>
                <?php
                $sql = "SELECT * from model_mas";

                
                //si_ref
                $sql = $sql . " order by model_ref limit 50";

                $stname = "";
                if (isset($_GET['stname'])) {
                    $stname = $_GET["stname"];
                }

                foreach ($conn->query($sql) as $row) {
                    $cuscode = $row['model_ref'];
                    echo "<tr>               
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['model_ref'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['model'] . "</a></td>
                             
                           </tr>";
                }
                ?>
            </table>
        </div>

    </body>
</html>
