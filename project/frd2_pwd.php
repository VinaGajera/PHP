<!DOCTYPE html>
<html>
  <head>
  <title>CMS-ADMIN&WORKER</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="frd.css">
  </head>
  <script language="javascript" type="text/javascript">
	
</script>
<?php 
 include('_dbconnect.php');
  $get_email=$_GET['email'];?>
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
        <h4>Security Question is:</h4>
        <?php
						$sql="SELECT * FROM `usertb` WHERE `user_email`='$get_email'";
						$result=mysqli_query($conn,$sql);
						while($row = mysqli_fetch_assoc($result))
                    {
						$que=$row["security_que"];
           		   echo '<div class="div">
           		   		
           		   		<input value="'.$que.'" readonly>
					  </div>';
					}
					  ?>
          <input type="text" name="ans" id="ans" placeholder="Enter Your Answer">
        <button type="submit" href="">Next</button>
        
      </form>
      <a style="margin:10px 0px;padding-left:500px;font-size:20px;color:#fff;" href="frd1_pwd.php">Back</a>
    </div>
  </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$ans=strtolower($_POST["ans"]);
						$sql="SELECT * FROM `usertb` WHERE `user_email`='$get_email'";
						$result=mysqli_query($conn,$sql);
						while($row = mysqli_fetch_assoc($result))
                    {
						$dataans=$row["sequrity_ans"];
						if($dataans==$ans) 
						{
						   header("Location:http://localhost/CMS/project/frd3_pwd.php?email=$get_email");       
					   }
					   else{
						echo '<script>alert("Answer Not Match..")</script>';
						}
					}
				}
					  ?>
