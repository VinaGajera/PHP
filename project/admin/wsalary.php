<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include("partial/_dbconnect.php"); 
include("partial/link.php");
?>


<body>

    <!--wrapper start-->
    <div class="wrapper">
        <!--header menu start-->
        <?php include("partial/header.php");?>
        <!--sidebar end-->
        <!--main container start-->
        <div class="main-container">
            <!--Not Process Complete part start-->
            <div class="notprocess">
                <div class="container mt-3 mx-2 mb-3">

                <h3 style="font-wight:500;color:red;margin-top:10px;padding:50px 300px">Worker Salary</h3>
                    <table class="table table-hover" id="myTable">
                        <thead class=" bg-dark text-light ">
                            <tr>
                                <th scope="col ">Worker No</th>
                                <th scope="col ">Worker Name</th>
                                <th scope="col ">Total Complaint</th>
                                <th scope="col ">Total Salary per work</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                         $sql="SELECT * FROM `usertb` WHERE user_role='worker'";
                         $result=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $wid=$row["user_id"];
                                echo '
                                <tr>
                                    <td>'.$wid.' </td>
                                    <td>
                                        <table>
                                            <tr>
                                                
                                                <td style="color:red;" colaspan="2">
                                                    '.$row["user_name"].' '.$row["last_name"].'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="color:orange;">Worker Email ID</td>    
                                                <td>
                                                    '.$row["user_email"].'
                                                </td>
                                                
                                            </tr>
                                        </table>
                                    </td>
                                    ';
                                    echo '
                                    <td>';
                                    
                                    $sql2="select * FROM complain_tb WHERE user_worker_id=$wid and `complete`=1";           
                                    $result2=mysqli_query($conn,$sql2);
                                    $rowcount=mysqli_num_rows($result2);
                                    if($rowcount==0){
                                        echo '<h3 style="padding:30px 10px; ">No Any Complaint is complete..</h3>';
                                    }else{
                                        echo '<table class="getdata">
                                        <tr>
                                                <th scope="col">Complaint No</th>
                                                <th scope="col">Complaint Type</th>
                                                <th scope="col">Amount</th>
                                        </tr>';
                                            $total_sal=2500*$rowcount;
                                            while($row2 = mysqli_fetch_assoc($result2))
                                            {
                                            echo ' <tr>
                                                            <td>'.$row2["complaint_id"].'</td>    
                                                            <td>'.$row2["c_type"].' Fitting</td>
                                                            <td><div class="col-sm-10">
                                                            <td>2500.00</td>';
                                                            
                                                         echo '</div></td>   
                                                        </tr>';
                                            }
                                           // <input type="text" class="amt" onblur="myFunction()"  onkeypress="return (event.charCode < 48 || event.charCode < 57)" required>';
                                        echo ' </table>
                                                </td>';
                                
                                /////////////////////////////////////////////////////////////////
                               echo '<td style="padding:50px;color:red;font-size:20px">'.$total_sal.'.00</td>
                                <tr>';
                                        }   
                            
                                }

                        ?>
                        
                              </tbody>
                    </table>
                  
                </div>
            </div>

        </div>
        <!--main container end-->
    </div>
    <!--wrapper end-->

    <?php include("partial/footer.php"); ?>

    <script type="text/javascript">
    /* $(document).ready( function () {
    $('#myTable').DataTable();
    } );
    */

    </script>
    

</body>

</html>