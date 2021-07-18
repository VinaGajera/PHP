<?php session_start();
include('_dbconnect.php'); 

 
?>
<div class="header">
    <div class="header-menu">
        <div class="title">
        CMS-<span>Street-Pipe-Road</span></div>
        <div class="sidebar-btn">
            <i class="fas fa-bars"></i>
        </div>
        <ul>
            <li>
             <!--notification Start-->
                <div class="dropdown">
                    <a class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <?php
                            //$nsql="select * FROM `notify` WHERE `status`=0";
                            //$nsql="SELECT * FROM `notify` WHERE `status`=0 AND `user_role`='user' OR `user_role`='worker'";
                            $nsql="SELECT * FROM `notify` WHERE (`sender_user_role`='user' OR `sender_user_role`='worker') AND status=0";
                            $nresult=mysqli_query($conn, $nsql);
                            $ncount= mysqli_num_rows($nresult);
                            
                           ?>
                        <i class="fas fa-bell" style="position: relative; top: -5px; left: -3px;"></i><span
                            class="badge badge-danger"
                            style="border-radius: 50%; top:-18px; left:-5px"><?php echo $ncount; ?></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="width:500px; padding-top:0px;">
                        <?php
                            //$ssql="select * FROM `notify` WHERE `status`=0";
                            //$ssql="SELECT * FROM `notify` WHERE `status`=0 AND `user_role`='user' OR `user_role`='worker'";
                            $ssql="select * from notify where (`sender_user_role`='user' OR `sender_user_role`='worker') AND status=0";
                            $sresult=mysqli_query($conn, $ssql);
                            $scount= mysqli_num_rows($sresult);
                            if($scount>0)
                            {
                                while($srow=mysqli_fetch_assoc($sresult))
                                {
                                    echo '<a class="dropdown-item text-primary" href="shownotification.php?nid='.$srow["notify_id"].'"><i class="text-danger">'.$srow["complaint_id"].'&nbsp;&nbsp;&nbsp;'.$srow["sender_user_role"].'&nbsp:</i>&nbsp&nbsp'.$srow["msg"].'</a>
                                    <div class="dropdown-divider"></div>';
                                }
                            }
                            else{
                                echo '<a class="dropdown-item text-danger" href="">Sorry! No Message</a>
                                    <div class="dropdown-divider"></div>';
                            }
                           ?>

                    </div>
                </div>
            </li>
            <!--notification End-->
            <li>
                <div class="dropdown">
                    <a class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                        <i class="fas fa-power-off" style="position: relative; top: -5px; left: -3px;"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="width:300px; padding-top:0px;">
                        <center class="profile">
                           
                       
                         <h5>
                            <?php

                                    if(isset($_SESSION['loginadmin']) && $_SESSION['loginadmin']==true) 
                                    { 
                                        //echo  "admin id".$_SESSION['admin_id'];
                                        $aemail=$_SESSION['adminemail']; 
                                        $sql="SELECT * FROM `usertb` WHERE `user_email`='$aemail'";
                                        $result=mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $aname=$row["user_email"];
                                            $aimage=$row["user_image"];
                                            echo ' <img src="'.$aimage.'" alt="" height="100px" width="100px" style="
                                            border-radius:50%;
                                            margin:20px 0px;
                                            margin-right:10px; 
                                            ">';
                                            echo ucfirst($aname);
                                        }
                                    }
                                ?>
                                <h6>Log Out Hear</h6>
                                <a href="partial/logout.php" class="btn btn-primary btn-lg active" role="button" style="border-radius: 10px; width:200px; margin:20px 10px; padding: 0" aria-pressed="true">Log Out</a>
                        </h5>
            

            </center>
                    </div>
                </div>
            </li>



        </ul>
    </div>
</div>
<!--header menu end-->
<!--sidebar start-->
<div class="sidebar">
    <div class="sidebar-menu">
        <center class="profile">
            
            
                <?php

                        if(isset($_SESSION['loginadmin']) && $_SESSION['loginadmin']==true) 
                        { 
                            //echo  "admin id".$_SESSION['admin_id'];
                            $aemail=$_SESSION['adminemail']; 
                            $sql="SELECT * FROM `usertb` WHERE `user_email`='$aemail'";
                            $result=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $aname=$row["user_name"];
                                $aimage=$row["user_image"];
                                if($aimage=="")
                                {
                                    echo '<p style="margin-top:30px;color:#fff;"><a href="settingprofile.php"  style="color:#fff;">Edit Your Profile Info</a></p>';
                                }
                                else{
                                            echo ' <img src="'.$aimage.'" alt="" height="100px" width="100px" style="
                                            border-radius:50%;
                                            margin:20px 0px; 
                                            ">';
                                 }
                                echo '<p>Hello '.$aname.'</p>';

                            }
                        }
                    ?>
            
        </center>
        <li class="item">
            <a href="index.php" class="menu-btn" active>
                <i class="fas fa-desktop"></i><span>Dashboard</span>
            </a>
        </li>
        <li class="item" id="profile">
            <a href="#profile" class="menu-btn">
                <i class="fas fa-user-circle"></i><span>Manage Complaint <i
                        class="fas fa-chevron-down drop-down"></i></span>
            </a>
            <div class="sub-menu">
                <a href="notprocess.php"><i class="fas fa-hourglass-start"></i><span>Not Process Complaint
                        <?php
                            $nsql="SELECT * FROM `complain_tb` WHERE `padding`=1";
                            $nresult=mysqli_query($conn, $nsql);
                            $ncount= mysqli_num_rows($nresult);
                ?>
                        <span class="badge badge-danger"
                            style="border-radius: 50%; top:-18px; left:-5px"><?php echo $ncount; ?></span>
                    </span></a>
                <a href="runningprocess.php"><i class="fas fa-hand-paper"></i><span>Complaint on Work
                        <?php
                            $nsql="SELECT * FROM `complain_tb` WHERE `running`=1";
                            $nresult=mysqli_query($conn, $nsql);
                            $ncount= mysqli_num_rows($nresult);
                ?>
                        <span class="badge badge-warning"
                            style="border-radius: 50%; top:-18px; left:-5px"><?php echo $ncount; ?></span>
                    </span></a>
                <a href="completeprocess.php"><i class="fas fa-thumbs-up"></i><span>Complete Complaint
                        <?php
                            $nsql="SELECT * FROM `complain_tb` WHERE `complete`=1";
                            $nresult=mysqli_query($conn, $nsql);
                            $ncount= mysqli_num_rows($nresult);
                ?>
                        <span class="badge badge-success"
                            style="border-radius: 50%; top:-18px; left:-5px"><?php echo $ncount; ?></span></span></a>
            </div>
        </li>
        <li class="item">
            <a href="recomplaint.php" class="menu-btn">
            <i class="fas fa-user-circle"></i><span>Re-complaint</span>
            <?php
                            $nsql="SELECT * FROM `recomplaint_tb`";
                            $nresult=mysqli_query($conn, $nsql);
                            $ncount= mysqli_num_rows($nresult);
                ?>
                        <span class="badge badge-danger"
                            style="border-radius: 50%; top:-18px; left:-5px"><?php echo $ncount; ?></span></span>
            </a>
        </li>
        <li class="item">
        <a href="manageuser.php" class="menu-btn">
                <i class="fas fa-users"></i><span>Show User </span>  
        <?php
                            $nsql="SELECT * FROM `usertb`WHERE user_role='user'";
                            $nresult=mysqli_query($conn, $nsql);
                            $ncount= mysqli_num_rows($nresult);
            ?>
             <span class="badge badge-success"
                            style="border-radius: 50%; top:-18px; left:-5px"><?php echo $ncount; ?></span></span>
            </a></li>
        <li class="item">
            <a href="manageworker.php" class="menu-btn">
            <i class="fas fa-info-circle"></i><span>Show Worker </span>
                <?php
                            $nsql="SELECT * FROM `usertb`WHERE user_role='worker'";
                            $nresult=mysqli_query($conn, $nsql);
                            $ncount= mysqli_num_rows($nresult);
            ?>
             <span class="badge badge-success"
                            style="border-radius: 50%; top:-18px; left:-5px"><?php echo $ncount; ?></span></span>
            </a>
        </li>
        <!--worker salary-->
        <li class="item">
            <a href="wsalary.php" class="menu-btn">
            <i class="fas fa-user-circle"></i><span>Worker Salary</span>
            
            </a>
        </li>
        <li class="item">
            <a href="shownotification.php" class="menu-btn">
                <i class="fas fa-users"></i><span>Feedback</span>
                
            </a>
        </li>

        <!--   <li class="item">
                    <a href="#" class="menu-btn">
                        <i class="fas fa-clipboard-check"></i><span>Add Status </span>
                    </a>
                </li>-->
        <li class="item" id="settings">
            <a href="#settings" class="menu-btn">
                <i class="fas fa-cog"></i><span>Account Settings<i class="fas fa-chevron-down drop-down"></i></span>
            </a>
            <div class="sub-menu">
                <a href="settingpwd.php"><i class="fas fa-lock"></i><span>Change Password</span></a>
                <a href="settingprofile.php"><i class="fas fa-user-circle"></i><span>Change Profile</span></a>
            </div>
        </li>
       
    </div>
</div>
<script>

</script>