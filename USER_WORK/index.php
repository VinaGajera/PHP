<?php 
session_start();
include("partial/link.php");
include("partial/_dbconnect.php");
?>
<link href="css/ionicons.css" rel="stylesheet">
<style>        
        #aboutus {
            background: #000;
            position: relative;
            width: 100%;
            padding: 50px;
            color:#fff;
        }
        
        #aboutus .circle {
            position: relative;
            overflow: hidden;
        }
        
        #aboutus .circle img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        #aboutus .circle.circle1 {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            float: left;
            margin: 20px;
            shape-outside: circle();
        }
        
        #aboutus .circle.circle2 {
            width: 300px;
            height: 300px;
            shape-outside: circle();
            border-radius: 50%;
            float: right;
            margin: 20px;
        }
        
        #aboutus h2 {
            color: #ffffff;
            padding: 30px 20px;
        }
        
        #aboutus p {
            color: #ffffff;
            word-spacing: 3px;
            letter-spacing: 1px;
        }
    </style>
<body>

    <div class="wrapper">
        <!--navigation bar start-->
        <?php include("partial/header.php"); ?>
        <!--navigation bar end-->
        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) 
             {
                $uemail=$_SESSION['useremail'];
                $uid=$_SESSION['user_id'];
                            $sql="SELECT * FROM `usertb` WHERE `user_email`='$uemail'";
                            $result=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $aname=ucfirst($row["user_name"]);
                                $lname=ucfirst($row["last_name"]);
                            
                        echo '<div class="landing">
                        <div class="landingText" data-aos="fade-up" data-aos-duration="1000">
                        <span style="color:#e0501b;font-size: 3vw" class="titlename">Hello '.$aname.' '.$lname.'</span>
                            <h1 class="titlename"> CMS- <span style="color:#e0501b;font-size: 2vw" class="titlename">Street-Pipe-Road</span></h1>
                            <h3 class="titlename">Online Complain Registration & Management System- Street,Pipe,Road</h3>
                            
                        </div>
                        <div class="landingImage" data-aos="fade-down" data-aos-duration="2000">
                            <img src="image/1.jpg">
                        </div>
                    </div>';
                            }
                           echo ' <div class="aboutText" data-aos="fade-up" data-aos-duration="1000">
                           <a  style="text-decoration:none;" href="index2.php"><span style="color:#2f8be0;font-size:3vw">View Complaint</span>
                            
                            </a>
                        </div>';


                        //<!--2nd part-->

                      echo'  <div  id="help" class="about" style="  box-shadow: inset 0px 0px 12px 0px rgba(0, 0, 0, 0.1);    background: #ecf5ff;    padding: 100px 0 40px 0;">
                        <div class="aboutText" data-aos="fade-up" data-aos-duration="1000">
                            <h1>How To Register your Complaint?</h1>
                            <img src="image/user1.png" alt="" style="margin-top: 70px; margin-left: 70px; height: 400px; width: 500px;">
                        </div>
                        <div class="aboutList" data-aos="fade-left" data-aos-duration="1000" style="padding-bottom:30px">
                            <ol>
                                <li data-aos="fade-left" data-aos-duration="1000">
                                    <span>01</span>
                                    <p style="font-size: 20px; font-weight: 300;">Add Your Complain.</p>
                                </li>
                                <li data-aos="fade-left" data-aos-duration="2000">
                                    <span>02</span>
                                    <p style="font-size: 20px; font-weight: 300;">Are you Satisfied than you can feedback about the Complain work.</p>
                                </li>
                                <li data-aos="fade-left" data-aos-duration="3000">
                                    <span>03</span>
                                    <p style="font-size: 20px; font-weight: 300;">Are you Not Satisfied than you can Re-Complain.</p>
                                </li>
                                <li data-aos="fade-left" data-aos-duration="1000">
                                    <span>04</span>
                                    <p style="font-size: 20px; font-weight: 300;">In Re-complain,You must have upload some photo about the complain.</p>
                                </li>
                            </ol>
                        </div>
                    </div>';
                           
             }
             else{

echo '

        <!--1st part-->
        <div class="landing">
            <div class="landingText" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="titlename"> CMS-<span style="color:#e0501b;font-size: 2vw" class="titlename">Street Light,Water Pipe & Road cave</span></h1>
                <h3 class="titlename">Online Complain Registration & Management System-Street,Pipe,Water To transform the existing manual complian management system into an automate system. For the better management of complaints to improve efficiency.
                <div class="btn" style="width:200px;padding-top: 20px;padding-bottom: 0px;">
                    <a class="titlename" style="text-decoration: none;" href="#services">Learn More</a>
                </div>
            </div>
            <div class="landingImage" data-aos="fade-down" data-aos-duration="2000">
                <img src="image/1.jpg">
            </div>
        </div>

        <!--services-->
        <section id="services" class="section-bg">
            <div class="container">
    
            <header class="section-header" >
            <center>
                <h3 data-aos="fade-right" data-aos-duration="1000">Services</h3>
                <p data-aos="fade-left" data-aos-duration="1000">Online Complain Registration & Management System-  Street-Pipe-Road</p>
                </center>
                </header>
                <br>
            <div class="row" >

                
                <div class="box" style="margin-top:-200px" data-aos="fade-right" data-aos-duration="2000">
                    <div class="icon"><i class="ion-ios-bookmarks-outline" style="color: #e9bf06;"></i></div>
                    <h4 class="title">Street Light Problem</h4>
                    <p class="description">We can Handle your Street light problems like light blubs are break,it can not work proper etc.</p>
                    
                    </div>
                </div>
    
                
                <div class="box" style="margin-top:-100px" data-aos="fade-left" data-aos-duration="4000">
                    <div class="icon"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
                    <h4 class="title">Water Pipe Problem</h4>
                    <p class="description">We can handle your Water Pipe related problems like water pipe are break or pipe leakage.</p>
                </div>
                </div>
                
                <div class="box" style="margin-top:-200px;left:80px;" data-aos="fade-up" data-aos-duration="6000">
                    <div class="icon"><i class="ion-ios-speedometer-outline" style="color:#41cf2e;"></i></div>
                    <h4 class="title">Road cave Problem</h4>
                    <p class="description">We can handle you road cave complain like small to large caves on the road,road damage etc.</p>
                </div>
                </div>
    
                
            
            </div>
    
            </div>
       </section>


        <!--2nd part-->

        <div  id="help" class="about" style="  box-shadow: inset 0px 0px 12px 0px rgba(0, 0, 0, 0.1);    background: #ecf5ff;    padding: 100px 0 40px 0;">
        <div class="aboutText" data-aos="fade-up" data-aos-duration="1000">
            <h1>How to Create Account &<br><span style="color:#2f8be0;font-size:3vw">Register your Complain</span></h1>
            <img src="image/user1.png" alt="" style="margin-top: 70px; margin-left: 70px; height: 400px; width: 500px;">
        </div>
        <div class="aboutList" data-aos="fade-left" data-aos-duration="1000" style="padding-bottom:30px">
            <ol>
                <li data-aos="fade-left" data-aos-duration="1000">
                    <span>01</span>
                    <p style="font-size: 20px; font-weight: 300;">First of all you can register into the site.</p>
                </li>
                <li data-aos="fade-left" data-aos-duration="2000">
                    <span>02</span>
                    <p style="font-size: 20px; font-weight: 300;">Create Account successfully Than Login.</p>
                </li>
                <li data-aos="fade-left" data-aos-duration="3000">
                    <span>03</span>
                    <p style="font-size: 20px; font-weight: 300;">After Login you can register your complain.</p>
                </li>
                <li data-aos="fade-left" data-aos-duration="1000">
                    <span>04</span>
                    <p style="font-size: 20px; font-weight: 300;">You can view all the Features about the site.</p>
                </li>
            </ol>
        </div>
    </div>


       


        <!--4th Part-->
        <div style="margin-top:50px"></div>
        <div class="con" style="background-color: #E7C950;">
            <div class="aboutText" style="padding-top: 50px;" data-aos="fade-up" data-aos-duration="1000">
                <h1>Complain solve-<br><span style="color:#2f8be0;font-size:3vw">Street light,Water Pipe,Road cave</span></h1>
            </div>
            <div class="container1" style="background-color: #E7C950; widows: 100wh;" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="2000">
        <div class="containerdata">

        ';

        $sql="SELECT * FROM `complain_tb` WHERE `complete`=1";
        $result=mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $complaint_id=$row["complaint_id"];
            $complaint_name=$row["complaint_title"];
            $complaint_dis=$row["complaint_discription"];
            $complaint_ctimestamp=$row["ctimestamp"];
            $date=date_create($complaint_ctimestamp);
            $res_c_image=$row["image"];
        
                echo '
                    <div class="box">
                        <div class="imgBx">';
                        $res_c_image=explode(" ",$res_c_image);
                            $count=count($res_c_image)-1;
                            for ($i=0; $i <1 ; ++$i) { 
                                echo '<img src="'.$res_c_image[$i].'" alt=""  width="280px" height="400px" >';
                            }

                        echo '</div>
                        <div class="content">
                            <h2>'.$complaint_name.'</h2>
                            <p>'.$complaint_dis.'</p>
                            <p>'.date_format($date, 'g:ia \o\n l jS F Y').'</p>
                            <a class="complaint-a" href="view_complaint.php?cid='.$complaint_id.'" style="text-decoration:none;">Read More</a>
                        </div>
                    </div>';
        }
              echo '  </div>
        

            </div>
        </div>

        <!-----About us--->
        <section id="aboutus" >
          
    
            <div class="circle circle1" style="margin-bottom:20px">
                <img src="image/wrkr3.jpg" width="50px" height="50px" alt="" data-aos="fade-up" data-aos-duration="1000">
            </div>
            <div class="circle circle2">
                <img src="image/wrkr.jpg" alt="" data-aos="fade-down" data-aos-duration="1000">
            </div>
            <div>
                <h2>Our Services</h2>
                <p data-aos="fade-right" data-aos-duration="1000">The main purpose of this project is to help the public in knowing their place details and getting their problems solved in online without going to the officer regularly until the problem is solved. By this system the public can save his time and eradicate corruption in government offices. Its main purpose is to provide a smart and easy way through web Application for Complaint registration and its Tracking and eradicating system and thus to prevent Corruption.By using this application people can register their complaints in easy and proper format .They will also well aware about their complaints progress. They can also provide feedback about their complaints progress weather they are satisfied or not.
                    </p><br>
                    
                    <p data-aos="fade-up" data-aos-duration="1000">We want to develop an we application for complaint management system where public can register complaints for street light, water pipe leakage, rain water drainage, road reconstruction and garbage system. Online Complaints Management&Registration System-Street,Pipe,Water To transform the existing manual compliant management system into an automate system. For the better management of complaints to improve efficiency.Also they user can post their requirements through this system and they will receive  needed items by admin  within couple of hours ,its depending on the needed item and you can also look your status about your requirements. These user complaints, needs requirements maintain by admin. The User post feedback of these CMS system and admin can view this feedback.
</p>
            </div>
	
        </section>
           
          


        <!--5th worker display-->


        <div class="aboutText" style="margin: 10px 0px;" data-aos="fade-up" data-aos-duration="1000">
            <h1><span style="color:#2f8be0;font-size:3vw">Our Officer</span></h1>
        </div>
        <div class="swiper-wrap">
            <div class="swiper-container">
                <div class="swiper-wrapper">';
                    
                    $sql="SELECT * FROM `usertb` WHERE `user_role`='worker'";
                    $result=mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $user_id=$row["user_id"];
                        $user_name=$row["user_name"];
                        $last_name=$row["last_name"];
                        $user_image=$row["user_image"];
                        
                   echo ' <div class="swiper-slide">
                   <img src="../project/worker/'.$user_image.'" class="swiper-image" alt="" height="100px" width="100px" style="
                                            
                                            "><center>
                   <br>
                   <h3 style="color:red;font-size:30px;">'.$user_name.' '.$last_name.'</h3>
               </center></div>';
                    }
                   echo ' </div>
            </div>
        </div>
        ';
                    }
        ?>

    </div>
    <!--Footer start-->
    <?php include("partial/footer.php"); ?>
    </div>
    <script src="../package/swiper-bundle.min.js"></script>                    
    <script>
        var swiper = new Swiper('.swiper-container', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 20,
                stretch: 0,
                depth: 200,
                modifier: 1,
                slideShadows: true,
            },
            loop: true,
            autoplay: {
                delay: 800,
                disableOnInteraction: false,
            },
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>