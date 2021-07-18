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

                   <!-- <div class="alert mb-1 bg-dark text-light">
                        <div class="form-group row mb-0">
                            pagination start
                            <span class="pt-2 px-2">Select Number Of Rows</span>
                            <select name="state" id="maxrows" class="form-control col-md-3">
                                <option selected>Choose...</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="35">35</option>
                                <option value="50">50</option>
                            </select>
                            <span class="pt-2 px-2">Entries..</span>
                            <pre>                 </pre>
                            pagination end
                            <span class="pt-2">Search Date:</span>
                            <div class="form-group col-md-3 ">
                                <input type="text" id="myinputdate" name="myinputdate" onkeyup="searchdate()"
                                    placeholder="Search Date" class="form-control">
                            </div>
                            <pre>                                                                                     </pre>
                            <span class="pt-2">Search Name:</span>
                            <div class="form-group col-md-3 ">
                                <input type="text" id="myinputname" name="myinputname" onkeyup="searchname()"
                                    placeholder="Search Name" class="form-control">
                            </div>
                        </div>
                    </div>-->
                    
                    <table class="table table-hover" id="myTable">
                        <thead class=" bg-dark text-light ">
                            <tr>
                                <th scope="col ">Complaint No</th>
                                <th scope="col ">Complainant Name</th>
                                <th scope="col ">Reg. Time&Date</th>
                                <th scope="col ">Complaint Type</th>
                                <th scope="col ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                         $sql="SELECT complain_tb.complaint_id, complain_tb.complaint_title,complain_tb.c_type, complain_tb.complaint_discription, complain_tb.user_id, complain_tb.padding, complain_tb.running, complain_tb.complete, complain_tb.image,complain_tb.ctimestamp,usertb.user_id, usertb.user_name,usertb.last_name, usertb.user_email, usertb.user_image, usertb.user_city, usertb.contact, usertb.user_area, usertb.user_pincode FROM complain_tb INNER JOIN usertb ON complain_tb.user_id= usertb.user_id WHERE complain_tb.padding=1";
                         $result=mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $complaint_id=$row["complaint_id"];
                                $date = date_create($row["ctimestamp"]);
                                $complaint_user_name=$row["user_name"];
                                $last_user_name=$row["last_name"];
                                $c_type=$row["c_type"];
                                
                                        echo ' <tr>
                                        <th scope="row ">'.$complaint_id.'</th>
                                        <td>'.ucfirst($complaint_user_name).' '.ucfirst($last_user_name).'</td>
                                        <td>'.date_format($date, 'g:ia \o\n l jS F Y').'</td>
                                        <td>'.$c_type.'</td>
                                        <td><a class="btn btn-primary" href="complaindetailpadding.php?complaintid='.$complaint_id.'" role="button">View Detail</a>        
                                                 </tr>';            
                            }

                        ?>
                              </tbody>
                    </table>
                   <!-- <div class="pagination-container">
                            <nav>
                                <ul class="pagination"></ul>
                            </nav>
                    </div>-->
                </div>
            </div>

        </div>
        <!--main container end-->
    </div>
    <!--wrapper end-->

    <?php include("partial/footer.php"); ?>

    <script type="text/javascript">
    /*
    function searchdate() {
        let filter = document.getElementById('myinputdate').value.toUpperCase();

        let mytable = document.getElementById('mytable');
        let tr = mytable.getElementsByTagName('tr');
        for (var i = 0; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName('td')[1];
            if (td) {
                let textvalue = td.textContent || td.innerHTML;
                if (textvalue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function searchname() {
        let filter = document.getElementById('myinputname').value.toUpperCase();

        let mytable = document.getElementById('mytable');
        let tr = mytable.getElementsByTagName('tr');
        for (var i = 0; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName('td')[0];
            if (td) {
                let textvalue = td.textContent || td.innerHTML;
                if (textvalue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    var table='#mytable';
    $('maxrows').on('change',function(){
        $('pagination').html('');
        var trnum=0;
        var maxrows=parseInt($(this).val());
        var totalrows=$(table+' tbody tr').length;
        $(table+' tr:gt(0)').each(function(){
            trnum++;
            if(trnum >maxrows){
                $(this).hide();
            }
            if(trnum <=maxrows){
                $(this).show();
            }
        })
        if(totalrows>maxrows){
            var pagenum=Math.ceil(totalrows/maxrows);
            for(var i=1;i<=pagenum;){
                $('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show();

            }
        }
        $('.pagination li:first-child').addClass('active')
        $('.pagination li').on('click',function(){
            var pagenum=$(this).attr('data-page')
            var trindex=0
            $('.pagination li').removeClass('active')
            $(this).addClass('active')
            $(table+' tr:gt(0)').each(function(){
                trindex++;
                if(trindex >(maxrows*pagenum) || trindex<=((maxrows*pagenum)-maxrows)){
                    $(this).hide()
                }
                else{
                    $(this).show()
                }
            })
        })
    })
    $(function(){
        $('table tr:eq(0)').prepend('<th>ID</th>')
        var id=0;
        $('table tr:gt(0)').each(function(){
            id++
            $(this).prepend('<td>'+id+'</td>')
        })
    })*/
     
     $(document).ready( function () {
    $('#myTable').DataTable();
    } );
    

    </script>

</body>

</html>