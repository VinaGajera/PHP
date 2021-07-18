<div class="footer" style="margin-bottom:0px">
                <h1 style="font-size:2vw;padding:10px 0px;" >Online Complain Registration & Management System- Street-Pipe-Road</h1>
                <?php 
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) 
             {
                echo '<div class="footerlinks"  >
                <a  style="margin-bottom:30px;" href="index.php" class="mainlink">CMS</a>
                Help To 24 hour & 7 Days
            </div>';
             }
             else{
                 echo ' <div class="footerlinks"  >
                 <a  style="margin-bottom:30px;" href="index.php" class="mainlink">CMS</a>
                 <a href="index.php#help">Help</a>
                 <a href="index.php#aboutus">About us</a>
                 <a href="contactus.php">Contact us</a>
             </div>';
             }
              ?> 

            </div>
           