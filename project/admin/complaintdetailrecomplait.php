<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include("partial/_dbconnect.php"); 
include("partial/link.php");
?>
<style>
th {
    color: red;
}
</style>

<body>

    <!--wrapper start-->
    <div class="wrapper">
        <!--header menu start-->
        <?php include("partial/header.php");?>
        <!--sidebar end-->
        <!--main container start-->
        <div class="main-container">
            <div class="container my-3">
            <?php
            $complaint_get_id=$_GET['complaintid']; 
            $sql="SELECT * FROM `recomplaint_tb` WHERE c_id=$complaint_get_id";
            if ($result=mysqli_query($conn,$sql))
            {
                $row_cnt = mysqli_num_rows($result);
                if($row_cnt==1)
                    echo '<h3 style="font-wight:500;color:red;padding:20px">This Complaint is ReComplaint </h3>';
                else
                echo '<h3 style="font-wight:500;color:green;padding:20px">This Complaint is Complete</h3>';
   
           
            }

           
              ?>
                <table class="table table-borderedless mx-auto" style="width: 75%;">
                   
                <tbody>
                        <?php
                        
                        $sql="SELECT * FROM `complain_tb` WHERE `complaint_id`='$complaint_get_id'";
                        $result=mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $complaint_id=$row["complaint_id"];
                            $complaint_name=$row["complaint_title"];
                            $complaint_dis=$row["complaint_discription"];
                            $complaint_ctimestamp=$row["ctimestamp"];
                            $date=date_create($complaint_ctimestamp);
                            $complaint_user_id=$row["user_id"];
                            $cpadding=$row["padding"];
                            $crunning=$row["running"];
                            $complete=$row["complete"];    
                            $res_c_image=$row["image"];
                            $c_type=$row["c_type"];
                            $solve_image=$row["recever_image"];
                            $c_address=$row["c_address"];
                            $sql2="SELECT * FROM `usertb` WHERE `user_id`=$complaint_user_id";
                            $result2=mysqli_query($conn,$sql2);
                            while($row2 = mysqli_fetch_assoc($result2))
                            {
                                $name1=ucfirst($row2["user_name"]);
                            $name2=ucfirst($row2["last_name"]);
                            $user_name=$name1.' '.$name2;

                      echo'  <tr>
                            <th scope="row">Complaint Number</th>
                            <td>'.$complaint_id.'</td>
                            <th scope="row"> Complainant Name</th>
                            <td>'.$user_name.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Category</th>
                            <td style="font-weight:900;">'.ucfirst($c_type).'</td>
                            <th scope="row"> Complainant Title</th>
                            <td>'.$complaint_name.'</td>
                        </tr>
                        <tr>
                            <th scope="row">Address</th>
                            <td colspan="3">'.$c_address.'</td>
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
                            <th scope="row">Actual Problem Image</th>
                            <td colspan="3">';
                            $res_c_image=explode(" ",$res_c_image);
                            $count=count($res_c_image)-1;
                            for ($i=0; $i <$count ; ++$i) { 
                                if($i==4)
                                    echo '<br>';
                                echo '<img src="../../USER_WORK/'.$res_c_image[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                            }
                            echo '</td>
                        </tr>';
                        
                            //if recomplalaint than display
                            $sqlr="SELECT * FROM `recomplaint_tb` WHERE c_id=$complaint_get_id";
                            $resultr=mysqli_query($conn,$sqlr);
                            while($rowr = mysqli_fetch_assoc($resultr))
                            {
                                $row_cnt = mysqli_num_rows($result);
                                  if($row_cnt==1)
                                  {
                                    echo' <hr> <tr>
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
                           
                        echo '<tr>
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
                        }
                        $r_user_id=$row["user_worker_id"];
                            $sql2="SELECT * FROM `usertb` WHERE `user_id`=$r_user_id";
                            $result2=mysqli_query($conn,$sql2);
                            while($row2 = mysqli_fetch_assoc($result2))
                            {
                                $user_name=$row2["user_name"];
                                $last_name=$row2["last_name"];
                                $user_contact=$row2["contact"];
                                echo '<tr>
                            <th style="font-weight:900;" scope="row">Worker Name</th>
                            <td style="font-weight:900;">'.ucfirst($user_name).' '.ucfirst($last_name).'</td>
                            <th  style="font-weight:900;" scope="row">Worker Contact No</th>
                            <td style="font-weight:900;" >'.$user_contact.'</td>
                        </tr>';
                            }

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
 
                        
                        echo '<tr>
                            <th scope="row"> File Status</th>
                            <td colspan="3">Work Complete</td>
                        </tr>
                        <tr>
                            
                            <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#viewuserdetail">
                                    View User Detail
                                </button>';
                                $rsql="select complain_tb.complaint_id,recomplaint_tb.c_id FROM recomplaint_tb inner join complain_tb on recomplaint_tb.c_id=complain_tb.complaint_id";
                                $r=mysqli_query($conn,$rsql);
                                while($rrow = mysqli_fetch_assoc($r))
                   {
                       $r_id=$rrow["complaint_id"];
                       if($r_id==$complaint_id)
                       {
                        echo '<td style="text-align:right"> <button type="button" class="btn btn-danger"
                        data-toggle="modal" data-target="#staticBackdrop">
                        Take Action
                    </button>';
                    } }
                                echo '&nbsp;<a href="recomplaint.php" class="btn btn-primary">Back</a>
                               </td>
                                
                        </tr>';
                            
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

 <!-- Modal take Action  -->
 <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Change Complaint Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $sql="SELECT * FROM `complain_tb` WHERE `complaint_id`='$complaint_get_id'";
                        $result=mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $complaint_id=$row["complaint_id"];
                            
                        echo'<div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleFormControlInput1">Complaint Number</label>
                                        <!--<input class="form-control" type="text" placeholder="Readonly input here..." readonly>-->
                                    </div>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                            value="'.$complaint_id.'">
                                    </div>
                                </div>
                            </div>';
                    }?>
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlSelect1"> ChangeStatus</label>
                                </div>
                                <div class="col">
                                    <input type="checkbox" class="form-check-input" id="inprocess" name="inprocess" value="1" checked>
                                    <label class="form-check-label" for="defaultCheck1"> Complete the process
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Inform To User</label>
                            <textarea class="form-control" id="data" name="data" rows="3"></textarea>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        
                    </form>
                </div>
            </div>
        </div>

    </div>




        <!--view user Detal modal-->
        <div class="modal fade" id="viewuserdetail" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">User Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    $sql="SELECT * FROM `complain_tb` WHERE `complaint_id`='$complaint_get_id'";
                        $result=mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $complaint_user_id=$row["user_id"];
                            $sql2="SELECT * FROM `usertb` WHERE `user_id`=$complaint_user_id";
                            $result2=mysqli_query($conn,$sql2);
                            while($row2 = mysqli_fetch_assoc($result2))
                            {
                                $user_name=$row2["user_name"];
                                $last_name=$row2["last_name"];
                                $user_email=$row2["user_email"];
                                $user_image=$row2["user_image"];
                                $user_city=$row2["user_city"];
                                $user_contact=$row2["contact"];
                                $user_area=$row2["user_area"];
                                $user_piccode=$row2["user_pincode"];
                    echo '<div class="modal-body">
                    <center><img src="../../USER_WORK/'.$user_image.'" alt="" height="100px" width="100px" style="
                    border-radius:50%;
                    margin:20px 0px; 
                    "></center>
                        <div class="row">
                    
                            <div class="col">
                                <label for="exampleFormControlInput1" style="color:red;font-weight:700;">Complaint Number</label>
                                
                            </div>
                            
                            <div class="col">
                                <input type="text" readonly style="color:red;font-weight:700;" class="form-control-plaintext" id="staticEmail"
                                    value="'.$complaint_id.'">
                            </div>
                        </div>
                        <div class="row">
                                    <div class="col">
                                        <label for="exampleFormControlInput1">Complaintant Name</label>
                                        <!--<input class="form-control" type="text" placeholder="Readonly input here..." readonly>-->
                                    </div>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                            value="'.ucfirst($user_name).' '.ucfirst($last_name).'">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleFormControlInput1">Complaintant Email</label>
                                        <!--<input class="form-control" type="text" placeholder="Readonly input here..." readonly>-->
                                    </div>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                            value="'.$user_email.'">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleFormControlInput1">Complaintant Contact No</label>
                                        <!--<input class="form-control" type="text" placeholder="Readonly input here..." readonly>-->
                                    </div>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                            value="'.$user_contact.'">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleFormControlInput1">Complaintant Address</label>
                                        <!--<input class="form-control" type="text" placeholder="Readonly input here..." readonly>-->
                                    </div>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                            value="'.ucfirst($user_city).','.ucfirst($user_area).'">
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleFormControlInput1">Complaintant Pincode</label>
                                        <!--<input class="form-control" type="text" placeholder="Readonly input here..." readonly>-->
                                    </div>
                                    <div class="col">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                            value="'.$user_piccode.'">
                                    </div>
                                </div>';
                            }
                        }
                        ?>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>




    </div>
    <?php include("partial/footer.php"); ?>

</body>

</html>

<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        //console.log($uemail=$_POST['loginu']);
        $inprocess=$_POST['inprocess'];
        if($inprocess==1)
        {
            echo '<script>console.log("hello"); </script>';
            $sql="UPDATE complain_tb SET padding=0,running=0,complete=1 WHERE complaint_id=$complaint_id";
            if (mysqli_query($conn, $sql)) {
                echo '<script>console.log("Record updated successfully"); </script>';
              } else {
                echo '<script>console.log("Error updating record:"); </script>';
              }
        }

        
                $sender_user_id=$_SESSION['admin_id'];
                $msg=$_POST['data'];
                $sql="SELECT * FROM `complain_tb` WHERE `complaint_id`='$complaint_get_id'";
                $result=mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    $complaint_user_id=$row["user_id"];
                    $sql2="SELECT * FROM `usertb` WHERE `user_id`=$complaint_user_id";
                    $result2=mysqli_query($conn,$sql2);
                    while($row2 = mysqli_fetch_assoc($result2))
                    {
                        $recever_user_id=$row2["user_id"];
                        $sql3="INSERT INTO `notify` ( `sender_user_id`, `complaint_id`, `sender_user_role`, `msg`, `reciver_id`, `msg_recive`, `send_msg`, `status`) VALUES
                        ('$sender_user_id', '$complaint_get_id', 'admin', '$msg', '$recever_user_id', 'user', current_timestamp(), '0')";
                   
                    $result3=mysqli_query($conn,$sql3);
                    if($result3)
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
    }
    else
    {
        echo '<script>console.log(" not hello"); </script>';
    }

        
  
        
?>
