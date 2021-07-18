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

                <h3 style="color:red; font-weight:900;">View All Recomplaint</h3>
                <div class="compalaint">
                   <!---->


                   <?php
            
                           
                           
                       
                           $sql="SELECT * FROM recomplaint_tb WHERE solver_worker_id=$wid";
                           $result=mysqli_query($conn,$sql);
                           $num_row=mysqli_num_rows($result);
                           if($num_row>0){
                           
                                       while($row = mysqli_fetch_assoc($result))
                                       {
                                        $cid=$row["c_id"];
                                        $csql="SELECT * FROM complain_tb WHERE complaint_id=$cid";
                                        $cresult=mysqli_query($conn,$csql); 
                                        while($crow = mysqli_fetch_assoc($cresult))
                                        {
                                         
                                                    
                                                    $res_c_image=$crow["image"];
                                                    $ctitle=$crow["complaint_title"];
                                                    $cdis=$crow["complaint_discription"];
                                                    $ctime=$crow["ctimestamp"];
                                                    
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
                                                <a class="btn btn-primary" href="view_indetail_recomplaint.php?cid='.$cid.'" role="button">View Detail</a>
                                            </div>
                                        </div>';
                                     }
                            }
                           }
                           else{
                               echo '<div class="jumbotron jumbotron-fluid"  style="border-radius:20px;">
                                   <p class="lead" style="padding:0px 20px; color:red;">No Any Complaint On This Time......</p>
                               
                             </div>';
                           }     
                
                ?> 
       
                   <!---->
                </div>
            </div>


            <!--main Container over-->

        </div>
        <?php include "partial/footer.php"; ?>

    </div>
</div>