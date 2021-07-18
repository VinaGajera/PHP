<?php 
include("partial/_dbconnect.php");
include("partial/link.php");
session_start();
?>

<body>

    <div class="wrapper" style="margin-bottom:5%">
        <!--navigation bar start-->
        <?php include("partial/header.php"); ?>
        <!--navigation bar end-->
        <!--Work area start-->
        <img class="wave" src="image/wave.png">
        <div class="container" id="createcontainer">
            <div class="img">
                <img src="image/update.png" data-aos="fade-left" data-aos-duration="2000">
            </div>
            <div class="login-content" data-aos="fade-right" data-aos-duration="2000">
               
              
                <div class="jumbotron">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Change your Password :</span>
                        </div>&nbsp;
                        <a  href="changepwd.php" role="button">Change Password</a>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Change your Profile Info :</span>
                        </div>&nbsp;
                        <a  href="changeprofile.php" role="button">Change Profile</a>
                    </div>
                </div>
            

            </div>
        </div>



        <!--Work area end-->

    </div>



    <!--Footer start-->
    <?php include("partial/footer.php"); ?>
    </div>

    <script src="../package/swiper-bundle.min.js"></script>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>


</body>

</html>
