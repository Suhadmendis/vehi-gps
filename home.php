<?php
include './CheckCookie.php';
require_once ('connection_sql.php');
$cookie_name = "user";
if (isset($_COOKIE[$cookie_name])) {
    $mo = chk_cookie($_COOKIE[$cookie_name]);
    if ($mo != "ok") {
        header('Location: ' . "index.php");
        exit();
    }
} else {
    header('Location: ' . "index.php");
    exit();
}
$mtype = "";
include "header.php";

if (isset($_GET['url'])) {






    if ($_GET['url'] == "new_user") {
        include_once './new_user.php';
    }
    if ($_GET['url'] == "user_p") {
        include_once './user_permission.php';
    }
    if ($_GET['url'] == "change_password") {
        include_once './change_password.php';
    }

    

    //Master File
    if ($_GET['url'] == "cleaner_master") {
        include_once './cleaner_master_file.php';
    }
    if ($_GET['url'] == "vehicle_master") {
        include_once './vehicle_master1.php';
    }
    if ($_GET['url'] == "item_master") {
        include_once './item_master_file.php';
    }
    if ($_GET['url'] == "driver_master") {
        include_once './driver_master_file.php';
    }

       //GPS
    if ($_GET['url'] == "live_map") {
        include_once './live_map.php';
    }
    if ($_GET['url'] == "vehicle_master") {
        include_once './vehicle_master1.php';
    }
    if ($_GET['url'] == "item_master") {
        include_once './item_master_file.php';
    }
    if ($_GET['url'] == "driver_master") {
        include_once './driver_master_file.php';
    }

    
  


   



    if ($_GET['url'] == "create") {
        include_once './create.php';
    }
} else {

    include_once './fpage.php';
}

include_once './footer.php';
?>

</body>
</html>

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap-multiselect.js"></script>
<script  type="text/javascript">

    $(function () {




        $(document).ready(function () {
            $('#brand').multiselect();
        });


    });

</script>
<script type="text/javascript">
    $(function () {
        $('.dt').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
</script>
<?php
include './autocomple_gl.php';
?>

<!--<link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.min.css" />
<script src="js/jquery-ui-1.12.1/jquery-ui.min.js"></script> -->

<script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="js/comman.js"></script>


<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>   <!-- minified -->
<script src="plugins/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
<script src="plugins/recaptcha_4.2.0/index.php"></script>
<script>

    $(function () {




        $(document).ready(function () {
            $('#approveCombo').multiselect();
        });


    });

</script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="js/user.js"></script>




<script>
    $("body").addClass("sidebar-collapse");
</script>    

