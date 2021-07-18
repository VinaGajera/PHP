<?php 
include('partial/_dbconnect.php'); 

?>
<?php
if(isset($_GET['dnid'])){
                     $n_id=$_GET['dnid'];
                     $usql="DELETE FROM `notify` WHERE `notify_id`=$n_id";
                     $uresult=mysqli_query($conn,$usql);
                     
                     header('location:shownotification.php');

                }
?>