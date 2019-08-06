<script src="http://maps.google.com/maps/api/js?key=AIzaSyClBKRU9iKfSLnXVTvdv11RvKwpCrfdoQI&" type="text/javascript"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Live Map</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">
            <div class="box-body">
                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group-sm">
                    
                      <a onclick="load1();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; Reload
                    </a>


                    <a onclick="initMap();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; initMap
                    </a>
    
                    <a onclick="toggleBounce();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; toggleBounce
                    </a>

              
                </div>
                <br>
                <div id="msg_box"  class="span12 text-center"></div>
                <div class="col-md-12">



                   
                <form role="form" class="form-horizontal">
                   
                    <div class="col-md-12" >
                        <div class="form-group">

                            <label class="col-sm-1 control-label" > City List</label>
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


                            <label class="col-sm-1 control-label">Start Date</label>
                            <div class="col-sm-3">
                                <input type="date" placeholder="Start Date" id="txt_start" value="<?php echo date('Y-m-d',strtotime('-2 year')); ?>" class="form-control input-sm">
                            </div>

                            <label class="col-sm-1 control-label" >End Date</label>
                            <div class="col-sm-3">
                                <input type="date" placeholder="End Date" id="txt_end" value="<?php echo date('Y-m-d'); ?>" class="form-control input-sm">
                            </div>  
                        </div>
                    </div>
                   
                 




                    
                      


                            <div id="map1" class="col-md-12" style="height: 600px;"></div>
                        

                  

                </form>




             <!--      <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#content1">All Vehicles</a></li>
                    <li><a data-toggle="tab" href="#content2">Reports</a></li>
                    <li><a data-toggle="tab" href="#content3">BackTrack</a></li>
                    <li><a data-toggle="tab" href="#content4">Drivers</a></li>
                </ul>

                <div class="tab-content">
                    <div id="content1" class="tab-pane fade in active">
                      
                        <?php
                      //  include './ba.php';
                        ?>
                    </div>
                    <div id="content2" class="tab-pane fade">
                       <?php
//include './ba_1.php';
                        ?>
                    </div>
                    <div id="content3" class="tab-pane fade">
                       
                    </div>
                    <div id="content4" class="tab-pane fade">
                        <?php
                      //  include './ba_3.php';
                        ?>
                    </div>
                </div> -->

                </div>  
                </div>
            </form>
          </div>
    </div>

</section>
<!-- <script src="js/vehicle_master1.js"></script> -->


<!-- <script>newent();</script> -->
 
<script src="js/backTracks.js"></script>
<script>load1();</script>
