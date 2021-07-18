<?php 
include('partial/_dbconnect.php'); 

?>
<?php
     if(isset($_GET['uid'])){
                     $u_id=$_GET['uid'];
                     $dsql="DELETE FROM `usertb` WHERE `user_id`=$u_id";
                     $dresult=mysqli_query($conn,$dsql);
                     $nsql="DELETE FROM `notify` WHERE `sender_user_id`=$u_id";
                     $nresult=mysqli_query($conn,$nsql);
                     header('location:manageuser.php');

                }

                if(isset($_GET['wid'])){
                    $w_id=$_GET['wid'];
                    $wsql="DELETE FROM `usertb` WHERE `user_id`=$w_id";
                    $dresult=mysqli_query($conn,$wsql);
                    $nsql="DELETE FROM `notify` WHERE `sender_user_id`=$w_id";
                     $nresult=mysqli_query($conn,$nsql);
                    header('location:manageworker.php');
                    

               }
?>