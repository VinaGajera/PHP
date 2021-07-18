<!DOCTYPE html>
<html>
  <head>
  <?php include('_dbconnect.php'); ?>
  <title>CMS-ADMIN&WORKER</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="frd.css">
  </head>
  <body>

    <div class="main-block">
        
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Online Complain Registration & Management System- Street-Pipe-Road</h1>
        <p>If You Forget The Password...</p>
      </div>
      <form action="" method="post">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Forget Password?</h2>
        </div>
        <div class="info">
          <input type="email" name="uemail" id="uemail" placeholder="Email">
         
        <button type="submit">Next</button>
        
      </form>
      <a style="margin:10px 0px;padding-left:500px;font-size:20px;color:#fff;" href="index.php">Back</a>
    </div>
  </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	echo $uemail=$_POST["uemail"];
	$sql="SELECT * FROM `usertb` WHERE `user_email`='$uemail'";
	$result=mysqli_query($conn,$sql);
	$numrow=mysqli_num_rows($result);
     if($numrow==1) 
     {
		header("Location:http://localhost/CMS/project/frd2_pwd.php?email=$uemail");       
	}
	else{
    echo '<script>alert("Wrong Email Id....this email can not Registered...")</script>';
	}

}
?>