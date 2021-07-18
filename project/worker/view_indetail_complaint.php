<!--go to this link=?https://fontawesome.com/icons?d=gallery&q=account---->
<html>


<body>
    <div class="wrapper">
        <div class="wrapper_inner">
            <!--sidebar start -->
            <?php include "partial/_sidebar.php"; ?>
            <!--sidebar over -->
            <!--main container-->
            <div class="main_container">
                <!--Header container start-->
                <?php include "partial/_header.php"; ?>
                <!--header End-->
                <!--work Container start-->

                <div class="container my-3" >
                      
                <h3 style="margin:20px;color:red;">Complaint Is:</h3>
                <table class="table table-borderedless mx-auto" style="width: 85%;margin-bottom:100px;">
                    <tbody>
                        <?php
                         $complaint_get_id=$_GET['cid'];                       
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
                            $recever_img=$row["recever_image"];
                            $res_c_image=$row["image"];
                            $caddress=$row["c_address"];
                            $ctype=$row["c_type"];
                            
                            $sql2="SELECT * FROM `usertb` WHERE `user_id`='$complaint_user_id'";
                            $result2=mysqli_query($conn,$sql2);
                            while($row2 = mysqli_fetch_assoc($result2))
                            {
                                $user_name=$row2["user_name"];
                                $last_name=$row2["last_name"];

                             echo'  <tr>
                            <th scope="row">Complaint Number</th>
                            <td>'.$complaint_id.'</td>
                            <th scope="row"> Complainant Name</th>
                            <td>'.ucfirst($user_name).' '.ucfirst($last_name).'</td>
                        </tr>
                        <tr>
                            <th scope="row">Complaint Type</th>
                            <td>'.ucfirst($ctype).'</td>
                            <th scope="row"> Complaint Title</th>
                            <td>'.$complaint_name.'</td>
                        </tr>
                        
                        <tr>
                            <th scope="row"> Complaint area</th>
                            <td colspan="3">'.$caddress.'</td>
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
                            <th scope="row">File(If any)</th>
                            <td colspan="3">';
                            $res_c_image=explode(" ",$res_c_image);
                            $count=count($res_c_image)-1;
                            for ($i=0; $i <$count ; ++$i) { 
                                echo '<img src="../../USER_WORK/'.$res_c_image[$i].'" alt="" style="margin:20px;" height="200px" width="200px" >';
                            }
                            echo '</td>
                        </tr>';
                        if($recever_img=="")
                            {
                                echo '<tr><td colspan="2" >No Data Upaloaed....</td></tr>';
                            }
                            else{
                                echo '<tr>
                                    <th scope="row">File(If any)</th>
                                    <td colspan="3">';
                                    $recever_img=explode(" ",$recever_img);
                                    $count=count($recever_img)-1;
                                    for ($i=0; $i <$count ; ++$i) { 
                                        echo '<img src="'.$recever_img[$i].'" alt="" style="margin:20px;" height="200px" width="200px" >';
                                    }
                                    echo '</td>
                                </tr>';
                                }
                        
                        echo '<tr>
                            <th scope="row">Action</th>
                            <td colspan="2" style="text-align:right">
                            <button type="button" class="btn btn-primary"
                            data-toggle="modal" data-target="#notifyadmin">
                            Notify Admin
                        </button>
                            
                            
                            
                            <td><button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#viewuserdetail">
                                    View User Detail
                                </button>
                                <a href="view_complaint.php" class="btn btn-primary">Back</a></td>

                        </tr>';
                        
                            }
                        }
                        ?>
                    </tbody>
                </table>





                    
                </div>
                <!--work Container over-->
            </div>
            <!--main Container over-->
            <!--footer-->

            <?php include "partial/footer.php"; ?>
        </div>
        <!--main Container-->

    </div>
     <!--1 put Modal take Action  -->
     <div class="modal fade" id="notifyadmin" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
                            }
                        ?>
                        <form action="" method="post" enctype='multipart/form-data'>
                            <div class="form-group">
                                <label for="file">Images Photo :</label>
                                <input type="file"  id="file" name="images[]" multiple required/>
                               
                                <br>Input This formate:png,jpg,jpeg
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Inform To Admin</label>
                                <textarea class="form-control" id="data" name="data" rows="3" required></textarea>
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
                    <center><img src="../../USER_WORK/'.$user_image.'" height="100px" width="100px" style="border-radius:10px;  "></center>
                        <div class="row">
                            <div class="col">
                                <label for="exampleFormControlInput1" style="color:red;font-weight:700">Complaint Number</label>
                                
                            </div>
                            
                            <div class="col" >
                                <input type="text" style="color:red;font-weight:700" readonly class="form-control-plaintext" id="staticEmail"
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
                                            value="'.$user_city.','.$user_area.'">
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
  <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $file='';
            $file_tmp='';
            $location="solveimage/";
            $data='';
            foreach($_FILES['images']['name'] as $key => $val){
                $file=$_FILES['images']['name'][$key];
                $file_tmp=$_FILES['images']['tmp_name'][$key];
                move_uploaded_file($file_tmp,$location.$file);
                $data .="solveimage/".$file." ";
            }
           // image store -> $data;
           
                    $sql="UPDATE `complain_tb` SET recever_image='$data' WHERE complaint_id=$complaint_get_id";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        echo '<script>alert("Data Updated..")</script>';
                        echo '<script> swal({
                            title: "Your Profile info Updated..",
                            icon: "success",
                            button: "Done",
                        });</script>';
                    }
                    else{
                        echo '<script>alert(" not Data Updated..")</script>';
                    }
            
                    $sender_user_id=$_SESSION['worker_id'];
                    $msg=$_POST['data'];
                    $sql="SELECT * FROM `complain_tb` WHERE `complaint_id`='$complaint_get_id'";
                    $result=mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $complaint_user_id=$row["user_id"];
                       
                            
                            $sql2="INSERT INTO `notify` ( `sender_user_id`, `complaint_id`, `sender_user_role`, `msg`, `reciver_id`, `msg_recive`, `send_msg`, `status`) VALUES('$sender_user_id', '$complaint_get_id', 'worker', '$msg', '1', 'admin', current_timestamp(), '0')";
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
        /* }
            else
            {
                echo '<script>alert("Add  this Formate .png , .jpg , .jpeg ")</script>';
            }  */      
        }       
        ?>



</body>

</html>