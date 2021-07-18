<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include("partial/_dbconnect.php"); 
include("partial/link.php");
?>
<body>
    <!--wrapper start-->
    <div class="wrapper">
        <!--header menu start-->
        <?php include("partial/header.php");?>
        <!--sidebar end-->
        <!--main container start-->
        <div class="main-container">
            <!--Not Process Complete part start-->
            <div class="notprocess">
                <div class="container mt-3 mx-2 mb-3">

                <h3 style="font-wight:500;color:red;margin-top:10px;padding:50px 300px">View Re-Complaint</h3>
                    <table class="table table-hover" id="myTable">
                        <thead class=" bg-dark text-light ">
                            <tr>
                                <th scope="col ">Complaint No</th>
                                <th scope="col ">Complaint Title</th>                                
                                <th scope="col ">Complaint Type</th>
                                <th scope="col ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                         $sql="select complain_tb.complaint_id,complain_tb.complaint_title,complain_tb.c_type FROM recomplaint_tb inner join complain_tb on recomplaint_tb.c_id=complain_tb.complaint_id";
                         $result=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $complaint_id=$row["complaint_id"];
                                $c_title=$row["complaint_title"];
                                $ctype=$row["c_type"];
                               
                                
                                        echo ' <tr>
                                        <th scope="row ">'.$complaint_id.'</th>
                                        <th scope="row ">'.$c_title.'</th>
                                        <th scope="row ">'.$ctype.'</th>
                                        <td><a class="btn btn-primary" href="complaintdetailrecomplait.php?complaintid='.$complaint_id.'" role="button">View Detail</a>
                                                 </tr>';            
                            }

                        ?>
                              </tbody>
                    </table>
                  
                </div>
            </div>

        </div>
        <!--main container end-->
    </div>
    <!--wrapper end-->
    <?php include("partial/footer.php"); ?>
    <script type="text/javascript">
     $(document).ready( function () {
    $('#myTable').DataTable();
    } );
    </script>

</body>

</html>