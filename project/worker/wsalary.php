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

            <div class="notprocess">
                <div class="container mt-3 mx-2 mb-3">

                <h3 style="font-wight:500;color:red;margin-top:10px;padding:50px 300px">Salary Detail</h3>
                    <table class="table table-hover"  id="myTable">
                        <thead class=" bg-dark text-light ">
                            <tr>
                                <th scope="col ">Complaint No</th>
                                <th scope="col ">Complaint Title</th>
                                <th scope="col ">Per Work Money</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                         if(isset($_SESSION['loginworker']) && $_SESSION['loginworker']==true) 
                         { 
                          $wsid=$_SESSION['worker_id'];
                                   
                                    $sql2="select * FROM complain_tb WHERE user_worker_id=$wsid";           
                                    $result2=mysqli_query($conn,$sql2);
                                    $rowcount=mysqli_num_rows($result2);
                                    if($rowcount==0){
                                        echo '<h3 style="padding:30px 10px; ">No Any Complaint Handeld..</h3>';
                                    }else{
                                        
                                            $total_sal=2500*$rowcount;
                                            while($row2 = mysqli_fetch_assoc($result2))
                                            {
                                            echo ' <tr>
                                                            <td>'.$row2["complaint_id"].'</td>    
                                                            <td>'.$row2["c_type"].' Fitting</td>
                                                            
                                                            <td>2500.00</td>
                                                    </tr>';
                                            }
                                          
                               echo '<tr>
                                    <td colspan="2" style="color:red;font-size:15px">Total Complaint Is: '.$rowcount.'</td>
                                            <td  style="color:red;font-size:20px">'.$total_sal.'.00</td>
                                </tr>';
                                        }   
                            
                                }
                        ?>
                                <tbody>
                                 </table>
                              
                </div>
            </div>

            <!--main Container over-->

        </div>
        <?php include "partial/footer.php"; ?>

    </div>
</div>