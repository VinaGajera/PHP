<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
 include("partial/_dbconnect.php"); 
include("partial/link.php");?>
<style>
thead {
    background-color: #F5B041;
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
                <center style="font-size:30px;margin:20px;">Worker Details</center>     
                    <table class="table table-hover mx-auto" style="width: 80%;" id="myTable">
                        <thead class="text-light ">
                            <tr>
                                <th scope="col ">Id</th>
                                <th scope="col ">Worker Profile</th>
                                <th scope="col ">Worker Name</th>
                                <th scope="col ">Email-id</th>
                                <th scope="col ">Contact No</th>
                                <th scope="col ">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql="SELECT * FROM `usertb` WHERE `user_role`='worker'";
                            $result=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $user_id=$row["user_id"];
                                $user_name=$row["user_name"];
                                $last_name=$row["last_name"];
                                $user_email=$row["user_email"];
                                $user_image=$row["user_image"];
                                $user_city=$row["user_city"];
                                $user_area=$row["user_area"];
                                $user_contact=$row["contact"];
                                $user_pincode=$row["user_pincode"];
                                
                            echo '<tr>
                                <th scope="row ">'.$user_id.'</th>';
                                if($user_image=="")
                                {
                                    echo '<td style="margin-top:30px;color:red;" >Worker can not Uploaded images</td>';
                                }
                                else{
                                    echo '<td> <img src="../worker/'.$user_image.'" alt="" height="100px" width="100px" style="
                                    border-radius:15px;
                                    margin:20px 0px; 
                                    "></td>';
                                }
                                echo '<td>'.ucfirst($user_name).' '.ucfirst($last_name).'</td>
                                <td>'.$user_email.'</td>';
                                if($user_contact=="")
                                {
                                    echo '<td style="margin-top:30px;color:red" >can not Uploaded data</td>';
                                }
                                else{
                                echo '<td>'.$user_contact.'</td>';
                                }
                                if($user_city=="")
                                {
                                    echo '<td style="margin-top:30px;color:red" >can not Uploaded data</td>';
                                }
                                else{   
                                    echo '<td>'.$user_city.','.$user_area.'</td>';
                                }
                             
                               echo ' </tr>';
                                    
                                 
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    
    <?php include("partial/footer.php"); ?>
    <script>
      $(document).ready( function () {
    $('#myTable').DataTable();
    } );

    
function hello()
{
alert ("Notification is Deleted...");
}

    
    </script>
</body>

</html>