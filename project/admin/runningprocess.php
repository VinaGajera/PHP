<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php 
include("partial/_dbconnect.php"); 
include("partial/link.php");
?>

<style>
thead {
    background-color: #808B96;
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
            <!--Not Process Complete part start-->
            <div class="notprocess">
                <div class="container mt-3 mx-2 mb-3">
                    <?php  
                      echo  '<table class="table table-hover" id="myTable">
                        <thead class="  text-light ">
                            <tr>
                                <th scope="col ">Complaint No</th>
                                <th scope="col ">Complainant Name</th>
                                <th scope="col ">Reg. Time&Date</th>
                                <th scope="col ">Complaint Type</th>
                                <th scope="col ">Status</th>
                                <th scope="col ">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                        $sql="SELECT complain_tb.complaint_id, complain_tb.complaint_title,usertb.last_name,complain_tb.c_type, complain_tb.complaint_discription, complain_tb.user_id, complain_tb.padding, complain_tb.running, complain_tb.complete, complain_tb.image,complain_tb.ctimestamp,usertb.user_id, usertb.user_name, usertb.user_email, usertb.user_image, usertb.user_city, usertb.contact, usertb.user_area, usertb.user_pincode FROM complain_tb INNER JOIN usertb ON complain_tb.user_id= usertb.user_id WHERE complain_tb.running=1";
                         $result=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $complaint_id=$row["complaint_id"];
                                $date = date_create($row["ctimestamp"]);
                                $complaint_user_name=$row["user_name"];
                                $last_user_name=$row["last_name"];
                                $c_type=$row["c_type"];
                                echo ' <tr>
                                    <th scope="row ">'.$complaint_id.'</th>';
                                    echo' <td>'.ucfirst($complaint_user_name).' '.ucfirst($last_user_name);
                                    //recomplaint
                                    $sqlr="SELECT * FROM `recomplaint_tb`";
                                    $resultr=mysqli_query($conn,$sqlr);
                                    while($rowr = mysqli_fetch_assoc($resultr))
                                    { 
                                        $c_id=$rowr["c_id"];
                                        if($c_id==$complaint_id)
                                            echo '<span class="badge badge-danger">recomplaint</span>';
                                       
                                    }
                                    
                                    echo '</td>';
                                   echo '<td>'.date_format($date, 'g:ia \o\n l jS F Y').'</td>
                                    <td>'.ucfirst($c_type).'</td>
                                    <td><a class="btn btn-danger" href="notify_officer_running.php?cid='.$complaint_id.'" role="button">Check Officer Work</a>        
                                    <td><a class="btn btn-primary" href="complaindetailrunning.php?complaintid='.$complaint_id.'" role="button">View Detail</a>        
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
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</body>

</html>