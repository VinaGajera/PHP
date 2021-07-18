<?php 
include("partial/_dbconnect.php");
include("partial/link.php");
session_start();
?>
<style>
form i{
    position:absolute;
    font-size:25px;
    color:gray;
    
}
i.fa-key{
    margin:-30px 0 0 140px;
}
</style>

<body>

    <div class="wrapper" style="margin-bottom:5%">
        <!--navigation bar start-->
        <?php include("partial/header.php"); ?>
        <!--navigation bar end-->
        <!--Work area start-->
        <img class="wave" src="image/wave.png">
        <div class="container" id="createcontainer">
            <div class="img">
                <img src="image/fr_pwd1.jpg" data-aos="fade-left" data-aos-duration="1000">
            </div>
            <div class="login-content">
               
            <div class="accountpassword" style="margin:5%" data-aos="fade-left" data-aos-duration="1000">
                <div class="aheader">
                    <h5><i class="fas fa-key"></i> <span>You Can Change Password</span></h5>
                </div>
                <div class="container" style="width: 80%;">
                    <div class="jumbotron pt-4 pb-4">

                        <?php
                             if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) 
                             {
                                
                                $uemail=$_SESSION['useremail'];
                                  $sql="SELECT * FROM `usertb` WHERE `user_email`='$uemail'";
                                $result=mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $aname=$row["user_name"];
                                    
                                    echo '<h4 class="mb-3"><i class="fas fa-users"></i>&nbsp;&nbsp;'.ucfirst($aname).'</h4>';
                                    echo '<h6><b>Your Email ID:</b>&nbsp;&nbsp;'.$row["user_email"].'</h6>';

                                    $almtime=date_create($row["account_time"]);
                                    echo ' <p><b>Last Update :</b>
                                    <span>'.date_format($almtime, 'd/m/Y H:i:s').'</span></p>';
                             

                       echo ' <form action="" method="post" onsubmit="return checkforblank()" name="changpwd" id="changpwd">
                            <div class="form-group">
                                <label for="current password">Current Password</label>
                                <input type="text" value="'.$row["pwd"].'" class="form-control" id="opwd" name="opwd"
                                    aria-describedby="emailHelp" placeholder="Enter Current Password">

                            </div>
                            <div class="form-group">
                                <label for="new password"> New Password</label>
                                <input type="password" class="form-control" id="npwd" name="npwd"
                                    placeholder="Enter New Password" required >
                                    <i class="fas fa-key" onclick="show2()"></i>
                            </div>
                            <div class="form-group">
                                <label for="Reenter password">Re-enter New Password</label>
                               <span>
                                <input type="password" class="form-control" id="rpwd" name="rpwd"
                                    placeholder="Re-Enter New Password" required >
                                <i class="fas fa-key" onclick="show()"></i>
                                </span>


                                
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a href="changeinfo.php" style="border-radius:25px;" class="btn btn-primary">Back</a>
                        </form>';
                    }
                }
                ?>
                    </div>
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
    <script>
    function show(){
        var pswrd=document.getElementById("rpwd");
        var icon=document.querySelector('.fa-key');
         if (pswrd.type==="password") {
             pswrd.type="text";
             //pswrd.style.margin="text";
            icon.style.color="red";
         }
         else{
            pswrd.type="password";
             //pswrd.style.margin="text";
            icon.style.color="gray";
         }
    }
    function show2(){
        var pswrd=document.getElementById("npwd");
        var icon=document.querySelector('.fa-key');
         if (pswrd.type==="password") {
             pswrd.type="text";
             //pswrd.style.margin="text";
            icon.style.color="red";
         }
         else{
            pswrd.type="password";
             //pswrd.style.margin="text";
            icon.style.color="gray";
         }
    }
    </script>


</body>

</html>
<?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['submit'])){
            $opwd=$_POST['opwd'];
            $npwd=$_POST['npwd'];
            $rpwd=$_POST['rpwd'];
            if($npwd==$rpwd){
               $sql="SELECT `user_email`,`pwd` FROM `usertb` WHERE user_email='$uemail' AND pwd='$opwd' AND user_role='user'";
               $result=mysqli_query($conn,$sql);
               $num=mysqli_fetch_array($result);
               if($num>0){
                    $sql="UPDATE `usertb` SET pwd='$rpwd' WHERE user_email='$uemail'AND user_role='user'";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        echo'<script> swal({
                            title: "Password Upadated..",
                            icon: "success",
                            button: "Done",
                        });</script>';
                    }
                    else{
                        echo'<script> swal({
                            title: "Something is Wrong",
                            text: "Password is not Upadated..",
                            icon: "error",
                            button: "Again Fill the Data",
                        });</script>';
                    }
               }
            }else{
                echo'<script> swal({
                    title: "Something is Wrong",
                    text: "Password Reenter password Not Same",
                    icon: "error",
                    button: "Again Fill the Data",
                });</script>';
            }

        }
    }
       
?>

