<?php 
include("partial/_dbconnect.php");
include("partial/link.php");
session_start();
?>
<link rel="stylesheet" type="text/css" href="css/new/main.css">

<body>


<div class="wrapper">
        <!--navigation bar start-->
        <?php include("partial/header.php"); ?>
	<div class="container-contact100">
		<div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="" data-scrollwhell="0" data-draggable="1"></div>

		<button class="contact100-btn-show">
			<i class="fas fa-smile" style="font-size:60px" aria-hidden="true"></i>
		</button>
		<span class="contact100-more">
			<a href="view_complaint.php">
						<span style="margin-left:6%;    position:absolute;
    margin-top: 10%;"><h4>Back</h4></span>
					</a>
					
			</span>

		<div class="wrap-contact100">
			

			<form class="contact100-form validate-form" action="" method="post">            
				<span class="contact100-form-title">Your Feedback</span>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Message</span>
					<textarea class="input100" name="message" id="message" placeholder="Your message here..."></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" name="submit" id="submit">
						<span>
							Submit
							<i class="fas fa-paper-plane m-l-7" aria-hidden="true"></i>
						</span>
						
					</button>
				</div>
				
					
						
			</form>

			<span class="contact100-more">
			<a href="view_complaint.php">
						<span style="margin-top:20px;margin-left:100px"><h4>Back</h4></span>
					</a>
					&nbsp;&nbsp;For any Question our Service 24/7 call center: <span class="contact100-more-highlight">+001 345 6889</span>
			</span>
		</div>
	</div>
<div>
	<div id="dropDownSelect1"></div>
	<script src="css/new/jquery-3.2.1.min.js"></script>
	<script src="css/new/popper.js"></script>
	<script src="css/new/bootstrap.min.js"></script>
	<script src="css/new/main.js"></script>
<script>
</script>

</body>
</html>
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) 
{
	$complaint_get_id=$_GET['cid'];
    $uid=$_SESSION['user_id'];
   if($_SERVER["REQUEST_METHOD"]=="POST"){
	$msg=$_POST['message'];
                $sql2="INSERT INTO `notify` ( `sender_user_id`, `complaint_id`, `sender_user_role`, `msg`, `msg_recive`, `send_msg`, `status`) VALUES
				('$uid', '$complaint_get_id', 'user', '$msg', 'admin', current_timestamp(), '0')";
                
                $result2=mysqli_query($conn,$sql2);
                if($result2)
                {
					echo "hello";
                    echo'<script> swal({
                        text: "Your Notification Send",
                        icon: "success",
                        button: "Ok",
                    });</script>';
                }else{
                    echo'<script> swal({
                        
                        text: "Some Problem in data",
                        icon: "error",
                        button: "Try to next time",
                    });</script>';
                }
   }
}
?>
