<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include("partial/_dbconnect.php"); 
include("partial/link.php");
?>
<style>
th {
    color: red;
}
</style>

<body>
    <?php
                if(isset($_GET['nid'])){
                     $n_id=$_GET['nid'];
                     $usql="UPDATE `notify` SET `status` = 1 WHERE `notify_id` = $n_id";
                     $uresult=mysqli_query($conn,$usql);
                }
?>

    <!--wrapper start-->
    <div class="wrapper">
        <!--header menu start-->
        <?php include("partial/header.php");?>
        <!--sidebar end-->
        <!--main container start-->
        <div class="main-container">

            <div class="container my-3">
            <center style="font-size:30px;margin:20px;">Notification History</center>     
                <table class="table table-hover" id="myTable">
                    <thead class="  text-light ">
                        <tr>
                            <th scope="col ">No</th>
                            <th scope="col ">Complaint No</th>
                            <th scope="col ">User name</th>
                            <th scope="col ">User Role</th>
                            <th scope="col ">Message</th>
                            <th scope="col ">Date</th>
                            <th scope="col ">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                       $n_no=1;
                       //$sql="select * FROM `notify` WHERE `status`=1";
                       $sql="select * from notify where (`sender_user_role`='user'OR `sender_user_role`='worker') AND status=1";
                       $result=mysqli_query($conn, $sql);
                       while($row = mysqli_fetch_assoc($result))
                       {
                            $uid=$row["sender_user_id"];
                            $cid=$row["complaint_id"];
                            $usql="SELECT * FROM usertb WHERE user_id=$uid";
                            $uresult=mysqli_query($conn, $usql);
                            while($urow = mysqli_fetch_assoc($uresult))
                            {
                                $user_name=$urow["user_name"];
                                $last_name=$urow["last_name"];
                                echo '
                                    <tr>
                                        <th scope="row ">'.$n_no++.'</th>
                                       <center> <th >'.$cid.'</th></center>
                                        <td>'.ucfirst($user_name).' '.ucfirst($last_name).'</td>
                                        <td>'. ucfirst($row["sender_user_role"]).'</td>
                                        <td>'.$row["msg"].'</td>
                                        <td>'.$row["send_msg"].'</td>       
                                        <td><a onclick= "hello();" href="deletenotification.php?dnid='.$row["notify_id"].'" ><i class="fas fa-trash-alt"></i></a>        
                                    </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <?php include("partial/footer.php"); ?>
    <script type="text/javascript">

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