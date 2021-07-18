<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php 
session_start();
include("partial/_dbconnect.php"); 
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
                <center>
            <div class=".container-fluid" style="width:70%;margin-top:12%">
            <h3 style="font-width:900;color:red;font-size:30px;margin-bottom:20px;"><i class="far fa-smile-beam" style="color:green;"></i>&nbsp;&nbsp;Here some Notification...</h3>
                <table class="table table-hover" >
                    <thead class="  text-light ">
                        <tr>
                            <th scope="col ">Notification No</th>
                            <th scope="col ">Your Complaint No</th>
                            <th scope="col ">Complaint Title</th>
                            <th scope="col ">Message</th>
                            <th scope="col ">Date</th>
                        </tr>
                    </thead>
                    <tbody >

                        <?php
                        
                                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) 
                                {
                                        $usid=$_SESSION['user_id'];
                                    $n_no=1;
                                    //$sql="select * FROM `notify` WHERE `status`=1";
                                    $sql="select * from notify where `sender_user_role`='admin' AND status=1 AND `reciver_id`=$usid";
                                    $result=mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $cid=$row["complaint_id"];
                                        $usql="SELECT * FROM complain_tb WHERE `complaint_id`=$cid";
                                        $uresult=mysqli_query($conn, $usql);
                                        while($urow = mysqli_fetch_assoc($uresult))
                                        {
                                            $ctitle=$urow["complaint_title"];
                                          echo '
                                                <tr>
                                                    <th scope="row ">'.$n_no++.'</th>
                                                    <td>'.$cid.'</td>
                                                    <td>'. ucfirst($ctitle).'</td>
                                                    <td><div style="padding:10px;background:lightblue;border-radius:5px;">'.$row["msg"].'</div></td>
                                                    <td >'.$row["send_msg"].'</td>  
                                                    <td><a onclick= "hello();" href="deletenotification.php?dnid='.$row["notify_id"].'" ><i class="fas fa-trash-alt"></i></a>        
                                                </tr>';
                                        }
                                    }
                                }
                               
                        ?>
                    </tbody>
                <table>
            </div>
            </center>
            
        </div>

           

     </div>
     <script type="text/javascript">
function hello()
{
alert ("Notification is Deleted...");
}
</script>
</body>

</html>