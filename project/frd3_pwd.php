<!DOCTYPE html>
<html>
  <head>
  <title>CMS-ADMIN&WORKER</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="frd.css">
  </head>
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
        
        <input type="text" name="npwd" id="npwd" placeholder="Enter New Password">
          <input type="text" name="rpwd"  id="rpwd" placeholder="Enter Confirm Password">
         
        <button type="submit" name="submit">Submit</button>
        
      </form>
     
    </div>
  </body>
</html>
<?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['submit'])){
           
            $npwd=$_POST['npwd'];
            $rpwd=$_POST['rpwd'];
            if($npwd==$rpwd){
               $sql="SELECT `user_email`,`pwd` FROM `usertb` WHERE user_role='admin' OR user_role='worker' and user_email='$get_email'";
               $result=mysqli_query($conn,$sql);
               $num=mysqli_fetch_array($result);
               if($num>0){
                    $sql="UPDATE `usertb` SET pwd='$rpwd' WHERE user_role='admin' OR user_role='worker' and user_email='$get_email'";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                      echo '<script>alert("Password Upadated..")</script>'; 
                        
						header("Location:http://localhost/CMS/project/index.php");       
                    }
                    else{
                      echo '<script>alert("Password is not Upadated...")</script>';
                   
                    }
               }
            }else{
              echo '<script>alert("Password Re-enter password Not Same")</script>';
               
            }

        }
    }
       
?>
