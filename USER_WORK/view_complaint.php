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

        <div class="notprocess">
                
                    
                    <?php
                         if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) 
                         {
                            $uemail=$_SESSION['useremail'];
                            $uid=$_SESSION['user_id'];
                            echo '<h3 style="font-wight:500;color:red;margin-top:100px;padding-left:600px">Check Your Complain Status</h3>';
                            $sql="SELECT * FROM `complain_tb` WHERE `user_id`=$uid";
                            $result=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $complaint_id=$row["complaint_id"];
                                $complaint_name=$row["complaint_title"];
                                $c_add=$row["c_address"];
                                $c_type=$row["c_type"];
                                $complaint_dis=$row["complaint_discription"];
                                $complaint_ctimestamp=$row["ctimestamp"];
                                $date=date_create($complaint_ctimestamp);
                                $res_c_image=$row["image"];
                                $solve_image=$row["recever_image"];



                                echo'  
                                    <div class="jumbotron" style="width: 90%;margin-left:50px; margin-top:5%;"><tr>
                                    <table class="table table-borderedless mx-auto" style="width: 75%;">
                                    <th style="color:red;font-size:30px" scope="row">Complaint Number</th>
                                    <td style="color:red;font-size:30px">'.$complaint_id.'</td>
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
                                        if($i==4)
                                            echo '<br>';
                                        /*<img src="../../USER_WORK/'.$res_c_image.'" alt="" height="100px" width="100px" ></td>*/
                                        echo '<img src="../../USER_WORK/'.$res_c_image[$i].'" alt="" style="margin:20px;" height="100px" width="100px" >';
                                    }
                                echo'
                                </tr>';
                                
                                //if recomplalaint than display
                                $sqlr="SELECT * FROM `recomplaint_tb` WHERE c_id=$complaint_id";
                                $resultr=mysqli_query($conn,$sqlr);
                                while($rowr = mysqli_fetch_assoc($resultr))
                                {
                                    $rcid=$rowr["c_id"];
                                    $row_cnt = mysqli_num_rows($result);
                                    if($rcid==$complaint_id)
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
                                                    echo '<img src="'.$rimg[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                                                }
                                            
                                            echo '</td>
                                            </tr>';
                                    }else{
                                        
                                    }
                                }
                            //end
                                

                            $padding=$row["padding"];
                            $running=$row["running"];
                            $complate=$row["complete"];   
                            $worker_id=$row["user_worker_id"];
                            if($padding==1 && $running==0 && $complate==0)
                            {
                                echo '<tr>
                                <th scope="row">your Complaint Status</th>
                                <td colspan="3" style="color:red;font-weight:900;font-size:20px">Pending</td>
                                </tr>';
                                echo ' <tr>
                            <td colspan="2"></td>
                            <td><a href="edit_complaint.php?cid='.$complaint_id.'&cname='.$complaint_name.'&cdis='.$complaint_dis.'&cadd='.$c_add.'&ctype='.$c_type.'"  class="btn btn-primary">Edit Complaint</a></td>
                            <td><a href="index.php" class="btn btn-primary">Back</a></td>
                            <td><a href="feedback.php?cid='.$complaint_id.'" class="btn btn-primary">Give Feedback</a></td>
                            </tr>';
                            }elseif($padding==0 && $running==1 && $complate==0)
                            {
                                $sqld="SELECT usertb.user_id,usertb.user_name,usertb.last_name,usertb.contact FROM complain_tb INNER JOIN usertb ON complain_tb.user_worker_id= usertb.user_id WHERE complain_tb.complaint_id=$complaint_id";
                                $resultd=mysqli_query($conn,$sqld);
                                while($rowd = mysqli_fetch_assoc($resultd))
                                {
                                    $rowd["user_id"];
                                    echo '<tr>
                                <th scope="row" style="color:blue">This Officer is Handle Your Problem</th>
                                <td colspan="3" style="color:orange;font-weight:900;font-size:20px">'.$rowd["user_name"].' '.$rowd["last_name"].'</td>
                                </tr>';
                                echo '<tr>
                                <th scope="row" style="color:blue">This Officer Contact No.</th>
                                <td colspan="3" style="color:orange;font-weight:900;font-size:20px">'.$rowd["contact"].'</td>
                                </tr>';
                                echo '<tr>
                                <th scope="row">Your Complaint Status</th>
                                <td colspan="3" style="color:orange;font-weight:900;font-size:20px">Running</td>
                                </tr>';
                                }

                                echo ' <tr>
                            <td colspan="2"></td>
                            
                            <td><a href="index.php" class="btn btn-primary">Back</a></td>
                            <td><a href="feedback.php?cid='.$complaint_id.'" class="btn btn-primary">Give Feedback</a></td>
                            </tr>';
                            }
                            elseif($padding==0 && $running==0 && $complate==1){
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
                                        echo '<img src="../project/worker/'.$solve_image[$i].'" alt="" style="margin:20px;" height="100px" width="100px" >';
                                    }
                                }
                            echo '</td></tr>';
                                echo '<tr>
                                <th scope="row">your Complaint Status</th>
                                <td colspan="3" style="color:green;font-weight:900;font-size:20px">Your Complaint work is Complete</td>
                                </tr>
                                ';
                                


                                     //recomplaint worker image
                                    $sqlr="SELECT * FROM `recomplaint_tb` WHERE c_id=$complaint_id";
                                    $resultr=mysqli_query($conn,$sqlr);
                                    while($rowr = mysqli_fetch_assoc($resultr))
                                    {
                                        $rcid=$rowr["c_id"];
                                    $row_cnt = mysqli_num_rows($result);
                                    if($rcid==$complaint_id)
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
                                                        echo '<img src="../project/worker/'.$rimg[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                                                    }
                                                }
                                            echo '</td>
                                            </tr>';
                                    }
                                        else{

                                        }
                                }
                            //end

                                    echo ' <tr>
                                <td colspan="2"></td>
                                
                                <td><a href="index.php" class="btn btn-primary">Back</a></td>
                                <td><a href="feedback.php?cid='.$complaint_id.'" class="btn btn-primary">Give Feedback</a></td>
                                <td><a href="recomplaint.php?cid='.$complaint_id.'" class="btn btn-primary">Recomplaint</a></td>
                                </tr>';
                                
                                }elseif($padding==0 && $running==0 && $complate==0)
                                {
                                    echo '<tr>
                                    <th scope="row">your Complaint Status</th>
                                    <td colspan="3" style="color:red;font-weight:900;font-size:20px">Padding</td>
                                    </tr>';
                                    echo ' <tr>
                                <td colspan="2"></td>
                                <td><a href="index.php" class="btn btn-primary">Back</a></td>
                                <td><a href="feedback.php?cid='.$complaint_id.'" class="btn btn-primary">Give Feedback</a></td>
                                </tr>';
                                    
                                }

                                
                                

                                echo' </tbody>
                                    </table>
                                 </div>             
                                            ';
                            }
                        }
                        ////////////////////////////////////////////////////////////////////////////////////////////////
                        else{
                            echo '<h3 style="font-wight:500;color:red;margin-top:100px;padding-left:600px">View Complaint In Detail</h3>';
                            $getc_id=$_GET["cid"];
                            $sql="SELECT * FROM `complain_tb` WHERE `complaint_id`=$getc_id";
                            $result=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $complaint_id=$row["complaint_id"];
                                $complaint_name=$row["complaint_title"];
                                $c_add=$row["c_address"];
                                $c_type=$row["c_type"];
                                $complaint_dis=$row["complaint_discription"];
                                $complaint_ctimestamp=$row["ctimestamp"];
                                $date=date_create($complaint_ctimestamp);
                                $res_c_image=$row["image"];
                                $solve_image=$row["recever_image"];



                                echo'  
                                    <div class="jumbotron " style="width: 90%;margin-left:50px; margin-top:2%;padding:10px"><tr>
                                    <table class="table table-borderedless mx-auto" style="width: 75%;">
                                    <th style="color:red;font-size:30px" scope="row">Complaint Number</th>
                                    <td style="color:red;font-size:30px">'.$complaint_id.'</td>
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
                                    <th scope="row">Actual Problem Image</th>
                                    <td colspan="3">';
                                    $res_c_image=explode(" ",$res_c_image);
                                    $count=count($res_c_image)-1;
                                    for ($i=0; $i <$count ; ++$i) { 
                                        if($i==4)
                                            echo '<br>';
                                        /*<img src="../../USER_WORK/'.$res_c_image.'" alt="" height="100px" width="100px" ></td>*/
                                        echo '<img src="../../USER_WORK/'.$res_c_image[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                                    }
                               
                                
                                //if recomplalaint than display
                                $sqlr="SELECT * FROM `recomplaint_tb` WHERE c_id=$complaint_id";
                                $resultr=mysqli_query($conn,$sqlr);
                                while($rowr = mysqli_fetch_assoc($resultr))
                                {
                                    $rcid=$rowr["c_id"];
                                    $row_cnt = mysqli_num_rows($result);
                                    if($rcid==$complaint_id)
                                    {
                                       
                                            
                                                $rimg=$rowr["user_send_image"];
                                                $rimg=explode(" ",$rimg);
                                                $count=count($rimg)-1;
                                                for ($i=0; $i <$count ; ++$i) { 
                                                    echo '<img src="'.$rimg[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                                                }
                                         
                                    }else{
                                        
                                    }
                                }
                                echo'<td>
                                </tr>';
                            //end
                                

                            echo '<tr>
                                <th scope="row" style="color:red;">Officer Problem  Solve Image</th>
                                <td colspan="3">';
                                $solve_image=explode(" ",$solve_image);
                                $count=count($solve_image)-1;
                                if($count==0){
                                    echo 'No Data Uploaded to Officer Side...';
                                }
                                else
                                {
                                    for ($i=0; $i <$count ; ++$i) { 
                                        if($i==4)
                                        echo '<br>';
                                        echo '<img src="../project/worker/'.$solve_image[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                                    }
                                }
                            
                               

                                     //recomplaint worker image
                                    $sqlr="SELECT * FROM `recomplaint_tb` WHERE c_id=$complaint_id";
                                    $resultr=mysqli_query($conn,$sqlr);
                                    while($rowr = mysqli_fetch_assoc($resultr))
                                    {
                                        $rcid=$rowr["c_id"];
                                    $row_cnt = mysqli_num_rows($result);
                                    if($rcid==$complaint_id)
                                    {
                                                $rimg=$rowr["recomplain_solve_image"];
                                                $rimg=explode(" ",$rimg);
                                                $count=count($rimg)-1;
                                                if($count==0){
                                                    echo 'No Data Uploaded to Officer Side...';
                                                }else
                                                {
                                                    for ($i=0; $i <$count ; ++$i) { 
                                                        echo '<img src="../project/worker/'.$rimg[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                                                    }
                                                }
                                            
                                    }
                                          else{

                                        }
                                        echo '</td></tr>';
                                }
                            

                                    echo ' <tr>
                                <td colspan="2"></td>
                                
                                <td><a href="index.php" class="btn btn-primary">Back</a></td>
                                </tr>';
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