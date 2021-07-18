
<?php 
include("partial/_dbconnect.php");
include("partial/link.php");
session_start();
	session_unset();
	session_destroy();
	//header("Location:http://localhost/CMS/USER_WORK/index.php");
	header("Location:http://localhost/USER_WORK/index.php");
?>
