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

        <div class="notprocess">
                
                    
                        
                    
                        <?php
                            echo '<h3 style="font-wight:500;color:red;margin-top:100px;padding-left:600px">View Complaint In Detail</h3>';
                            $getc_id=$_GET["cid"];
                            $sql="SELECT * FROM `complain_tb` WHERE `complaint_id`=$getc_id";
                            $result=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $complaint_id=$row["complaint_id"];
                                $complaint_name=$row["complaint_title"];
                                $c_add=$row["c_address"];
                                $c_type=$row["c_type"];
                                $complaint_dis=$row["complaint_discription"];
                                $complaint_ctimestamp=$row["ctimestamp"];
                                $date=date_create($complaint_ctimestamp);
                                $res_c_image=$row["image"];
                                $solve_image=$row["recever_image"];



                                echo'  
                                    <div class="jumbotron " style="width: 90%;margin-left:50px; margin-top:2%;padding:10px"><tr>
                                    <table class="table table-borderedless mx-auto" style="width: 75%;">
                                    <th style="color:red;font-size:30px" scope="row">Complaint Number</th>
                                    <td style="color:red;font-size:30px">'.$complaint_id.'</td>
                                    <th scope="row">Category</th>
                                    <td>'.$c_type.' Related Problem</td>
                                </tr>
                                <tr>
                                    <th scope="row"> Complainant Title</th>
                                    <td colspan="3">'.$complaint_name.'</td>
                                </tr>
                                
                                <tr>
                                    <th scope="row"> Compaint Detail</th>
                                    <td colspan="3">'.$complaint_dis.'</td>
                                </tr>
                                <tr>
                                    <th scope="row">Actual Problem Image</th>
                                    <td colspan="3">';
                                    $res_c_image=explode(" ",$res_c_image);
                                    $count=count($res_c_image)-1;
                                    for ($i=0; $i <$count ; ++$i) { 
                                        if($i==4)
                                            echo '<br>';
                                        /*<img src="../../USER_WORK/'.$res_c_image.'" alt="" height="100px" width="100px" ></td>*/
                                        echo '<img src="../../USER_WORK/'.$res_c_image[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                                    }
                               
                                
                                //if recomplalaint than display
                                $sqlr="SELECT * FROM `recomplaint_tb` WHERE c_id=$complaint_id";
                                $resultr=mysqli_query($conn,$sqlr);
                                while($rowr = mysqli_fetch_assoc($resultr))
                                {
                                    $rcid=$rowr["c_id"];
                                    $row_cnt = mysqli_num_rows($result);
                                    if($rcid==$complaint_id)
                                    {
                                       
                                            
                                                $rimg=$rowr["user_send_image"];
                                                $rimg=explode(" ",$rimg);
                                                $count=count($rimg)-1;
                                                for ($i=0; $i <$count ; ++$i) { 
                                                    echo '<img src="'.$rimg[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                                                }
                                         
                                    }else{
                                        
                                    }
                                }
                                echo'<td>
                                </tr>';
                            //end
                                

                            echo '<tr>
                                <th scope="row" style="color:red;">Officer Problem  Solve Image</th>
                                <td colspan="3">';
                                $solve_image=explode(" ",$solve_image);
                                $count=count($solve_image)-1;
                                if($count==0){
                                    echo 'No Data Uploaded to Officer Side...';
                                }
                                else
                                {
                                    for ($i=0; $i <$count ; ++$i) { 
                                        if($i==4)
                                        echo '<br>';
                                        echo '<img src="../project/worker/'.$solve_image[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                                    }
                                }
                            
                               

                                     //recomplaint worker image
                                    $sqlr="SELECT * FROM `recomplaint_tb` WHERE c_id=$complaint_id";
                                    $resultr=mysqli_query($conn,$sqlr);
                                    while($rowr = mysqli_fetch_assoc($resultr))
                                    {
                                        $rcid=$rowr["c_id"];
                                    $row_cnt = mysqli_num_rows($result);
                                    if($rcid==$complaint_id)
                                    {
                                                $rimg=$rowr["recomplain_solve_image"];
                                                $rimg=explode(" ",$rimg);
                                                $count=count($rimg)-1;
                                                if($count==0){
                                                    echo 'No Data Uploaded to Officer Side...';
                                                }else
                                                {
                                                    for ($i=0; $i <$count ; ++$i) { 
                                                        echo '<img src="../project/worker/'.$rimg[$i].'" alt="" style="margin:20px;" height="150px" width="150px" >';
                                                    }
                                                }
                                            
                                    }
                                          else{

                                        }
                                        echo '</td></tr>';
                                }
                            

                                    echo ' <tr>
                                <td colspan="2"></td>
                                
                                <td><a href="index.php" class="btn btn-primary">Back</a></td>
                                </tr>';
                                     echo' </tbody>
                                    </table>
                                 </div>             
                                            ';
                            }
                            
                    
                ?>
                
                
                <!--main container end-->


        
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