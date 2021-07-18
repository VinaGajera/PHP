<?php 
include('partial/_dbconnect.php'); 

?>
<?php
	 
	session_start();
	session_unset();
	session_destroy();
	//header("Location:http://localhost/CMS/project/index.php");
	header("Location:http://localhost/project/index.php");
	
?>