<!DOCTYPE html>
<html lang="en">
<?php include('_dbconnect.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS-ADMIN&WORKER</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<script>
function checkforblank() {
    if (document.getElementById('loginemail').value == "" || document.getElementById('loginpwd').value == ""||document.getElementById('loginu').value == "") {
        alert('Fill All Data must be require..');
        return false;
    }
}
</script>
<style>
form i{
    position:absolute;
    font-size:25px;
    color:gray;
    
}
i.fa-key{
    margin:-30px 0 0 250px;
}
</style>
<script language="javascript" type="text/javascript">
	window.history.forward();
</script>
<?php

if (isset($_POST['login'])) 
{
    

         if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $uemail=$_POST['loginemail'];
            $password=$_POST['loginpwd'];

            $ulrole=$_POST['loginu'];
            $sql="SELECT * FROM `usertb` WHERE `user_email`='$uemail' AND `user_role`='$ulrole' ";
            $result=mysqli_query($conn,$sql);
            $numrow=mysqli_num_rows($result);
            if($numrow==1) 
            {
              
                $row=mysqli_fetch_assoc($result);
                if($password==$row['pwd'])
                {
                    echo '<script>alert("Welcome To Our side")</script>';
                    $string="admin";
                    if($ulrole==$string){
                            session_start();
                            $_SESSION['loginadmin']=true;
                            $_SESSION['admin_id']=$row['user_id'];
                            $_SESSION['adminemail']=$uemail;
                            $msg="logged in ".$uemail;
                            echo "" ;
                            header("Location:admin/index.php");
                    }
                    else{
                        
                        session_start();
                        $_SESSION['loginworker']=true;
                        $_SESSION['worker_id']=$row['user_id'];
                        $_SESSION['workeremail']=$uemail;
                        $msg="logged in ".$uemail;
                        echo "" ;
                        header("Location:worker/index.php");
                    }     
                }
                else{
                    echo '<script>alert("Your Password Not match...")</script>';
                }   
            }else{
                echo '<script>alert("You Enter Wrong Data...")</script>';
        }
    
}
}
else
{
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
         $sname=$_POST['signupname'];
         $semail=$_POST['signupemail'];
         $spwd=$_POST['signuppwd'];
         $scpwd=$_POST['signupcpwd'];
         $urole=$_POST['typea'];
         $que=$_POST['que'];
         $ans=strtolower($_POST['ans']);
         $checksql="SELECT * FROM `usertb` WHERE `user_email`='$semail'";
        $cresult=mysqli_query($conn,$checksql);
        $num_row=mysqli_num_rows($cresult);
        if($num_row>0){
            echo '<script>alert("Add New Email id to Create Account.....")</script>'; 
        }
       else
       {
                if($spwd==$scpwd)
                {
                    $sql="INSERT INTO `usertb` (`user_name`, `user_email`, `user_role`, `pwd`, `security_que`, `sequrity_ans`, `account_time`) VALUES ('$sname', '$semail', '$urole', '$spwd','$que','$ans', current_timestamp());";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        echo '<script>alert("Your Account create succsessfully...")</script>';
                    }
                    else{
                        echo '<script>alert("not data acccept Fill Data Again...")</script>';
                    }
                }
                else{ 
                    echo '<script>alert("Password or confirm password are not same...")</script>';  
                }
        }
    }
}
?>
<body>
 
    <section>
        <header>
            <a href="#" class="logo">Complain Registration & Management System- Street-Pipe-Road</a>
            
            <div class="toggle"></div>
            <div class="headerbtn">
                <button type="submit" class="submit-btn-click" onclick="showform()">Register</button>
                <button type="submit" class="submit-btn-click" onclick="onlyloginform()">Login</button>
                <button type="submit" class="submit-btn-click" id="cms-btn" onclick="showcms()">View CMS</button>
            </div>
        </header>
        <img src="image/background.jpg" class="bg">
        <img src="image/ghjjj.png" class="work" id="contwork">

        <div class="content" id="contcms">
            <h2>CMS<br><span></span></h2>
            <p>The main purpose of this project is to help the public in knowing their place details and getting their problems solved in online without going to the officer regularly until the problem is solved. By this system the public can save his time and eradicate corruption in government offices.We want to develop an we application for complaint management system where public can register complaints for street light, water pipe leakage, rain water drainage, road reconstruction and garbage system. </p>

            <a href="#">Join Us</a>
        </div>
      
            <div class="form-box" id="contform">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                    <button type="button" class="toggle-btn" onclick="register()">Register</button>
                </div>
                <!--Login Form-->
               <?php
                echo' <form id="login" action="" onsubmit="return checkforblank()" method="post" class="input-group">
                    <div class="social-icons">
                        <img src="image/5.jpg">
                    </div>
                    <input type="email" id="loginname" name="loginemail" class="input-field" placeholder="Email-id" required>
           
                    <input type="password" id="loginpwd" name="loginpwd" class="input-field"
                        placeholder="Enter Password" required>
                        <i class="fas fa-key" onclick="show()"></i>

                    <input type="radio" id="loginu" name="loginu"  value="admin" checked>
                    <label for="male">Admin</label>
                    <input type="radio" id="loginu" name="loginu"  value="worker">
                    <label for="female">Worker</label><br>
                    <a style="cursor: pointer;" href="frd1_pwd.php"><label>Forget Password???</label></a><br>
                    <button type="submit" name="login" class="submit-btn">Login</button>
                    <button type="reset" class="submit-btn">Reset</button>
                </form>';
                ?>
                
                <!--Registeration form-->
                <form action="" method="post" id="register" class="input-group">
                    Any one Selected : <input type="radio" id="typea" name="typea"  value="admin" checked>
                    <label for="male">Admin</label>
                    <input type="radio" id="typea" name="typea"  value="worker" >
                    <label for="female">Worker</label><br>
                    <input type="text" class="input-field" placeholder="Name" id="signupname" name="signupname"
                        required>
                    <input type="email" class="input-field" placeholder="Email-Id" id="signupemail" name="signupemail"
                        required>
                    <input type="password" class="input-field" placeholder="Enter Password" id="signuppwd"
                        name="signuppwd" required>
                    <input type="password" class="input-field" placeholder="Confirm Password" id="signupcpwd"
                        name="signupcpwd" required>
                        Select Question
                        <select name="que" style="padding: 1px 5px;" required>

<option disabled selected>---SELECT---</option>
<option>Your favourite colour ???</option>
<option>Your favourite food ???</option>
<option>Your favourite movie ???</option>
</select>
<input type="text" id="ans" name="ans" class="input-field" placeholder="Ans of Selected Security Question" required>
                    <button type="submit" name="signup" class="submit-btn">Register</button>
                    <button type="reset" class="submit-btn">Reset</button>
                </form>

                <form id="onlylogin" action="" method="post" class="input-group">
                    <div class="social-icons">
                        <img src="image/5.jpg">
                    </div>
                    <input type="email" id="loginname" name="loginemail" class="input-field" placeholder="Email-id" required>
                    <input type="password" id="loginpwd" name="loginpwd" class="input-field"
                        placeholder="Enter Password" required>
                    <input type="radio" id="loginu" name="loginu"  value="admin" checked>
                    <label for="male">Admin</label>
                    <input type="radio" id="loginu" name="loginu"  value="worker">
                    <label for="female">Worker</label><br>
                    <a style="cursor: pointer;" href="frd1_pwd.php"><label>Forget Password???</label></a><br>
                    <button type="submit" name="login" class="submit-btn">Login</button>
                    <button type="reset" class="submit-btn">Reset</button>
                </form>
                
            </div>
        

        <div class="textBlocks" id="textblock">
            <div class="block">
                <h3>Admin</h3>
                <p>Admin handle the full website,User Complaint,Re-complaints,and also notify to worker for his work and user to his Complain solution. 
</p>
            </div>
            <div class="block">
                <h3>Worker</h3>
                <p>Worker can Registration,Login,View Complaints,Re-complaints,Feedback,Update Work Status and update Proof Of work.
</p>
            </div>
        </div>
    </section>
    <script type="text/javascript">
    document.addEventListener("mousemove", function(e) {
        const bg = document.querySelector('.bg');
        const work = document.querySelector('.work');
        const content = document.querySelector('.content');

        bg.style.width = 100 + e.pageX / 100 + '%';
        bg.style.height = 100 + e.pageX / 100 + '%';

        work.style.right = 100 + e.pageX / 2 + 'px';

        content.style.left = 100 + e.pageX / 2.5 + 'px';
    })

    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");

    function register() {
        x.style.left = "-400px"
        y.style.left = "50px";
        z.style.left = "110px";
    }

    function login() {
        x.style.left = "50px"
        y.style.left = "450px";
        z.style.left = "0px";
    }

    var cont = document.getElementById("contcms");
    var cwork = document.getElementById("contwork");
    var contform = document.getElementById("contform");
    var cmsbtn = document.getElementById("cms-btn");
    var textblock=document.getElementById("textblock");
    var onlylogin=document.getElementById("onlylogin");

    function showform() {
        cont.style.visibility = "hidden";
        cwork.style.visibility = "hidden";
        textblock.style.visibility = "hidden";
        contform.style.visibility = "visible";
        cmsbtn.style.visibility = "visible";
        onlylogin.style.visibility = "hidden";
    }
    function onlyloginform() {
        console.log("click");
        cont.style.visibility = "hidden";
        cwork.style.visibility = "hidden";
        textblock.style.visibility = "hidden";
        contform.style.visibility = "hidden";
        cmsbtn.style.visibility = "visible";
        onlylogin.style.visibility = "visible";
    }

    function showcms() {
        cmsbtn.style.visibility = "hidden";
        cont.style.visibility = "visible";
        cwork.style.visibility = "visible";
        textblock.style.visibility = "visible";
        contform.style.visibility = "hidden";
    }

    </script>
    <script>
    function show(){
        var pswrd=document.getElementById("loginpwd");
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
        var pswrd=document.getElementById("loginpwd");
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



