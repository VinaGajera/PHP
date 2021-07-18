<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php 
include("partial/_dbconnect.php");
include("partial/link.php");
?>

<script>
function phonenumber() {
    if (document.getElementById('cno').value.length == 10) {
        return true;
    } else {
        alert("Enter 10 number in phone");
        return false;
    }
}

function pincodenumber() {
    if (document.getElementById('pincode').value..length == 6) {
        return true;
    } else {
        alert("Enter 6 number in pincode");
        return false;
    }
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if ((charCode > 31 && (charCode < 48 || charCode > 57)))
        return false;

    return true;
}
</script>

<body>

    <div class="wrapper">
        <!--navigation bar start-->
        <?php include("partial/header.php"); ?>
        <!--navigation bar end-->
        <!--Work area start-->
        <img class="wave" src="image/wave.png">
        <div class="container" id="regicontainer">
            <div class="img">
                <img src="image/regiclient.svg">
            </div>
            <div class="login-content">
                <form action="" method="post" id="registration" enctype='multipart/form-data'>
                    <h2 class="title" style="color:#38d39f;padding-top:20px;font-size:30px">Registration Form</h2>
                    <div class="row">
                        <div class="col">
                            <div class="input-div one">
                                <div class="i">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="div">
                                    <h5>First Name</h5>
                                    <input type="text" id="fnm" name="fnm" class="input" maxlength="20" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" title="Enter Only Character" required>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="input-div one">
                                <div class="i">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="div">
                                    <h5>Surname</h5>
                                    <input type="text" id="lnm" name="lnm" class="input" maxlength="20" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" title="Enter Only Character" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-div one">
                                <div class="i">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="div">
                                    <h5>Email-id</h5>
                                    <input type="email" id="email" name="email" class="input" required>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="input-div one">
                                <div class="i">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="div">
                                    <h5>Contact No.</h5>
                                    <input type="text" id="cno" name="cno" class="input" pattern="[0-9]{10}" onfocusout="phonenumber()"
                                        name="contactno" maxlength="10" size="10"
                                        onkeypress="return (event.charCode < 48 || event.charCode < 58)"
                                        title="Enter 10 Digit" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-address-card"></i>
                        </div>
                        <div class="div">
                            <h5>Place Your Photo</h5>
                            <input type="file" id="file" name="file" class="input" required>
                        </div>
                    </div>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-address-card"></i>
                        </div>
                        <div class="div">
                            <h5>Address</h5>
                            <input type="text" id="add" name="add" class="input" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="input-div one">
                                <div class="i">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="div">
                                    <h5>City</h5>
                                    <input type="text" id="city" name="city" class="input" required>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-div one">
                                <div class="i">
                                    <i class="fas fa-id-card-alt"></i>
                                </div>
                                <div class="div">
                                    <h5>Area</h5>
                                    <input type="text" id="area" name="area" class="input" required>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-div one">
                                <div class="i">
                                    <i class="fas fa-id-card-alt"></i>
                                </div>
                                <div class="div">
                                    <h5>Pincode</h5>
                                    <input type="text" id="pincode" name="pincode" class="input"
                                        onfocusout="pincodenumber()" maxlength="6" size="6" pattern="[0-9]{6}" title="Enter 6 Digit"
                                        onkeypress="return (event.charCode < 48 || event.charCode < 57)" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="input-div one">
                                <div class="i">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <div class="div">
                                    <h5>Enter Password</h5>
                                    <input type="password" id="pwd" name="pwd" class="input" required>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-div one">
                                <div class="i">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="div">
                                    <h5>Re-Enter Password</h5>
                                    <input type="password" id="cpwd" name="cpwd" class="input" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-address-card"></i>
                        </div>
                        <div class="div">
                            <h5>Select Security Question</h5>
                            <select name="que" style="padding: 5px 5px;" required>

                                <option disabled selected>---select---</option>
                                <option>your favourite colour ???</option>
                                <option>your favourite food ???</option>
                                <option>your favourite movie ???</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-address-card"></i>
                        </div>
                        <div class="div">
                            <h5>Write Ans Of Selected Security Question</h5>
                            <input type="text" id="ans" name="ans" class="input" required>
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="col">
                            <input style="border-radius:25px;" type="submit" class="btn" value="Register">
                        </div>
                        <div class="col">
                            <input style="border-radius:25px;" type="reset" class="btn" value="Clear">
                        </div>
                    </div>
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


</body>

</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
        $fnm=strtolower($_POST['fnm']);
        $lnm=strtolower($_POST['lnm']);
        $email=strtolower($_POST['email']);
        $cno=$_POST['cno'];
        $image=$_FILES['file'];
        $add=strtolower($_POST['add']);
        $city=strtolower($_POST['city']);
        $area=strtolower($_POST['area']);
        $pincode=$_POST['pincode'];
        $pwd=$_POST['pwd'];
        $cpwd=$_POST['cpwd'];
        $que=$_POST['que'];
        $ans=strtolower($_POST['ans']);
        
           $checksql="SELECT * FROM `usertb` WHERE `user_email`='$email'";
            $cresult=mysqli_query($conn,$checksql);
            $num_row=mysqli_num_rows($cresult);
            if($num_row>0){
                
                echo'<script> swal({
                    text: "Add New Email id to Create Account",
                    icon: "error",
                    button: "Do It Again",
                });</script>';
                
            }
            else
            {
                $file_name=$image['name'];
                $file_error=$image['error'];
                $filetmp=$image['tmp_name'];
                $fileext=explode('.',$file_name);
                $filecheck=strtolower(end($fileext));
                $fileextstored=array('png','jpg','jpeg');
                if(in_array($filecheck,$fileextstored))
                {
                    $destinationfile='userprofilepic/'.$file_name;
                    move_uploaded_file($filetmp,$destinationfile);
                            if($pwd==$cpwd)
                            {
                            
                                $sql="INSERT INTO `usertb` (`user_name`, `last_name`, `user_email`, `user_role`, `user_image`, `user_city`, `pwd`, `security_que`, `sequrity_ans`, `contact`, `user_area`, `user_pincode`, `account_time`) VALUES ('$fnm', '$lnm', '$email', 'user', '$destinationfile', '$city', '$pwd','$que','$ans', '$cno', '$area', '$pincode', current_timestamp());";
                                $result=mysqli_query($conn,$sql);
                                if($result)
                                {
                                    echo'<script> swal({
                                        text: "Your Account create succsessfully",
                                        icon: "success",
                                        button: "GO To Login",
                                    });</script>';
                                }
                                else{
                                    echo'<script> swal({
                                        title: "Try to Further",
                                        text: "Somthing Wrong Fill Data Again",
                                        icon: "error",
                                        button: "Do Again",
                                    });</script>';
                                }
                            }
                            else{   
                            echo' <script> swal({
                                text: "Password or confirm password are not match...",
                                icon: "error",
                                button: "Do Again",
                            });</script>';
                            }
                }
                else
                {
                        echo'<script> swal({
                            text: "Your profile image not specific formate",
                            button: "fill data next time",
                        });</script>';
                }
            }
}
?>