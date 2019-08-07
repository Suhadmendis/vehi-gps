
        <form role="form" class="form-horizontal">
            <div class="col-md-12" >
                <div class="form-group">
                    <label class="col-sm-3 control-label" > City List</label>
                    <div class="col-sm-3 form-group-sm">
                        <?php
                        include './connection_sql.php';
                        echo"<select id = \"txt_name\"  class =\"form-control input-sm\">";
                        $sql = "select * from driver group by dfName";
                        foreach ($conn->query($sql) as $row) {
                            echo "<option >" . $row["dfName"] . "</option>";
                        }
                        echo"</select>";
                        ?>
                    </div>
                </div>


            </div>
            <div class="col-md-12" >
                <div class="form-group">
                    <label class="col-sm-3 control-label">Start Date</label>
                    <div class="col-sm-3">
                        <input type="date" placeholder="Start Date" id="txt_start" value="<?php echo date('Y-m-d'); ?>" class="form-control input-sm">
                    </div>

                    <label class="col-sm-1 control-label" >End Date</label>
                    <div class="col-sm-3">
                        <input type="date" placeholder="End Date" id="txt_end" value="<?php echo date('Y-m-d'); ?>" class="form-control input-sm">
                    </div>  
                </div>
            </div>
            <div style="margin-left: 30px;">
                <div class="form-group" >
                    <a onclick="load1();" class="btn btn-primary">
                        <span class="fa fa-refresh"></span> &nbsp; Refresh
                    </a>

                </div>
            </div>
            <div class="box-body" >




                <div id="msg_box"  class="span12 text-center"  >

                </div>
                <div class="col-md-7" >


                    <div id="map1" style="width: 1550px; height: 600px"></div>
                </div>


            </div>

        </form>
 
<script src="js/backTracks.js"></script>
<script>load1();</script>


