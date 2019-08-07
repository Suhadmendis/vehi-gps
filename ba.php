
<!-- Main content -->
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Pending Hires</h3>
        </div>
        <form role="form" class="form-horizontal">
            <div class="box-body">

                <div class="form-group"style="margin-left: 15px;">
                    <a onclick="load();" class="btn btn-primary">
                        <span class="fa fa-refresh"></span> &nbsp; Refresh
                    </a>

                </div>


                <div id="msg_box"  class="span12 text-center"  >

                </div>
                <div class="col-md-7" >


                     <div id="map" style="width: 1100px; height: 500px"></div>
                </div>

                
            </div>

        </form>
    </div> 

</section>

<script src="js/view_pen.js"></script>
<script src="js/view_pend.js"></script>
<script>load();</script>


