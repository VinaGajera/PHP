<?php
   include("partial/_dbconnect.php");
?>
<?php
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
     $uemail=strtolower ($_POST['loginemail']);
     $password=strtolower ($_POST['loginpwd']);
     
     //echo $uemail.$password.$ulrole;
     $sql="SELECT * FROM `usertb` WHERE `user_email`='$uemail' AND `user_role`='user'";
     $result=mysqli_query($conn,$sql);
     $numrow=mysqli_num_rows($result);
     if($numrow==1) 
     {
       
         $row=mysqli_fetch_assoc($result);
         if($password==$row['pwd'])
         {
             session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['useremail']=$uemail;
            header('Location:/USER_WORK/index.php');       
         }
         else{
            echo '<script>alert("Password Not Match....")</script>';
                 echo'<script> swal({
                     text: "password not match",
                     icon: "error",
                     button: "GO To Login",
                 });</script>';
                 header('Location:/USER_WORK/index.php');       
         }   
     }
     else{
        echo '<script>alert("This Name User can not Exist...")</script>';
        echo'<script> swal({
            text: "you Enter Wrong Data",
            icon: "error",
            button: "GO To Login",
        });</script>';
        header('Location:/USER_WORK/index.php');       
 }
}
?>