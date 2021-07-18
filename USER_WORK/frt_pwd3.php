<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/fwdstyle.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
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
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>New Password</h5>
           		   		<input type="text" name="npwd"  id="npwd" class="input" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Confirm Password</h5>
           		    	<input type="text" class="input" name="rpwd"  id="rpwd" required>
            	   </div>
                </div><br>
                <input type="submit"  name="submit"class="btn" value="submit">
            
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/fwdmain.js"></script>
</body>
</html>
<?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['submit'])){
           
            $npwd=$_POST['npwd'];
            $rpwd=$_POST['rpwd'];
            if($npwd==$rpwd){
               $sql="SELECT `user_email`,`pwd` FROM `usertb` WHERE user_email='$get_email' AND user_role='user'";
               $result=mysqli_query($conn,$sql);
               $num=mysqli_fetch_array($result);
               if($num>0){
                    $sql="UPDATE `usertb` SET pwd='$rpwd' WHERE user_email='$get_email' AND user_role='user'";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
					
                        echo'<script> swal({
                            title: "Password Upadated..",
                            icon: "success",
                            button: "Done",
						});</script>';
                        //header("Location:http://localhost/CMS/USER_WORK/index.php");       
                        header("Location:http://localhost/USER_WORK/index.php");       
                    }
                    else{
						echo '<script>alert("Password is not Upadated...")</script>';
                        /*echo'<script> swal({
                            title: "Something is Wrong",
                            text: "Password is not Upadated..",
                            icon: "error",
                            button: "Again Fill the Data",
                        });</script>';*/
                    }
               }
            }else{
				echo '<script>alert("Password and Re-enter password Not Same...")</script>';
                /*echo'<script> swal({
                    title: "Something is Wrong",
                    text: "Password Reenter password Not Same",
                    icon: "error",
                    button: "Again Fill the Data",
                });</script>';*/
            }

        }
    }
       
?>
