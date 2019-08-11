<section class="content">
    <script src="js/vuepkg.js" type="text/javascript"></script>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Find</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">
<!--<div id="app">
  {{ message }}
</div>-->

                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group-sm">

                 <!--    <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>

                    <a  onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; SAVE
                    </a>
                    <a onclick="edit();" class="btn btn-warning hidden btn-sm ">
                        <span class="glyphicon glyphicon-edit"></span> &nbsp; EDIT
                    </a>       
                    <a onclick="delete1();" class="btn btn-danger hidden btn-sm">
                        <span class="glyphicon glyphicon-trash"></span> &nbsp; DELETE
                    </a> -->
               <!--      <a onclick="NewWindow('search_driver_master_file.php?stname=Master', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a> -->
               
                </div>
                <br>
                <div id="msg_box"  class="span12 text-center"  ></div>


               
                    <div class="col-md-6" >
                        <div class="form-group">

                            <label class="col-sm-3 control-label" > Driver </label>
                            <div class="col-sm-5 form-group-sm">
                                <?php
                                include './connection_sql.php';
                                echo"<select id = \"txt_name\"  class =\"form-control input-sm\">";
                                $sql = "select * from driver_master_file";
                                foreach ($conn->query($sql) as $row) {
                                    echo "<option value='" . $row["driver_ref"] . "'>" . $row["driver_name"] . "</option>";
                                }
                                echo"</select>";
                                ?>
                            </div>
                            <div class="col-sm-3">
                                <input type="checkbox" id="rd"  >
                                <!-- <input type="checkbox" id="rd"  data-toggle="toggle"> -->
                              
                            </div>

                        </div>
                   
                        <div class="form-group">

                            <label class="col-sm-3 control-label" > Vehicle </label>
                            <div class="col-sm-5 form-group-sm">
                                <?php
                                include './connection_sql.php';
                                echo"<select id = \"txt_vehi\" onchange=\"getD();\"  class =\"form-control input-sm\">";
                                $sql = "select * from vehicle_master1";
                                foreach ($conn->query($sql) as $row) {
                                    echo "<option value='" . $row["Vehicle_Ref"] . "'>" . $row["Vehicle_Number"] . "</option>";
                                }
                                echo"</select>";
                                ?>
                            </div>
                            <div class="col-sm-3">
                                <input type="checkbox" id="rv" checked >
                                <!-- <input type="checkbox" id="rv" checked data-toggle="toggle"> -->
                              
                            </div>


                        </div>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    </div>

                    <div class="col-md-6" >
                        <div class="form-group well">

                           <label class="col-sm-9 control-label" > This Vehicle Curruntly Located in  </label>

                            <br><br><br>
                            <p id="di1" class="col-sm-7"></p>
                            <p id="di5" class="col-sm-7"></p>
                            <p id="di4" class="col-sm-7"></p>
                            <p id="di3" class="col-sm-7"></p>
                            <p id="di2" class="col-sm-7"></p>
                            <p id="di6" class="col-sm-7"></p>

                             </div>
                    </div>
                           


                     

                   
                   
                   <div class="form-group"></div>
                       <div class="col-sm-3">
                            <input type="text" placeholder=""  id="uniq" class="form-control hidden input-sm">
                            
                        </div>
                   
      


            </div>
        </form>
    </div>

</section>
<script src="js/find.js"></script>


<script>newent();</script>




