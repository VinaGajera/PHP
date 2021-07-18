<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include("partial/_dbconnect.php"); 
session_start();
include("partial/link.php");
?>


<body>

    <?php
                                        $complaint_get_id=$_GET['cid'];
                                       ?>
    <!--wrapper start-->
    <div class="wrapper">
        <!--header menu start-->
        <?php include("partial/header.php");?>
        <!--sidebar end-->
        <!--main container start-->
        <div class="main-container">
            <!--Not Process Complete part start-->
            <div class="notprocess">
                <div class="container mt-3 mx-5 mb-3">

                    <div class="container" style="width: 80%;">
                        <div class="jumbotron pt-4 pb-4">
                            <form action="" method="post" >
                                <div class="form-group ">
                                    <label for="worker">Select Worker :</label>
                                    <select id="sworker" name='sworker' class="form-control">
                                        <option selected>Choose...</option>
                                        <?php
                                        /* $sql3="SELECT usertb.user_name FROM usertb INNER JOIN complain_tb ON usertb.user_id = complain_tb.user_worker_id WHERE complain_tb.complete=1";
                                                $result3=mysqli_query($conn,$sql3);
                                            while($row3 = mysqli_fetch_assoc($result3))
                                            {
                                                $user_name=$row3["user_name"];
                                                        echo '<option value='.$user_name.'><b>'.
                                                        $user_name.'</b></option>';
                                               
                                            }
                                            $sql4="SELECT user_id,user_name FROM usertb WHERE user_role='worker' AND user_id NOT IN (SELECT user_worker_id FROM complain_tb)";
                                            $result4=mysqli_query($conn,$sql4);
                                            while($row4 = mysqli_fetch_assoc($result4))
                                            {
                                                if($row3["user_name"]==$row4["user_name"])
                                                {
                                                    
                                                } else{
                                                    $user_name=$row4["user_name"];
                                                    echo '<option value='.$user_name.'><b>'.
                                                    $user_name.'</b></option>';
                                                }     
                                            }*/
                                            
                                            $sql4="SELECT user_id,user_name FROM usertb WHERE user_role='worker'";
                                            $result4=mysqli_query($conn,$sql4);
                                            while($row4 = mysqli_fetch_assoc($result4))
                                            {
                                                
                                                    $user_name=$row4["user_name"];
                                                    echo '<option value='.$user_name.'><b>'.
                                                    $user_name.'</b></option>';
                                                  
                                            }
                                        
                                                                                      
                                         ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="msg">Message to Officer</label>
                                    <textarea class="form-control" id="msg"  name="msg" rows="3"></textarea>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success">Notify</button>
                                <button type="clear" name="clear" class="btn btn-danger">Clear</button>
                               <?php
                               echo ' <a href="complaindetailpadding.php?complaintid='.$complaint_get_id.'" class="btn btn-primary">Back</a>';
                               ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--main container end-->

    </div>
    <!--wrapper end-->
    <?php
    
    //this way to print data on console echo '<script>console.log("'.$Select_name.'"); </script>'; 
    
    $sender_user_id=$_SESSION['admin_id'];
    if ( isset( $_POST['submit'] ) ) {
            //Retrive Dropdown list data dynamically
            $msg=$_POST['msg']; 
            $select_wname=$_POST['sworker'];
            echo '<script>console.log("'.$select_wname.'"); </script>';
            $sql="SELECT `user_id` FROM `usertb` WHERE `user_name`='$select_wname'";
            $result=mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result))
            {
                $recever_user_id=$row["user_id"];
                echo '<script>console.log("'.$recever_user_id.'"); </script>';
                $sql3="UPDATE `complain_tb` SET user_worker_id=$recever_user_id WHERE complaint_id=$complaint_get_id";
                $result3=mysqli_query($conn,$sql3);
                $sql2="INSERT INTO `notify` ( `sender_user_id`, `complaint_id`, `sender_user_role`, `msg`, `reciver_id`, `msg_recive`, `send_msg`, `status`) VALUES('$sender_user_id', '$complaint_get_id', 'admin', '$msg', '$recever_user_id', 'worker', current_timestamp(), '0')";
                //$sql2="INSERT INTO `notify` (`sender_user_id`, `complaint_id`, `sender_user_role`, `msg`, `reciver_id`, `msg_recive`,`send_msg`, `status`) VALUES ('$sender_user_id', '$complaint_get_id', 'admin', '$msg','$recever_user_id', 'worker', current_timestamp(), '0')";                                    
                $result2=mysqli_query($conn,$sql2);
                if($result2)
                {
                    echo'<script> swal({
                        
                        text: "Your Notification Send",
                        icon: "success",
                        button: "Ok",
                    });</script>';
                }else{
                    echo'<script> swal({
                        
                        text: "Some Problem in data",
                        icon: "error",
                        button: "Try to next time",
                    });</script>';
                }
            }   
   }
    ?>

    <?php include("partial/footer.php"); ?>
</body>

</html>