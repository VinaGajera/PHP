<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include("partial/_dbconnect.php"); 

include("partial/link.php");
//$sender_user_id=$_SESSION['user_id'];
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
                <div class="jumbotron jumbotron-fluid" style="width: 90%;margin-left:50px;">
                    <div class="container">
                        <h3 style="font-wight:500;color:red;padding-bottom:20px">Check Officer Work</h3>
                    <table class="table table-borderedless mx-auto" style="width: 75%;">
                        <?php
                    $sql="SELECT * FROM `complain_tb` WHERE `complaint_id`=$complaint_get_id";
                    $result=mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $complaint_id=$row["complaint_id"];
                        $complaint_name=$row["complaint_title"];
                        $complaint_dis=$row["complaint_discription"];
                        $complaint_ctimestamp=$row["ctimestamp"];
                        $date=date_create($complaint_ctimestamp);
                        $worker_id=$row["user_worker_id"];
                        $res_c_image=$row["image"];
						$c_type=$row["c_type"];
                        $solve_image=$row["recever_image"];
						$c_address=$row["c_address"];
                        $sql2="SELECT * FROM `usertb` WHERE `user_id`='$worker_id'";
                        $result2=mysqli_query($conn,$sql2);
                        while($row2 = mysqli_fetch_assoc($result2))
                        {
                            $name1=ucfirst($row2["user_name"]);
                            $name2=ucfirst($row2["last_name"]);
                            $worker_name=$name1.' '.$name2;

                             echo'  <tr>
                            <th scope="row">Complaint Number</th>
                            <td>'.$complaint_id.'</td>
                            <th scope="row" style="color:red;"> Worker Name</th>
                            <td style="color:red;">'.$worker_name.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Complainant Type</th>
                            <td style="font-weight:900;">'.ucfirst($c_type).'</td>
                            <th scope="row"> Complainant Title</th>
                            <td>'.$complaint_name.'</td>
                        </tr>
                        
                        <tr>
                            <th scope="row"> Compaint Detail</th>
                            <td colspan="3">'.$complaint_dis.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Complaint Time</th>
                            <td colspan="3">'.date_format($date, 'g:ia \o\n l jS F Y').'</td>
                        </tr>
						<tr>
                            <th scope="row">Address</th>
                            <td colspan="3">'.$c_address.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Actual Problem Image</th>
                            <td colspan="3">';
                            $res_c_image=explode(" ",$res_c_image);
                            $count=count($res_c_image)-1;
                            for ($i=0; $i <$count ; ++$i) { 
                                if($i==2)
                                    echo '<br>';
                                echo '<img src="../../USER_WORK/'.$res_c_image[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                            }
                            echo '</td>
                        </tr>';

//recomplaint user image
                    $sqlr="SELECT * FROM `recomplaint_tb` WHERE c_id=$complaint_get_id";
                    $resultr=mysqli_query($conn,$sqlr);
                    while($rowr = mysqli_fetch_assoc($resultr))
                    {
                        $row_cnt = mysqli_num_rows($result);
                          if($row_cnt==1)
                          {
                            echo'  <tr>
                                <th scope="row">User Recomplaint Image</th>
                                <td colspan="3">';
                                
                                    $rimg=$rowr["user_send_image"];
                                    $rimg=explode(" ",$rimg);
                                    $count=count($rimg)-1;
                                    for ($i=0; $i <$count ; ++$i) { 
                                        if($i==2)
                                            echo '<br>';
                                        echo '<img src="../../USER_WORK/'.$rimg[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                                    }
                                
                                echo '</td>
                                </tr>';
                          }else{
                              
                          }
                    }
                        
                     echo '   <tr>
                            <th scope="row" style="color:red;">Officer Problem  Solve Image</th>
                            <td colspan="3">';
                            $solve_image=explode(" ",$solve_image);
                            $count=count($solve_image)-1;
                            if($count==0){
                                echo 'No Data Uploaded to Officer Side...';
                            }else
                            {
                                for ($i=0; $i <$count ; ++$i) { 
                                    if($i==4)
                                    echo '<br>';
                                    echo '<img src="../worker/'.$solve_image[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                                }
                            }
                            echo '</td>
                        </tr>';

 //recomplaint worker image
                        $sqlr="SELECT * FROM `recomplaint_tb` WHERE c_id=$complaint_get_id";
                        $resultr=mysqli_query($conn,$sqlr);
                        while($rowr = mysqli_fetch_assoc($resultr))
                        {
                          $row_cnt = mysqli_num_rows($result);
                          if($row_cnt==1)
                          {
                       
                             echo'  <tr>
                            <th scope="row">Officer Solve Recomplain</th>
                            <td colspan="3">';
                         
                                $rimg=$rowr["recomplain_solve_image"];
                                $rimg=explode(" ",$rimg);
                                $count=count($rimg)-1;
                                if($count==0){
                                    echo 'No Data Uploaded to Officer Side...';
                                }else
                                {
                                    for ($i=0; $i <$count ; ++$i) { 
                                        if($i==2)
                                            echo '<br>';
                                        echo '<img src="../worker/'.$rimg[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                                    }
                                }
                            echo '</td>
                            </tr>';
                        }
                        else{

                        }
                      }
           


                     
                                       
                                    
                        }
                    }


                
                
                ?>
                </tbody>
                </table>
</div>
                                    </div>



                        <div class="container mt-3 mx-5 mb-3">
                            <div class="container" style="width: 80%;">
                                <div class="jumbotron pt-4 pb-4">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="msg">Message to Officer</label>
                                            <textarea class="form-control" id="msg" name="msg" rows="3"></textarea>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success">Notify</button>
                                        <button type="clear" name="clear" class="btn btn-danger">Clear</button>
                                        <a href="runningprocess.php" class="btn btn-primary">Back</a>
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
    
     echo $sender_user_id=$_SESSION['admin_id'];
    if($_SERVER["REQUEST_METHOD"]=="POST"){
            //Retrive Dropdown list data dynamically
            $msg=$_POST['msg']; 

            $sql="SELECT * FROM `complain_tb` WHERE `complaint_id`=$complaint_get_id";
            $result=mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result))
            {
                 echo $worker_id=$row["user_worker_id"];
                $sql2="INSERT INTO `notify` ( `sender_user_id`, `complaint_id`, `sender_user_role`, `msg`, `reciver_id`, `msg_recive`, `send_msg`, `status`) VALUES('$sender_user_id', '$complaint_get_id', 'admin', '$msg', '$worker_id', 'worker', current_timestamp(), '0')";
                
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