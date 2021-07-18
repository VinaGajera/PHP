<script type="text/javascript">
     $(document).ready( function () {
    $('#myTable').DataTable();
    } );
    </script>
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
            <div class="container">
                <h3 style="color:red; font-weight:900;">Your Handaled Complaint History</h3>
                <?php
                        if(isset($_SESSION['loginworker']) && $_SESSION['loginworker']==true) 
                        { 
                        $wsid=$_SESSION['worker_id'];
                        $sql="SELECT complain_tb.complaint_id,complain_tb.complaint_title,complain_tb.user_id,complain_tb.complaint_discription,complain_tb.image,complain_tb.ctimestamp FROM complain_tb INNER JOIN usertb ON complain_tb.user_worker_id=usertb.user_id WHERE complain_tb.user_worker_id='$wsid' AND complain_tb.complete='1'";
                        $result=mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $cid=$row["complaint_id"];
                                    $res_c_image=$row["image"];
                                    $ctitle=$row["complaint_title"];
                                    $user_id=$row["user_id"];
                                    $cdis=$row["complaint_discription"];
                                    $ctime=$row["ctimestamp"];


                                    $sql2="SELECT * FROM `usertb` WHERE `user_id`='$user_id'";
                                    $result2=mysqli_query($conn,$sql2);
                                while($row2 = mysqli_fetch_assoc($result2))
                                {
                                    $unm1=$row2["user_name"];
                                    $unm2=$row2["last_name"];
                                    $name=$unm1.' '.$unm2;
                                    $uemail=$row2["user_email"];
                                    $uimage=$row2["user_image"];

               echo ' <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Complaint Id</th>
                            <th scope="col">Complaint Image</th>
                            <th scope="col">Complaint Title</th>
                            <th scope="col">Complaint Discription</th>
                            <th scope="col">Complaint Time</th>
                            <th scope="col">User Name</th>
                            <th scope="col">User Email</th>
                            <th scope="col">User Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">'.$cid.'</th>
                            <td>';
                            $res_c_image=explode(" ",$res_c_image);
                            $count=count($res_c_image)-1;
                            for ($i=0; $i <1 ; ++$i) { 
                                echo '<img src="../../USER_WORK/'.$res_c_image[$i].'" alt=""height="210px" width="210px" >';
                            }
                            
                            echo '
                           </td>
                            <td>'.$ctitle.'</td>
                            <td>'.$cdis.'</td>
                            <td>'.$ctime.'</td>
                            <td>'.$name.'</td>
                            <td>'.$uemail.'</td>
                            <td><img src="../../USER_WORK/'.$uimage.'" height="100px" width="100px" style="
                                                border-radius:50%;
                                                margin:20px 0px; 
                                                " alt="profile_pic">
                            </td>
                        </tr>
                        <hr>
                       
                    </tbody>
                </table>';
                                }
                                }
                            }
                            ?>


            </div>
            <!--main Container over-->

        </div>
        <?php include "partial/footer.php"; ?>


    </div>
    