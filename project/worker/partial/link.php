<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width,initial-scale.0">
    <title>
   <?php if(isset($_SESSION['loginworker']) && $_SESSION['loginworker']==true) 
                            { 
                            $wsid=$_SESSION['worker_id'];
                            
                            $nsql="select * from notify where (`sender_user_role`='admin'|| `sender_user_role`='user') AND reciver_id='$wsid' AND status=0";
                            $nresult=mysqli_query($conn, $nsql);
                            $ncount= mysqli_num_rows($nresult);
                            echo '('.$ncount.')';
                            }
   ?>                        
  Worker Data
    </title>
    <script language="javascript" type="text/javascript">
	window.history.forward();
</script>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital@1&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="partial/fontawesome.js"></script>
    <script src="bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    
    
</head>