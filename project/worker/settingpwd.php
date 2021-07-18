<!--go to this link=?https://fontawesome.com/icons?d=gallery&q=account---->
<html>
<style>
.jumbotron {
    background: #85C1E9;
}

.jumbotron:hover {
    background: #A3E4D7;
}
form i{
    position:absolute;
    font-size:25px;
    color:gray;
    
}
i.fa-key{
    margin:-30px 0 0 750px;
}
</style>
<script>
function checkforblank() {
    if (document.getElementById('opwd').value == "" || document.getElementById('npwd').value == "" || document
        .getElementById('rpwd').value == "") {
        alert('Fill All Data must be require..');
        return false;
    }
}
</script>



<body>
    <div class="wrapper">
        <div class="wrapper_inner">
            <!--sidebar start -->
            <?php include "partial/_sidebar.php"; ?>
            <!--sidebar over -->
            <!--main container-->
            <div class="main_container">
                <!--Header container start-->
                <?php include "partial/_header.php"; ?>
                <!--header End-->
                <!--work Container start-->


                <div class="accountpassword">
                <div class="aheader" style="margin-top:10px; margin-left:10px;">
                    <h2><i class="fas fa-lock"></i><span>Worker Change Password</span></h2>
                </div>
                <div class="container" style="width: 80%;">
                    <div class="jumbotron pt-4 pb-4">
                        <?php
                        if(isset($_SESSION['loginworker']) && $_SESSION['loginworker']==true) 
                                { 
                             $wemail=$_SESSION['workeremail'];
                             
                               $sql="SELECT * FROM `usertb` WHERE `user_email`='$wemail'";
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
                                <input type="text" class="form-control" value="'.$row["pwd"].'" id="opwd" name="opwd"
                                    aria-describedby="emailHelp" readonly>

                            </div>
                            <div class="form-group">
                                <label for="new password"> New Password</label>
                                <input type="password" class="form-control" id="npwd" name="npwd"
                                    placeholder="Enter New Password">
                                    <i class="fas fa-key" onclick="show2()"></i>
                            </div>
                            <div class="form-group">
                                <label for="Reenter password">Re-enter New Password</label>
                                <input type="password" class="form-control" id="rpwd" name="rpwd"
                                    placeholder="Re-Enter New Password">
                                    <i class="fas fa-key" onclick="show()"></i>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a href="setting.php" class="btn btn-primary">Back</a></td>
                        </form>';
                    }
                }
                ?>

                    </div>
                </div>
            </div>
                <!--work Container over-->
            </div>
            <!--main Container over-->
            <!--footer-->
            <?php include "partial/footer.php"; ?>
        </div>
        <!--main Container-->

    </div>

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
               $sql="SELECT `user_email`,`pwd` FROM `usertb` WHERE user_email='$wemail' AND pwd='$opwd' AND user_role='worker'";
               $result=mysqli_query($conn,$sql);
               $num=mysqli_fetch_array($result);
               if($num>0){
                    $sql="UPDATE `usertb` SET pwd='$rpwd' WHERE user_email='$wemail'AND user_role='worker'";
                    $result=mysqli_query($conn,$sql);
                    if($result)
                    {
                        echo '<script>alert("Password Upadated..")</script>';
                        echo '<script> swal({
                            title: "Password Upadated..",
                            icon: "success",
                            button: "Done",
                        });</script>';
                    }
                    else{
                        echo '<script>alert("Something is Wrong..  Password is not Upadated..")</script>';
                        echo'<script> swal({
                            title: "Something is Wrong",
                            text: "Password is not Upadated..",
                            icon: "error",
                            button: "Again Fill the Data",
                        });</script>';
                    }
               }
            }else{
                echo '<script>alert("Something is Wrong .... Password Reenter password Not Same")</script>';
                echo '<script> swal({
                    title: "Something is Wrong",
                    text: "Password Reenter password Not Same",
                    icon: "error",
                    button: "Again Fill the Data",
                });</script>';
            }

        }
    }
       
?>

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