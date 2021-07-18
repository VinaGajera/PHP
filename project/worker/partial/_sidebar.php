<?php 
session_start();
include('_dbconnect.php');
?>

<html>

    <body>
    <div class="vertical_wrap">
            <div class="hamburger1">
                
            </div>
                <div class="backdrop"></div>
                <div class="vertical_bar">
                    <div class="profile_info">
                        <div class="img_holder">
                        <?php
                             
                            if(isset($_SESSION['loginworker']) && $_SESSION['loginworker']==true) 
                                    { 
                                        //echo  "admin id".$_SESSION['admin_id'];
                                       $wid=$_SESSION['worker_id'];
                                       $wemail=$_SESSION['workeremail'];
                                        $sql="SELECT * FROM `usertb` WHERE `user_email`='$wemail'";
                                        $result=mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            $wname=$row["user_name"];
                                            $wemail=$row["user_email"];
                                            $wimage=$row["user_image"];
                                            if($wimage=="")
                                {
                                    echo '<p style="margin-top:40px;color:#fff;"><a href="settingprofile.php"  style="color:#fff;">Edit Your Profile Info</a></p>';
                                }
                                else{
                                            echo '<img src="'.$wimage.'" height="100px" width="100px" style="
                                                border-radius:50%;
                                                margin:20px 0px; 
                                                " alt="profile_pic">';
                                }  
                                            echo '</div>';
                                
                                            echo '<p class="title">Hello &nbsp;'.$wname.'</p>
                                                            <p class="sub_title">'.$wemail.'</p>';
                                        }
                                    }
                                ?>
                        
                    </div>
                    <ul class="menu" >
                        <li>
                            <a href="index.php" class="active">
                                <span class="icon"><i class="fas fa-home"></i></span>
                                <span class="text">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="view_complaint.php">
                                <span class="icon"><i class="fas fa-file-alt"></i></span>
                                <span class="text">Complaint</span>
                            </a>
                        </li>
                        <li>
                            <a href="recomplaint.php">
                                <span class="icon"><i class="fas fa-chart-pie"></i></span>
                                <span class="text">Re-complaint</span>
                            </a>
                        </li>
                        <li>
                            <a href="feedback.php">
                                <span class="icon"><i class="fas fa-user"></i></span>
                                <span class="text">Notification</span>
                            </a>
                        </li>
                        <li>
                            <a href="setting.php">
                                <span class="icon"><i class="fas fa-cog"></i></span>
                                <span class="text">Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="wsalary.php">
                                <span class="icon"><i class="fas fa-cog"></i></span>
                                <span class="text">View Salary</span>
                            </a>
                        </li>
                        <li>
                            <a href="complaint_history.php">
                                <span class="icon"><i class="fas fa-cog"></i></span>
                                <span class="text">Complaint History</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="social">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <script>
        var hamburger = document.querySelector(".hamburger");
        var wrapper = document.querySelector(".wrapper");
        var backdrop = document.querySelector(".backdrop");

        hamburger.addEventListener("click", function() {
            wrapper.classList.add("active");
        });

        backdrop.addEventListener("click", function() {
            wrapper.classList.remove("active");
        });
            </script>
    </body>

</html>


       