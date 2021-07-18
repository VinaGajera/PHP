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

                <h3 style="color:red; font-weight:900;">View All complaint</h3>
                <div class="compalaint">
                    <?php
                    
                    if(isset($_SESSION['loginworker']) && $_SESSION['loginworker']==true) 
                    { 
                     $wsid=$_SESSION['worker_id'];
                //  $sql="SELECT complain_tb.complaint_id,complain_tb.complaint_title,complain_tb.complaint_discription,complain_tb.image,complain_tb.ctimestamp FROM complain_tb INNER JOIN usertb ON complain_tb.user_worker_id=usertb.user_id WHERE complain_tb.user_worker_id='$wsid'";
                    $sql="SELECT complain_tb.complaint_id,complain_tb.complaint_title,complain_tb.complaint_discription,complain_tb.image,complain_tb.ctimestamp FROM complain_tb INNER JOIN usertb ON complain_tb.user_worker_id=usertb.user_id WHERE complain_tb.user_worker_id='$wsid' AND complain_tb.complete!='1'";
                    $result=mysqli_query($conn,$sql);
                    $num_row=mysqli_num_rows($result);
                    if($num_row>0){

                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $cid=$row["complaint_id"];
                                    $res_c_image=$row["image"];
                                    $ctitle=$row["complaint_title"];
                                    $cdis=$row["complaint_discription"];
                                    $ctime=$row["ctimestamp"];
                                  
                    echo '
                        <div class="card">
                            <div class="imgBx">';
                            $res_c_image=explode(" ",$res_c_image);
                            $count=count($res_c_image)-1;
                            for ($i=0; $i <1 ; ++$i) { 
                                echo '<img src="../../USER_WORK/'.$res_c_image[$i].'" alt="" style="margin:20px;" height="210px" width="210px" >';
                            }
                           echo '</div>
                            <div class="content">
                                <h2>'.$ctitle.'</h2>
                                <p>'.$cdis.'</p>
                                <b>'.$ctime.'</b><br>
                                <a class="btn btn-primary" href="view_indetail_complaint.php?cid='.$cid.'" role="button">View Detail</a>
                            </div>
                        </div>';
                                }
                    }
                    else{
                        echo '<div class="jumbotron jumbotron-fluid"  style="border-radius:20px;">
                            <p class="lead" style="padding:0px 20px; color:red;">No Any Complaint On This Time......</p>
                        
                      </div>';
                    }
                }
                ?>

                </div>
            </div>


            <!--main Container over-->

        </div>
        <?php include "partial/footer.php"; ?>

    </div>
</div>