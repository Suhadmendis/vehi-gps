
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Model Master File</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">
            <div class="box-body">
                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group-sm">
                    
                      <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>

                    <a  onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; SAVE
                    </a>
                    <a onclick="NewWindow('search_model_master.php?stname=Master', 'mywin', '800', '700', 'yes', 'center');" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-search"></span> &nbsp; FIND
                    </a>      
                    <a onclick="delete1();" class="btn btn-danger hidden btn-sm">
                        <span class="glyphicon glyphicon-trash"></span> &nbsp; DELETE
                    </a>
                </div>
                <br>
                <div id="msg_box"  class="span12 text-center"></div>
                <div class="col-md-12">


                   <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-1" for="c_code">Model Ref</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="Model Ref"  id="model_ref" class="form-control  input-sm" disabled="">
                             <input type="text" placeholder="uniq"  id="uniq" class="form-control hidden input-sm" disabled="">
                        </div>
                    </div> 

                    
                     <div class="form-group"></div>
                    <div class="form-group-sm">
                        <label class="col-sm-1" for="c_code">Model</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="Model"  id="model" class="form-control  input-sm" >
                            
                        </div>
                    </div> 
                                                    
                


                </div>  
                </div>
            </form>
          </div>
    </div>

</section>
<script src="js/model_master.js"></script>


<script>newent();</script>
