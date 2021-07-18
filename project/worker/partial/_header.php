<html>
<?php
include('link.php');
?>
<style>

</style>
<body>
    <div class="header">
        <div class="header-menu">
            <div class="top_bar">
                <div class="logo">
                    Online CMS- <br><span>Street-Pipe-Road</span>
                </div>
        
                <ul style=" display: flex;
    margin-top: 20px; margin-left:60%">

                    <li >
                        <!--notification Start-->
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" style=" background: #fff;
    color: #000;
    display: block;
    margin: 0 10px;
    font-size: 18px;
    padding:-30px 50px;
    width: 34px;
    height: 34px;
    line-height: 35px;
    text-align: center;
    border-radius: 10px;
    transition: 0.3s;
    transition-property: background, color;"
                                aria-haspopup="true" aria-expanded="false">
                                <?php
                            //$nsql="select * FROM `notify` WHERE `status`=0";
                            //$nsql="SELECT * FROM `notify` WHERE `status`=0 AND `user_role`='user' OR `user_role`='worker'";
                            if(isset($_SESSION['loginworker']) && $_SESSION['loginworker']==true) 
                            { 
                            $wsid=$_SESSION['worker_id'];
                            
                            $nsql="select * from notify where (`sender_user_role`='admin'|| `sender_user_role`='user') AND reciver_id='$wsid' AND status=0";
                            $nresult=mysqli_query($conn, $nsql);
                            $ncount= mysqli_num_rows($nresult);
                            
                           ?>
                                <i class="fas fa-bell" ></i><span
                                    class="badge badge-danger"
                                    style="border-radius: 50%; top:-18px; left:-5px"><?php echo $ncount; ?></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2"
                                style="width:500px; padding-top:0px; margin-right:800%">
                                <?php
                            //$ssql="select * FROM `notify` WHERE `status`=0";
                            //$ssql="SELECT * FROM `notify` WHERE `status`=0 AND `user_role`='user' OR `user_role`='worker'";
                            $ssql="select * from notify where (`sender_user_role`='admin' || `sender_user_role`='user') AND reciver_id='$wsid' AND status=0";
                            $sresult=mysqli_query($conn, $ssql);
                            $scount= mysqli_num_rows($sresult);
                            if($scount>0)
                            {
                                while($srow=mysqli_fetch_assoc($sresult))
                                {
                                    
                                    echo '<a class="dropdown-item text-primary" href="feedback.php?nid='.$srow["notify_id"].'"><i class="text-danger">'.$srow["complaint_id"].'&nbsp;&nbsp;'.$srow["sender_user_role"].'&nbsp:</i>&nbsp&nbsp'.$srow["msg"].'</a>
                                    <div class="dropdown-divider"></div>';
                                }
                            }
                            else{
                                echo '<a class="dropdown-item text-danger" href="">Sorry! No Message</a>
                                    <div class="dropdown-divider"></div>';
                            }
                        }?>

                            </div>
                        </div>
                    </li>
                    <!--notification End-->
                    <li>
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"
                                style=" background: #fff;
    color: #000;
    display: block;
    margin: 0 10px;
    font-size: 18px;
    padding:-30px 50px;
    width: 34px;
    height: 34px;
    line-height: 35px;
    text-align: center;
    border-radius: 10px;
    transition: 0.3s;
    transition-property: background, color;">

                                <i class="fas fa-power-off" style="position: relative; top: -5px; left: -3px;"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2"
                                style="width:300px; padding-top:0px;  margin-right:200%">
                                <center class="profile">
                                <?php

                                if(isset($_SESSION['loginworker']) && $_SESSION['loginworker']==true) 
                                { 
                                $wemail=$_SESSION['workeremail'];
                                $sql="SELECT * FROM `usertb` WHERE `user_email`='$wemail'";
                                $result=mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $wname=$row["user_email"];
                                    $wimage=$row["user_image"];
                                    echo '<img src="'.$wimage.'" height="100px" width="100px" style="
                            border-radius:50%;
                            margin:20px 0px; 
                            ">

                                    <h5>';
                                       
                                            
                                            echo $wname;
                                        }
                                    }
                                ?>
                                        <h6>Log Out Hear</h6>
                                        <a href="partial/logout.php" class="btn btn-primary btn-lg active" role="button"
                                            style="border-radius: 10px; width:200px; margin:20px 10px; padding: 0"
                                            aria-pressed="true">Log Out</a>
                                    </h5>


                                </center>
                            </div>
                        </div>
                    </li>



                </ul>
            </div>
        </div>
    </div>
</body>

</html>