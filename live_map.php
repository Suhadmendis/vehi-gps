
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
                    
                      <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; Reload
                    </a>

              
                </div>
                <br>
                <div id="msg_box"  class="span12 text-center"></div>
                <div class="col-md-12">


                  <!--  <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-1" for="c_code">Vehicle Ref</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="Vehicle Ref"  id="Vehicle_Ref" class="form-control  input-sm  " disabled="">
                             <input type="text" placeholder="uniq"  id="uniq" class="form-control hidden input-sm" disabled="">
                        </div>
                    </div> 
          -->


                </div>  
                </div>
            </form>
          </div>
    </div>

</section>
<script src="js/vehicle_master1.js"></script>


<script>newent();</script>
