<?php include('server.php');

include("partial/link.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Like and Dislike </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
 
  
  <style>
      .posts-wrapper {
        width: 100%;
    margin: 10% auto;
  border: 1px solid #eee;
}
.post {
  width: 90%;
  margin: 20px auto;
  padding: 10px 5px 0px 5px;
  border: 1px solid green;
}
.post-info {
  margin: 10px auto 0px;
  padding: 5px;
}
.fa {
  font-size: 1.2em;
}
td{
  padding:5px 2px;
}
.fa-thumbs-down, .fa-thumbs-o-down {
  transform:rotateY(180deg);
}
.logged_in_user {
  padding: 10px 30px 0px;
}
i {
  color: red;
}
  </style>
</head>
<body>
<div class="wrapper">
        <!--navigation bar start-->
        <?php include("partial/header.php"); ?>
       

  <div class="posts-wrapper">
  <h3 style="padding-left:40%;font-weight:900;letter-spacing:2px;color:orange">View Complain </h3>
   <?php foreach ($posts as $post): ?>
   	<div class="post">
      <?php //echo $post['c_type']; ?>
      <div class="post-info">
                    <?php $complaint_id=$post["complaint_id"];
                                            $complaint_name=$post["complaint_title"];
                                            $complaint_dis=$post["complaint_discription"];
                                                $complaint_ctimestamp=$post["ctimestamp"];
                                                $date=date_create($complaint_ctimestamp);
                                                $res_c_image=$post["image"];
                                                $solve_c_image=$post["recever_image"];
                                                echo '<table width="100%">
                                                <tr style="padding:10px 20px;">
                                                <td style="color:orange;font-weight:900;font-size:20px">Complaint Title :</td>
                                                <td>'.$complaint_name.'</td>
                                                </tr>
                                                <tr>
                                                <td>Complaint Discription :</td>
                                                <td>'.$complaint_dis.'</td>
                                                </tr>
                                                <tr>
                                                <td>Complaint Image :</td>
                                                <td>';
                                                $res_c_image=explode(" ",$res_c_image);
                                                        $count=count($res_c_image)-1;
                                                        for ($i=0; $i <$count ; ++$i) { 
                                                            echo '<img src="'.$res_c_image[$i].'" alt="" style="margin:10px 30px" width="150px" height="150px" >';
                                                        }
                                                        
                                                     
                                                echo '</td>
                                                </tr>
                                                <tr>
                                                <td>Solve Image :</td>
                                                <td>';
                                                $solve_c_image=explode(" ",$solve_c_image);
                                                $count=count($solve_c_image)-1;
                                                for ($i=0; $i <$count ; ++$i) { 
                                                    echo '<img src="/project/worker/'.$solve_c_image[$i].'" alt="" style="margin:10px 30px" width="150px" height="150px" >';
                                                }
                                                echo '</td>
                                                </tr>
                                                </table>';
                                                    
        
                                                  
                                                       ?>
                                                       
                                           
                


	    <!-- if user likes post, style button differently -->
      	<i <?php if (userLiked($post['complaint_id'])): ?>
      		  class="fa fa-thumbs-up like-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-up like-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['complaint_id'] ?>"></i>
      	<span class="likes"><?php echo getLikes($post['complaint_id']); ?></span>
      	
      	&nbsp;&nbsp;&nbsp;&nbsp;

	    <!-- if user dislikes post, style button differently -->
      	<i 
      	  <?php if (userDisliked($post['complaint_id'])): ?>
      		  class="fa fa-thumbs-down dislike-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-down dislike-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['complaint_id'] ?>"></i>
      	<span class="dislikes"><?php echo getDislikes($post['complaint_id']); ?></span>
      </div>
   	</div>
   <?php endforeach ?>
  </div>
  
            </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="script.js"></script>
</body>
</html>