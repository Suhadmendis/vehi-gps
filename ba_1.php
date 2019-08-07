
<section>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>GET MILEAGE REPORT</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">
            <div class="box-body">
                <div class="form-group-sm">
                    <a onclick="load();" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>
                    <div class="form-group"></div>
                </div>



                <div id="msg_box"  class="span12 text-center"  ></div>

                <div class="form-group-sm">
                    <label class="col-sm-2 labelColour input-sm" >Select Vehicle Name</label>
                    <div class="col-sm-2 form-group-sm">
                        <?php
                        include './connection_sql.php';
                        echo"<select id = \"vehicle_name\"  class =\"form-control input-sm\">";
                        $sql = "select * from driver group by dfName";
                        foreach ($conn->query($sql) as $row) {
                            echo "<option >" . $row["dfName"] . "</option>";
                        }
                        echo"</select>";
                        ?>
                    </div>
                </div>
                <div class="form-group"></div>
                <div class="form-group-sm">
                    <label class="col-sm-2 labelColour input-sm" >Select Start Date</label>
                    <div class="col-sm-2 form-group-sm">

                        <input type="date" id="dtFrom" value="<?php echo date('Y-m-d'); ?>" class="form-control ">       
                    </div>
                </div>
                <div class="form-group"></div>
                <div class="form-group-sm">
                    <label class="col-sm-2 labelColour input-sm" >Select End Date</label>
                    <div class="col-sm-2 form-group-sm">

                        <input type="date" id="dtTo" value="<?php echo date('Y-m-d'); ?>" class="form-control dt">       
                    </div>
                </div>


            </div>

            <div>
                <br><br>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <b>Vehicle Report table</b>
                            </div>

                            <div id="content"></div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script src="js/report.js"></script>
