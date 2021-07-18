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

        <img class="wave" src="image/wave.png">
        <div class="container" id="createcontainer">
            <div class="img">
                <img src="image/cc.svg" data-aos="fade-up" data-aos-duration="2000">
            </div>
            <div class="login-content">
                <form action="" method="post" enctype='multipart/form-data' id="create">
                    <h2 class="title" style="color:#38d39f;padding-top:-100px;font-size:30px">Add Complaint</h2>

                    <table style="padding-top: 50px; font-size:20px ">
                        <tr data-aos="fade-right" data-aos-duration="1000">
                            <td colspan="3">
                                <p style="color:#555;">Please select Actual Problem:</p>
                            </td>

                            <td style="padding:30px;padding-left:50px">
                                <input type="radio" id="light" name="problem" style="padding-top:10px" value="light">
                                <label for="male" style="padding-top:10px;">Select if Problem is <span style="color:#CECA12">Street Light Related</span> </label><br>
                                <input type="radio" id="water" name="problem" value="water" style="padding-top:10px">
                                <label for="female" style="padding-top:10px">Select if Problem is <span style="color:#50D6E7"> Pipe Related </span> </label><br>
                                <input type="radio" id="road" name="problem" value="road" style="padding-top:10px">
                                <label for="other" style="padding-top:10px">Select if Problem is <span style="color:#618256"> Road Related </span> </label>
                            </td>
                        </tr>
                    </table>
                    <div class="input-div one" data-aos="fade-left" data-aos-duration="1000">
                        <div class="i">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="div">
                            <h5>Complaint Title</h5>
                            <input type="text" class="input" id="ctitle" name="ctitle">
                        </div>
                    </div>


                    <div class="input-div one" data-aos="fade-left" data-aos-duration="1000">
                        <div class="i">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="div">
                            <h5>Complaint Discription</h5>
                            <input type="text" class="input" id="cdis" name="cdis">
                        </div>
                    </div>


                    <div class="input-div one" data-aos="fade-left" data-aos-duration="1000">
                        <div class="i">
                            <i class="fas fa-phone-square"></i>
                        </div>
                        <div class="div">
                            <h5>Where to work (Address)</h5>
                            <input type="text" class="input" id="add" name="add">
                        </div>
                    </div>

                    <div class="input-div one" data-aos="fade-left" data-aos-duration="1000">
                        <div class="i">
                            <i class="far fa-calendar-minus"></i>
                        </div>
                        <div class="div">
                            <h5>Proof of Damage Area(Submit Images)</h5>
                            <input type="file" class="input" name="images[]" multiple required/>
                        </div>
                    </div>


                    <div class="form-row" data-aos="fade-top" data-aos-duration="3000">
                        <div class="col">
                            <input style="border-radius:25px;" type="submit" class="btn" value="Add Complaint">
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
    <div style="margin:50px 0px;"></div>
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
     $uid=$_SESSION['user_id'];
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
        
         $sql="INSERT INTO `complain_tb` (`complaint_title`,`c_type`,`complaint_discription`, `user_id`, `padding`, `running`, `complete`, `image`, `c_address`,`ctimestamp`) VALUES
         ('$ctitle','$ctype','$cdis',$uid,1,0,0,'$data','$add', current_timestamp())";
         $result=mysqli_query($conn,$sql);
         if($result)
         {
            //echo '<script>alert("Done.")</script>';
            echo'<script> swal({
                text: "Your Complaint is Registered....",
                icon: "success",
                button: "okkkk",
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

  }
?>