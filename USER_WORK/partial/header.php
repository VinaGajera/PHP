<?php
   include("_dbconnect.php");
?>
    <div class="nav">
            <div class="logo">
                <h4>CMS</h4>
            </div>
            <div class="links">
            <?php
             if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) 
             {
                
                $uemail=$_SESSION['useremail'];
               
                $sql="SELECT * FROM `usertb` WHERE `user_email`='$uemail'";
                $result=mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    $aname=ucfirst($row["user_name"]);
                    $lname=ucfirst($row["last_name"]);
                    $uimage=$row["user_image"];
                    echo '<img src="'.$uimage.'" height="100px" width="100px" style="
            border-radius:30px;
           margin-right:30px;
           padding:5px;
            ">';
                    echo '<a href="index.php"><span style="color:#e0501b;font-size: 2.5vw" class="titlename">Hello '.$aname.' '.$lname.'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
                }
                echo '<a href="add_complaint.php">Add Complaint</a>
                <a href="view_complaint.php">Complaint Status</a>
                <a href="changeinfo.php">Profile Edit</a>
                <a href="shownotification.php">Notification</a>
                <a href="logout.php">Logout</a>'; 

                echo '
                <a>
                <div class="dropdown">
                    <a class="dropdown-toggle"  id="dropdownMenuButton" style=" background: #fff;
                        color: #fff;
                        right: 10px;
                        top: 20px;
                        padding: 2px 12px;
                        position:absolute;
                        display: block;
                        font-size: 18px;
                        width: 40px;
                        height: 40px;
                        cursor: pointer;
                        line-height: 35px;
                        text-align: center;
                        border-radius: 10px;
                        transition: 0.3s;
                        background-color:black;
                        " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        $usid=$_SESSION['user_id'];
                        $nsql="select * from notify where (`sender_user_role`='admin') AND reciver_id='$usid' AND status=0";
                        $nresult=mysqli_query($conn, $nsql);
                        $ncount= mysqli_num_rows($nresult);
                        
                        
                            echo ' <i class="fas fa-bell" ></i><span
                                class="badge badge-danger"
                                style="border-radius: 50%; top:-18px; left:-5px">'.$ncount.'</span>
                    
                   </a>

                    <div class="dropdown-menu" style="width: 400px;
                    padding-top: 0px;
                    position: absolute;
                    will-change: transform;
                    right: -100px;
                    top: 0px;
                    left: 0px;
                    transform: translate3d(542px, 60px, 0px);" aria-labelledby="dropdownMenuButton">
                    ';
                    $ssql="select * from notify where (`sender_user_role`='admin') AND reciver_id='$usid' AND status=0";
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
                    echo'
                    </div>
              </div>
              </a>';             
            }
            else{
                echo '<a href="index.php" class="mainlink">CMS</a>
                <a href="index.php#services">Our Services</a>
                <a href="index.php#help">Help</a>
                <a href="index.php#aboutus">About us</a>
                <a href="contactus.php">Contact us</a>
                
                <a href="user_registration.php">Registration</a> 
                <a href="user_login.php">Login</a>';
            }
    ?>
 
              
            </div>
        </div>