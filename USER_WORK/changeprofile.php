<?php 
include("partial/_dbconnect.php");
include("partial/link.php");
session_start();
?>
<script>
function checkforblank() {
    if (document.getElementById('firstname').value == "" || document.getElementById('lastname').value == "" || document
        .getElementById('contactno').value == "" || document.getElementById('file').value == "" || document
        .getElementById('city').value == "" || document.getElementById('area').value == "" || document.getElementById(
            'pincode').value == "") {
        alert('Fill All Data must be require..');
        return false;
    }
}

function phonenumber() {
    if (document.getElementById('contactno').value.length == 10) {
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

    <div class="wrapper" style="margin-bottom:15%">
        <!--navigation bar start-->
        <?php include("partial/header.php"); ?>
        <!--navigation bar end-->
        <!--Work area start-->
        <img class="wave" src="image/wave.png">
        <div class="container" id="createcontainer">
            <div class="img">
                <img src="image/cc.svg" data-aos="fade-right" data-aos-duration="1000">
            </div>
            <div class="login-content" style="width:1220px">
                <!--Account Profile setting Start-->
                <div class="accountprofile" style="margin:2% 0%;">



                    <div class="container" data-aos="fade-left" data-aos-duration="1000">

                        <div class="jumbotron ml-4">
                            <h3><i class="fas fa-key"></i> <span>Set Profile</span></h3>
                            <div class="col-md-12 order-md-1">
                                <?php
                             if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) 
                             {
                                
                                $uemail=$_SESSION['useremail'];
                                 $sql="SELECT * FROM `usertb` WHERE `user_email`='$uemail'";
                                $result=mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $aname=$row["user_name"];
                                    $uimage=$row["user_image"];
                                    $almtime=date_create($row["account_time"]);
                                    echo '<h4 class="mb-3"><i class="fas fa-users"></i>&nbsp;&nbsp;'.ucfirst($aname).'</h4>';
                                    echo ' <p><b>Last Update :</b>
                            
                                    <span>'.date_format($almtime, 'd/m/Y H:i:s').'</span></p>';
                              


                           echo ' <form class="needs-validation" style="width:600px;" action="" method="post" novalidate=""
                                enctype="multipart/form-data" onsubmit="return checkforblank()">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">First name</label>
                                        <input type="text" value="'.$row["user_name"].'" class="form-control" id="firstname" name="firstname" value="" maxlength="20" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" required>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName">Last name</label>
                                        <input type="text" value="'.$row["last_name"].'" class="form-control" id="lastname" name="lastname" maxlength="20" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
                                            placeholder="" value="" required>
                                        <div class="invalid-feedback">
                                            Valid last name is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- <div class="col-md-6 mb-3">
                                        <label for="email">Email </label>
                                        <input type="email" value="'.$row["user_email"].'" class="form-control" id="email" name="email" placeholder="" value="" required>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>-->
                                    <div class="col-md-6 mb-3" >
                                        <label for="contactno">Contact No</label>
                                        <input type="text" value="'.$row["contact"].'" class="form-control" id="contactno" onfocusout="phonenumber()" name="contactno" maxlength="10" size="10"
                                        onkeypress="return (event.charCode < 48 || event.charCode <= 57)" required>


                                    </div>
                               
                                
                                </div>
                                <div class="form-group">
                                    <label for="file">Profile Photo :</label>
                                    <img src="'.$uimage.'" height="100px" width="100px" style="
            border-radius:30px;
           margin-right:30px;
           padding:5px;
            ">
                                    <input type="file" value="5.jpg" id="file" name="file" placeholder="" required>
                                    <br>Input This formate:png,jpg,jpeg
                                </div>
                                <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label for="city">City</label>
                                        <input type="text" value="'.$row["user_city"].'" class="form-control" id="city" name="city" placeholder="" onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
                                            value="" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="area">Area</label>
                                        <input type="text" value="'.$row["user_area"].'" class="form-control" id="area" name="area" placeholder=""
                                            value="" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="pincode">Pincode No</label>
                                        <input type="text"  value="'.$row["user_pincode"].'" class="form-control" id="pincode" name="pincode" onfocusout="pincodenumber()" maxlength="6" size="6"
                                        onkeypress="return (event.charCode < 48 || event.charCode <= 57)" required>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <button class="btn btn-dark btn-lg btn-block"  type="submit" >Submit</button>
                                        
                                        </div>
                                       <div class="col-md-3 mb-3">
                                       <a href="changeinfo.php" style="border-radius:25px;" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </form>';
                        }
                    }
                    ?>

                            </div>

                        </div>
                    </div>
                </div>
                <!--Account Profile setting end-->

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

<?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $firstname=strtolower($_POST['firstname']);
        $lastname=strtolower($_POST['lastname']);
       
        $contactno=$_POST['contactno'];
        $city=strtolower($_POST['city']);
        $area=strtolower($_POST['area']);
        $pincode=$_POST['pincode'];
        //file upload restriction
        //retrive file name,error,file tempraray name
        $image=$_FILES['file'];
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
            
                    $sql="UPDATE usertb SET user_name='$firstname',last_name='$lastname',user_image='$destinationfile',user_city='$city',contact='$contactno',user_area='$area',user_pincode='$pincode',account_time = now() WHERE user_email='$uemail'";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        echo'<script> swal({
                            title: "Your Profile info Updated..",
                            icon: "success",
                            button: "Done",
                        });</script>';
                    }
                   
             
         }
         else{
            echo'<script> swal({
                title: "Something is Wrong",
                text: "Your File formet is not Rigth Please enter Right formate.. ",
                icon: "error",
                button: "Again Fill the Data",
            });</script>';
        }
         //file retrive
        
       
      
    }
?>