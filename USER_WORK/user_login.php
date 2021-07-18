<?php 
include("partial/link.php");
include("partial/_dbconnect.php");

?>
<script language="javascript" type="text/javascript">
	window.history.forward();
</script>
<?php
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
     $uemail=strtolower ($_POST['loginemail']);
     $password=strtolower ($_POST['loginpwd']);
     
     //echo $uemail.$password.$ulrole;
     $sql="SELECT * FROM `usertb` WHERE `user_email`='$uemail' AND `user_role`='user'";
     $result=mysqli_query($conn,$sql);
     $numrow=mysqli_num_rows($result);
     if($numrow==1) 
     {
       
         $row=mysqli_fetch_assoc($result);
         if($password==$row['pwd'])
         {
             session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['useremail']=$uemail;
            header('Location:index.php');       
         }
         else{
            echo '<script>alert("Password Not Match....")</script>';
                 echo'<script> swal({
                     text: "password not match",
                     icon: "error",
                     button: "GO To Login",
                 });</script>';
                // header('Location:/USER_WORK/index.php');       
         }   
     }
     else{
        echo '<script>alert("This Name User can not Exist...")</script>';
        echo'<script> swal({
            text: "you Enter Wrong Data",
            icon: "error",
            button: "GO To Login",
        });</script>';
       // header('Location:/USER_WORK/index.php');       
 }
}
?>
<body>
    <div class="wrapper">
        <!--navigation bar start-->
        <?php include("partial/header.php"); ?>
        <!--navigation bar end-->
        <!--Work area start-->
        <img class="wave" src="image/wave.png">
    <div class="container">
        <div class="img">
            <img src="image/login.png">
        </div>
        <div class="login-content">
            <!--<form action="/USER_WORK/handal_login.php" method="post">-->
            <form action="" method="post">
                <img src="image/pro_pic1.png" height="300px" width="150px">
                <h2 class="title" style="color:#38d39f;padding-top:20px;font-size:30px">Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Enter Email</h5>
                        <input type="text" id="loginemail" name="loginemail" class="input" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock" onclick="show()"></i>
                    </div>
                    <div class="div">
                        <h5>Enter Password</h5>
                        <input type="password" id="loginpwd" name="loginpwd" class="input" required>
                    </div>
                </div>
                <a href="frt_pwd1.php">Forgot Password?</a>
                <input type="submit" style="border-radius:25px;" class="btn" value="Login">
            </form>
        </div>
    </div>



        
        <!--Work area end-->
       
    </div>




    <!--Footer start-->
    </div>

    <script src="../package/swiper-bundle.min.js"></script>
    <script type="text/javascript">
        const inputs = document.querySelectorAll(".input");


        function addcl() {
            let parent = this.parentNode.parentNode;
            parent.classList.add("focus");
        }

        function remcl() {
            let parent = this.parentNode.parentNode;
            if (this.value == "") {
                parent.classList.remove("focus");
            }
        }


        inputs.forEach(input => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl);
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
<script>
    function show(){
        var pswrd=document.getElementById("loginpwd");
        var icon=document.querySelector('.fa-lock');
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
