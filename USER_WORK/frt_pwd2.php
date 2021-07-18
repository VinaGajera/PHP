<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/fwdstyle.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<script language="javascript" type="text/javascript">
	//window.history.forward();
</script>
<?php 
  include("partial/link.php");
  include("partial/_dbconnect.php");
  $get_email=$_GET['email'];?>  
<body>
	<img class="wave" src="image/fr_pwd2.jpg">
	<div class="container">
		<div class="img">
			<img src="">
		</div>
		<div class="login-content">
			<form action="" method="post">
				<img src="image/fr_pwd1.jpg">
				<h3 class="title">Forget Password?</h3>
				<h5 style="margin-left: -150px;
    margin-top: 20px;color:#1CAE64;font-weight:500">Security Question</h5>
           		<div class="input-div one">
				   
           		   <div class="i">
           		   		<i class="fa fa-question-circle"></i>
           		   </div>
					  <?php
						$sql="SELECT * FROM `usertb` WHERE user_role='user' and `user_email`='$get_email'";
						$result=mysqli_query($conn,$sql);
						while($row = mysqli_fetch_assoc($result))
                    {
						$que=$row["security_que"];
           		   echo '<div class="div">
           		   		
           		   		<input value="'.$que.'"class="input" readonly>
					  </div>';
					}
					  ?>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Answer</h5>
           		    	<input type="text" name="ans" id="ans" class="input" required> 
            	   </div>
            	</div><br>
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
	echo $ans=strtolower($_POST["ans"]);
						$sql="SELECT * FROM `usertb` WHERE `user_email`='$get_email'";
						$result=mysqli_query($conn,$sql);
						while($row = mysqli_fetch_assoc($result))
                    {
						echo $dataans=$row["sequrity_ans"];
						if($dataans==$ans) 
						{
						  // header("Location:http://localhost/CMS/USER_WORK/frt_pwd3.php?email=$get_email");       
						  header("Location:http://localhost/USER_WORK/frt_pwd3.php?email=$get_email");       
					   }
					   else{
						echo '<script>alert("Answer Not Match..")</script>';
						   /*echo'<script> swal({
							   text: "Answer Not Match..",
						   });</script>';*/
					   }
					}
				}
					  ?>
