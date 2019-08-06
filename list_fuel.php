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

            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"/>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css"/>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

                <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
                    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

                    <!-- Include Required Prerequisites -->
                    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
                    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />

                    <!-- Include Date Range Picker -->
                    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
                    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

                    </head>

                    <style>
                        .button {

                            background-color: #4CAF50; /* Green */
                            border: none;
                            color: white;
                            padding: 8px 16px;
                            text-align: center;
                            text-decoration: none;
                            display: inline-block;
                            font-size: 13px;
                            margin: 4px 2px;
                            -webkit-transition-duration: 0.4s; /* Safari */
                            transition-duration: 0.4s;
                            cursor: pointer;
                        }



                        .button2 {
                            background-color: #337ab7; 
                            color: white; 
                            border: 2px solid #337ab7;
                        }

                        .button2:hover {
                            background-color: #204d74;
                            color: white;
                            border: 2px solid #204d74;
                        }

                        #demo {
                            width: 420px;
                            heignth: 41px;
                            padding: 15px;
                            margin: 50px auto;
                        }

                    </style>



                    <body>

                        <div class="container">


                            <br>
                                <div class="col-md-3">

                                    <div class="form-group"></div>
                                    <div class="form-group-sm">
                                        <label for="exampleCheck1">From</label>
                                        <input onkeyup="csChange();" class="form-control" value="<?php echo date('Y-m-d', strtotime(date("Y-m-d", mktime()) . " - 365 day")); ?>" type="text" id="sdate"></input><br>
                                            <label for="exampleCheck1">To</label>
                                            <input onkeyup="csChange();" class="form-control" value="<?php echo date('Y-m-d'); ?>" type="text" id="edate"></input><br>

                                                </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group"></div>
                                                    <div class="form-group-sm">
                                                        <label>Vehicle</label>

                                                        <select id="vehicle" onchange="csChange();" class="form-control input-sm">
                                                            <?php
                                                            include './connection_sql.php';

                                                            $sql2 = "select * from fuel group by vehicle_ref";




                                                            foreach ($conn->query($sql2) as $row) {


                                                                $sqlDcount = "SELECT vehicle_number FROM vehicle_master1 where vehicle_ref = '" . $row['vehicle_ref'] . "'";
                                                                $result = $conn->query($sqlDcount);
                                                                $rowVname = $result->fetch();



                                                                echo '<option value=' . $row['vehicle_ref'] . '>' . $rowVname['vehicle_number'] . '</option>';
                                                            }
                                                            ?>
                                                            <!--<option value="1">fsdg</option>-->
                                                            <!--<option value="2">fd</option>-->
                                                            <!--<option value="3">fdsfsd</option>-->

                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <br>

                                                        <div class="form-group"></div>
                                                        <div class="form-group-sm">

                                                            <input class="button button2" type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel">

                                                        </div>
                                                </div>
                                                </div>




                                                <!--                                                                                <h2> DATE AND TIME RANGE PICKER EXAMPLE </h2>
                                                                                                                                
                                                
                                                                                                                                <input type="text" id="demo" name="datefilter" value="" />-->


                                                <br>

                                                    <div class="container">
                                                        <div id="getTable">

                                                        </div>
                                                    </div>
                                                    <br>


                                                        <script>

                                                                        var tableToExcel = (function() {                                                                 var uri = 'data:application/vnd.ms-excel;base64,'
                                                                                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m,p) { return c[p]; }) }
return function(table, name) {
if (!table.nodeType) table = document.getElementById(table)
var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
window.location.href = uri + base64(format(template, ctx))
}
})()
                                                        </script>








                                                        <script>

                                                                                $(document).ready(function() {
                                                                        // Setup - add a text input to each footer cell
                                                                        $('#example tfoot th').each(function (i) {
                                                                        var title = $('#example thead th').eq($(this).index()).text();
                                                                        $(this).html('<input type="text" placeholder="Search ' + title + '" data-index="' + i + '" />');
                                                                        });
                                                                        // DataTable
                                                                        var table = $('#example').DataTable({
                                                                        scrollY:        "300px",
                                                                                scrollX:        true,
                                                                                scrollCollapse: true,
                                                                                paging:         false,
                                                                                fixedColumns:   true
                                                                        });
                                                                        // Filter event handler
                                                                        $(table.table().container()).on('keyup', 'tfoot input', function () {
                                                                        table
                                                                                .column($(this).data('index'))
                                                                                .search(this.value)
                                                                                .draw();
                                                                        });
                                                                        });
                                                        </script>




                                                        </body>
                                                        </html>
                                                        <script language="JavaScript" src="js/list_fuel.js"></script>
                                                        <script>csChange();</script>

                                                        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                                                        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                                                        <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>

<!--                                                                                            <script>
                $('#demo').daterangepicker({
                "showISOWeekNumbers": true,
                        "timePicker": true,
                        "autoUpdateInput": true,
                        "locale": {
                        "cancelLabel": 'Clear',
                                "format": "MMMM DD, YYYY @ h:mm A",
                                "separator": " - ",
                                "applyLabel": "Apply",
                                "cancelLabel": "Cancel",
                                "fromLabel": "From",
                                "toLabel": "To",
                                "customRangeLabel": "Custom",
                                "weekLabel": "W",
                                "daysOfWeek": [
                                        "Su",
                                        "Mo",
                                        "Tu",
                                        "We",
                                        "Th",
                                        "Fr",
                                        "Sa"
                                ],
                                "monthNames": [
                                        "January",
                                        "February",
                                        "March",
                                        "April",
                                        "May",
                                        "June",
                                        "July",
                                        "August",
                                        "September",
                                        "October",
                                        "November",
                                        "December"
                                ],
                                "firstDay": 1
                        },
                        "linkedCalendars": true,
                        "showCustomRangeLabel": false,
                        "startDate": 1,
                        "endDate": "December 31, 2016 @ h:mm A",
                        "opens": "center"
                });
    </script>-->