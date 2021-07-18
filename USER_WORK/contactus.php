<?php 
include("partial/_dbconnect.php");
include("partial/link.php");
session_start();
?>
  
<link rel="stylesheet" type="text/css" href="css/new/main.css">
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
  
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
			<a href="index.php">
						<span style="margin-left:6%;    position:absolute;
    margin-top: 10%;"><h4>Back</h4></span>
					</a>
					
			</span>
		<div class="wrap-contact100">
			

			<form class="contact100-form validate-form" action="" method="post">
            
				<span class="contact100-form-title">
					Contact Us
				</span>


				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Your Name</span>
					<input class="input100" type="text" name="name" id="name" placeholder="Enter your Full Name">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Email-id</span>
					<input class="input100" type="text" name="email" id="email" placeholder="Enter your Email-id">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Message</span>
					<textarea class="input100" name="message" id="message" placeholder="Your message here..."></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Submit
							<i class="fas fa-paper-plane m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>

			<span class="contact100-more">
			<a href="index.php">
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
   if($_SERVER["REQUEST_METHOD"]=="POST"){

	 echo  $name=$_POST['name'];
	 echo $email=$_POST['email'];
	 echo $msg=$_POST['message'];
	   $sql="INSERT INTO `contactus` (`c_username`, `c_useremail`, `c_usermessage`, `c_usertime`) VALUES
	    ('$name', '$email', '$msg', current_timestamp())";
	   $result=mysqli_query($conn,$sql);
	   if($result)
	   {
		  echo'<script> swal({
			  text: "Your Data is Registered....",
			  icon: "success",
			  button: "Do It Again",
		  });</script>';
	   }else{
		  echo'<script> swal({
			  text: "Not work",
			  icon: "error",
			  button: "Do It Again",
		  });</script>';
	   }
	  }


?>