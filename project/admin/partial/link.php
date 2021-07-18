<head>
    <meta charset="utf-8">
    <script language="javascript" type="text/javascript">
	window.history.forward();
</script>    
<title>
<?php    
    //$nsql="select * FROM `notify` WHERE `status`=0";
    //$nsql="SELECT * FROM `notify` WHERE `status`=0 AND `user_role`='user' OR `user_role`='worker'";
    $nsql="SELECT * FROM `notify` WHERE (`sender_user_role`='user' OR `sender_user_role`='worker') AND status=0";
    $nresult=mysqli_query($conn, $nsql);
    $ncount= mysqli_num_rows($nresult);
    echo '('.$ncount.')';

?>Admin Side</title>
   <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
   <link rel="stylesheet" href="css/datatables.min.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
 <!-- <script src="js/bootstrap.min.js"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/datatables.min.js"></script>
</head>