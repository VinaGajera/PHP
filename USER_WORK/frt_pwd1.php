<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/fwdstyle.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php 
  include("partial/link.php");
  include("partial/_dbconnect.php");?>  
</head>
<body>
	<img class="wave" src="image/fr_pwd2.jpg">
	<div class="container">
		<div class="img">
			
		</div>
		<div class="login-content">
			<form action="" method="post">
				<img src="image/fr_pwd5.png">
                <h3 class="title">Forget Password?</h3>
                
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email-id</h5>
           		   		<input type="email" name="uemail" id="uemail"  class="input" required>
           		   </div>
           		</div>
           		<a href="user_login.php">Back</a>
				   <input type="submit" style="border-radius:25px;" class="btn" value="Next">
            	
            	
            	</form>
        </div>
    </div>
    <script type="text/javascript" src="js/fwdmain.js"></script>
</body>
</html>
<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	echo $uemail=$_POST["uemail"];
	$sql="SELECT * FROM `usertb` WHERE user_role='user' and `user_email`='$uemail'";
	$result=mysqli_query($conn,$sql);
	$numrow=mysqli_num_rows($result);
     if($numrow==1) 
     {
		//header("Location:CMS/USER_WORK/frt_pwd2.php?email=$uemail");       
		header("Location:frt_pwd2.php?email=$uemail");       
	}
	else{
	echo '<script>alert("Wrong Email Id....this email can not Registered...")</script>';
		/*echo'<script> swal({
			text: "Email id does Not Match...",
			icon: "error",
			
		});</script>';*/
	}
}
?>
