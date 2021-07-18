<?php 
include("partial/_dbconnect.php");
include("partial/link.php");
session_start();
?>

<body>

    <div class="wrapper">
        <!--navigation bar start-->
        <?php include("partial/header.php"); ?>
        <!--navigation bar end-->
        <!--Work area start-->
<?php

$cid_get=$_GET['cid'];
$cname_get=$_GET['cname'];
$cdis_get=$_GET['cdis'];
$cadd_get=$_GET['cadd'];
$ctype_get=$_GET['ctype'];
?>
        <img class="wave" src="image/wave.png">
        <div class="container" id="createcontainer">
            <div class="img">
                <img src="image/cc.svg">
            </div>
            <div class="login-content">
                <form action="" method="post" enctype='multipart/form-data' id="create">
                    <h2 class="title" style="color:#38d39f;padding-top:-100px;font-size:30px">Update  Complaint</h2>

                    <table style="padding-top: 50px; font-size:20px ">
                        <tr>
                            <td colspan="3">
                                <p style="color:#555;">Please select Actual Problem:</p>
                            </td>

                            <td style="padding:30px;padding-left:50px">
                                <input type="radio" id="light" name="problem" style="padding-top:10px" <?php if($ctype_get==='light') echo 'checked';?> value="light">
                                <label for="male" style="padding-top:10px;">Select if Problem is <span style="color:#CECA12">Street Light Related</span> </label><br>
                                <input type="radio" id="water" name="problem"
                                 <?php if($ctype_get==='water') echo 'checked';?> value="water" style="padding-top:10px">
                                <label for="female" style="padding-top:10px">Select if Problem is <span style="color:#50D6E7"> Water Related </span> </label><br>
                                <input type="radio" id="road" name="problem" value="road" <?php if($ctype_get==='road') echo 'checked';?> style="padding-top:10px">
                                <label for="other" style="padding-top:10px">Select if Problem is <span style="color:#618256"> Road Related </span> </label>
                            </td>
                        </tr>
                    </table>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="div">
                            <h5>Complaint Title</h5>
                            <input type="text" value="<?php echo $cname_get; ?>" class="input" id="ctitle" name="ctitle">
                        </div>
                    </div>


                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="div">
                            <h5>Complaint Discription</h5>
                            <input type="text" class="input" value="<?php echo $cdis_get; ?>" id="cdis" name="cdis">
                        </div>
                    </div>


                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-phone-square"></i>
                        </div>
                        <div class="div">
                            <h5>Where to work (Address)</h5>
                            <input type="text" class="input" value="<?php echo $cadd_get; ?>"id="add" name="add">
                        </div>
                    </div>
                    

                    <div class="input-div one">
                        <div class="i">
                            <i class="far fa-calendar-minus"></i>
                        </div>
                        <div class="div">
                            <h5>Proof of Damage Area(Submit Images)</h5>
                            <input type="file" class="input" name="images[]" multiple />
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col">
                            <input style="border-radius:25px;" type="submit" class="btn" value="Login">
                        </div>
                        <div class="col">
                            <input style="border-radius:25px;" type="reset" class="btn" value="Clear">
                        </div>
                        <div class="col">
                        <a href="view_complaint.php" style="border-radius:25px;" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>



        <!--Work area end-->

    </div>



    <!--Footer start-->
    <?php include("partial/footer.php"); ?>
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
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) 
  {
     $uemail=$_SESSION['useremail'];
     echo $uid=$_SESSION['user_id'];
     if($_SERVER["REQUEST_METHOD"]=="POST"){

            $ctitle=$_POST['ctitle'];
            $cdis=$_POST['cdis'];
            $add=$_POST['add'];
            $ctype=$_POST['problem']; 
            $file='';
            $file_tmp='';
            $location="complaintimage/";
            $data='';
            foreach($_FILES['images']['name'] as $key => $val){
                $file=$_FILES['images']['name'][$key];
                $file_tmp=$_FILES['images']['tmp_name'][$key];
                move_uploaded_file($file_tmp,$location.$file);
                $data .="complaintimage/".$file." ";
            }
        // image store -> $data;
        
        $sql="UPDATE `complain_tb` SET `complaint_title`='$ctitle',
        `c_type`='$ctype',`complaint_discription`='$cdis',
        `padding`=1,`running`=0,`complete`=0,
        `image`='$data',`c_address`='$add',
        `ctimestamp`=current_timestamp() WHERE `complaint_id`=$cid_get";
            $result=mysqli_query($conn,$sql);
            if($result)
            {
                //echo '<script>alert("Done.")</script>';
                echo'<script> swal({
                    text: "Your Complaint is Update....",
                    icon: "success",
                    button: "Done",
                });</script>';
            }else{
            // echo '<script>alert("Error.....")</script>';
                echo'<script> swal({
                    text: "Not work",
                    icon: "error",
                    button: "Do It Again",
                });</script>';
            }
     }
     else{
        //echo '<script>alert("Error.....")</script>';
       
     }

  }
?>