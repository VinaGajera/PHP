<?php 
include("partial/_dbconnect.php");
include("partial/link.php");
session_start();
?>
<body>

    <div class="wrapper">
        <!--navigation bar start-->
        <?php include("partial/header.php"); ?>
        <!--navigation bar end-->
        <!--Work area start-->

        <div class="notprocess" style="margin-top:100px" >
                
                    
                        <h3 style="font-wight:500;color:red;padding-left:40%;font-weight:800;">Are you Sure to Recomplaint....</h3>
                    
                        <?php
                        $complaint_get_id=$_GET['cid'];
                         if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) 
                         {
                            $uemail=$_SESSION['useremail'];
                            $uid=$_SESSION['user_id'];
                           
                    $sql="SELECT * FROM `complain_tb` WHERE `complaint_id`=$complaint_get_id";
                    $result=mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $complaint_id=$row["complaint_id"];
                        $complaint_name=$row["complaint_title"];
                        $c_type=$row["c_type"];
                        $complaint_dis=$row["complaint_discription"];
                        $complaint_ctimestamp=$row["ctimestamp"];
                        $date=date_create($complaint_ctimestamp);
                        $res_c_image=$row["image"];
                        $solve_image=$row["recever_image"];

                          echo'  
                             <div class="jumbotron " style="width: 90%;margin-left:50px; margin-top:1%;"><tr>
                             <table class="table table-borderedless mx-auto" style="width: 75%;">
                             <th scope="row">Complaint Number</th>
                            <td>'.$complaint_id.'</td>
                            <th scope="row">Category</th>
                            <td>'.$c_type.' Related Problem</td>
                        </tr>
                        <tr>
                            <th scope="row"> Complainant Title</th>
                            <td colspan="3">'.$complaint_name.'</td>
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
                                /*<img src="../../USER_WORK/'.$res_c_image.'" alt="" height="100px" width="100px" ></td>*/
                                echo '<img src="../../USER_WORK/'.$res_c_image[$i].'" alt="" style="margin:20px;" height="50px" width="50px" >';
                            }
                           echo'
                        </tr>';
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
                                echo '<img src="../project/worker/'.$solve_image[$i].'" alt="" style="margin:20px;" height="100px" width="100px" >';
                            }
                        }
                     echo '</td></tr>';
                     echo '<tr>
                     <th scope="row" colspan="4" style="color:red;">Which Place problem Send Image</th>
                     </tr>
                     <tr>
                     
                    <th>
                     <td >
                     <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="file">Images Photo :</label>
                                <input type="file"  id="file" name="images[]" multiple required/>
                               
                                <br>Input This formate:png,jpg,jpeg
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Inform To Admin</label>
                                <textarea class="form-control" id="data" name="data" rows="3" required></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Recomplaint</button>
                        </form>
                        <td>';
                        

                           echo' </tbody>
                            </table>
            </div>             
                                    ';
                    }
                }
                ?>
                
                
                <!--main container end-->


        
        <!--Work area end-->
       
    </div>




    <!--Footer start-->
    <?php include("partial/footer.php"); ?>
</div>

    <script src="../package/swiper-bundle.min.js"></script>
    <script type="text/javascript">
        const inputs = document.querySelectorAll(".input");


        function addcl() {
            let parent = this.parentNode.parentNode;
            parent.classList.add("focus");
        }

        function remcl() {
            let parent = this.parentNode.parentNode;
            if (this.value == "") {
                parent.classList.remove("focus");
            }
        }


        inputs.forEach(input => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl);
        });
    </script>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


</body>

</html>

<?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $file='';
            $file_tmp='';
            $location="recomplainimg/";
            $data='';
            foreach($_FILES['images']['name'] as $key => $val){
                $file=$_FILES['images']['name'][$key];
                $file_tmp=$_FILES['images']['tmp_name'][$key];
                move_uploaded_file($file_tmp,$location.$file);
                $data .="recomplainimg/".$file." ";
            }
           // image store -> $data;
           $sql="SELECT * FROM `complain_tb` WHERE `complaint_id`=$complaint_get_id";
                    $result=mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $complaint_id=$row["complaint_id"];
                        $user_id=$row["user_id"];
                        $worker_id=$row["user_worker_id"];

                    $sql="INSERT INTO `recomplaint_tb` ( `c_id`, `sender_user_id`, `user_send_image`, `solver_worker_id`) VALUES ('$complaint_id', '$user_id', '$data', '$worker_id');";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        echo '<script>alert("Your Recomplaint is Register...")</script>';
                        echo '<script> swal({
                            button: "Done",
                        });</script>';
                    }
                    else{
                        echo '<script>alert(" not Data Updated..")</script>';
                    }
            
                    $sender_user_id=$_SESSION['user_id'];
                    $msg=$_POST['data'];
                    $sql="SELECT * FROM `complain_tb` WHERE `complaint_id`='$complaint_get_id'";
                    $result=mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                       
                            $sql2="INSERT INTO `notify` ( `sender_user_id`, `complaint_id`, `sender_user_role`, `msg`, `reciver_id`, `msg_recive`, `send_msg`, `status`) VALUES
                            ('$sender_user_id', '$complaint_get_id', 'user', '$msg', '0', 'admin', current_timestamp(), '0')";
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
        /* }
            else
            {
                echo '<script>alert("Add  this Formate .png , .jpg , .jpeg ")</script>';
            }  */      
        }       
        ?>



</body>

</html>