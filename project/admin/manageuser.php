<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php  include("partial/_dbconnect.php");  
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
                <center style="font-size:30px;margin:20px;font-wieght:900;">User Details</center>     
                    <table class="table table-hover mx-auto" style="width: 80%;" id="myTable">
                        <thead class="text-light ">
                            <tr>
                                <th scope="col ">No</th>
                                <th scope="col ">Image</th>
                                <th scope="col ">User Name</th>
                                <th scope="col ">Email-id</th>
                                <th scope="col ">Contact No</th>
                                <th scope="col ">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql="SELECT * FROM `usertb` WHERE `user_role`='user'";
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
                                <th scope="row ">'.$user_id.'</th>
                                <td> <img src="../../USER_WORK/'.$user_image.'" alt="" height="100px" width="100px" style="
                                border-radius:15px;
                                margin:20px 0px; 
                                ">
                                </td>
                                <td>'.ucfirst($user_name).' '.ucfirst($last_name).'</td>
                                <td>'.$user_email.'</td>
                                <td>'.$user_contact.'</td>
                                <td>'.$user_city.','.$user_area.'</td>';
                               
                               /* <td><a onclick= "hello();"  href="deleteuser.php?uid='.$user_id.'" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>        
                                </td>*/
                                echo '</tr>';
                                    
                                 
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