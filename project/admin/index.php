<!DOCTYPE html>
<html lang="en" dir="ltr">
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
<?php 
include("partial/_dbconnect.php");
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
            <!--dashboard start-->
            <div class="statusview">
                <h2 class="mx-5 my-4 ">Work Chart Status...</h2>
                <div class="container my-4">
                    <div class="card-deck mb-3 text-center">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Pending Work</h4>
                            </div>                            
                            <div class="card-body">
                                <center class="profile">
                                    <img src="image/pprocess.png" alt="">
                                    <h5>
                                    <?php
                             $sql="SELECT COUNT(`padding`) as pc FROM `complain_tb` WHERE `padding`=1";
                             $result=mysqli_query($conn,$sql);
                             $row = mysqli_fetch_assoc($result);
                             echo $row['pc'];
                            ?> is Pending</h5>
                                </center>
                                <a href="notprocess.php" class="btn btn-lg btn-block btn-outline-primary">View All Pending Work </a>
                            </div>
                        </div>
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Work Running</h4>
                            </div>
                            <div class="card-body">
                                <center class="profile">
                                    <img src="image/rprocess.png" alt="">
                                    <h5>
                                    <?php
                             $sql="SELECT COUNT(`running`) as rc FROM `complain_tb` WHERE `running`=1";
                             $result=mysqli_query($conn,$sql);
                             $row = mysqli_fetch_assoc($result);
                             echo $row['rc'];
                             ?>
                             is Running
                                    </h5>
                                </center>
                                <a href="runningprocess.php" class="btn btn-lg btn-block  btn-outline-primary">View All Running Work</a>
                            </div>
                        </div>
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Completed Work</h4>
                            </div>
                            <div class="card-body">
                                <center class="profile">
                                    <img src="image/cprocess.png" alt="">
                                    <h5>
                                    <?php
                             $sql="SELECT COUNT(`complete`) as cc FROM `complain_tb` WHERE `complete`=1";
                             $result=mysqli_query($conn,$sql);
                             $row = mysqli_fetch_assoc($result);
                             echo $row['cc'];
                            ?> is Completed
                                    </h5>
                                </center>
                                <a href="completeprocess.php" class="btn btn-lg btn-block  btn-outline-primary">View All Completed Work</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--dashboard end-->
            <?php
            echo '<center><div class="card text-center" style="width:80%;">
            <div class="card-header" style="background-color:#DFAA63;border-radius:30px;">';
            $sql="SELECT * FROM `complain_tb`";
                        if ($result=mysqli_query($conn,$sql))
                        {
                        $rowcount=mysqli_num_rows($result);
                            echo '<h4 style="font-family: Courgette, cursive;font-weight:800;color:#fff;">Total No of Complaint is :: '.$rowcount.'</h6>';
                        mysqli_free_result($result);
                        }              
              echo ' </div>            
          </div></center>';                        
                        ?>
        </div>
        <!--main container end-->
    </div>
    <!--wrapper end-->

    <?php include("partial/footer.php"); ?>

</body>

</html>