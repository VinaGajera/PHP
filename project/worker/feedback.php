<style>
th {
    color: red;
}
</style>
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
            <?php
                if(isset($_GET['nid'])){
                     $n_id=$_GET['nid'];
                     $usql="UPDATE `notify` SET `status` = 1 WHERE `notify_id` = $n_id";
                     $uresult=mysqli_query($conn,$usql);
                }
?>
            <div class="container my-3">
            <h3 style="color:red; font-weight:900;margin:20px">Feedback</h3>
                <table class="table table-hover" id="myTable">
                    <thead class="  text-light ">
                        <tr>
                            <th scope="col ">Notification No</th>
                            <th scope="col ">Complaint No</th>
                            <th scope="col ">User name</th>
                            <th scope="col ">User Role</th>
                            <th scope="col ">Message</th>
                            <th scope="col ">Time&Date</th>
                            <th scope="col ">Delete Notification</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                         $wid=$_SESSION['worker_id'];
                       $n_no=1;
                       //$sql="select * FROM `notify` WHERE `status`=1";
                       $sql="select * from notify where `sender_user_role`='admin' AND status=1 AND `reciver_id`=$wid";
                       $result=mysqli_query($conn, $sql);
                       while($row = mysqli_fetch_assoc($result))
                       {
                            $uid=$row["sender_user_id"];
                            $cid=$row["complaint_id"];
                            $usql="SELECT * FROM usertb WHERE user_id=$uid";
                            $uresult=mysqli_query($conn, $usql);
                            while($urow = mysqli_fetch_assoc($uresult))
                            {
                                $name1=ucfirst($urow["user_name"]);
                                $name2=ucfirst($urow["last_name"]);
                                $user_name=$name1.' '.$name2;
                                echo '
                                    <tr>
                                        <th scope="row ">'.$n_no++.'</th>
                                        <td>'.$cid.'</td>
                                        <td>'.ucfirst($user_name).'</td>
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


            <!--main Container over-->
            
        </div>
        <?php include "partial/footer.php"; ?>

    </div>
    <script type="text/javascript">
function hello()
{
alert ("Notification is Deleted...");
}
</script>