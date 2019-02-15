 <?php include "includes/admin_hearder.php"; ?>
 <?php
                          
                  if(isset($_GET['p_id']))
                  {
                              $the_post_id=$_GET['p_id'];



                    }
                           
                           $query="select * from posts where post_id=$the_post_id";
                            $select_post_by_id=mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($select_post_by_id))
                            {
                                $post_id=$row['post_id'];
                                $post_tags=$row['post_tags'];
                         $post_comment_count=$row['post_comment_count'];
                             $post_status=$row['post_status'];
                          $post_category_id=$row['post_category_id'];
                              $post_title=$row['post_title'];
                              $post_author=$row['post_author'];
                              $post_date=$row['post_date'];
                              $post_image=$row['post_image'];
                              $post_content=$row['post_content'];
                              }

          if(isset($_POST['update_post']))
          {
                           
           $post_tags=$_POST['post_tags'];
           $post_status=$_POST['post_status'];
           // $post_category_id=$_POST['post_category_id'];
            $post_title=$_POST['post_title'];
         $post_author=$_POST['post_author'];  
         $post_image=$_FILES['image']['name'];
         $post_image_tmp=$_FILES['image']['tmp_name'];         
         $post_content=$_POST['post_content'];
         //post_category_id='{$post_category_id}',
          move_uploaded_file($post_image_tmp,"../images/$post_image"); 
           if(empty($post_image))
           {
              $query="select * from where post_id=$the_post_id";
              $select_image =mysqli_query($connection,$query);
              while($row=mysqli_fetch_assoc($select_image))
              {
                $post_image=$row['post_image'];
              }

           }
            $query="update posts set post_tags='{$post_tags}', ";
            $query .="post_status='{$post_status}', post_date=now(), post_author='{$post_author
            }', " ;
            $query .="post_image='{$post_image}' where post_id={$the_post_id}";
            $updating_query=mysqli_query($connection,$query);
            
                              
          }
   ?>


    <div id="wrapper">

        <!-- Navigation -->
        
        <div id="page-wrapper">

            <div class="container-fluid">
         <div class="row">
                    <div class="col-lg-6">

      <form action="" method="post" enctype="multipart/form-data">
     
     <div class="form-group">
    <label for"post_tags">Post Tags</label>
    <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags">
  </div>
  <div class="form-group">
    <label for"title">Post Title</label>
    <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="post_title">
  </div>
  <div class="form-group">
      <select name="post_category" id="">
         <?php

            $query="select * from categories";
          $select_categories=mysqli_query($connection,$query);

           while($row=mysqli_fetch_assoc($select_categories))
              {
                 $cat_id=$row['cat_id'];
                $cat_title=$row['cat_title'];
               echo "<option value='$cat_id'>{$cat_title}</option>";

               }
          

         ?>
         
      </select>
  </div>
  <div class="form-group"> 
    <label for"post_author">Post Author</label>
    <input type="text" class="form-control" value="<?php echo $post_author; ?>" name="post_author">
  </div>
  <div class="form-group">
    <label for"post_status">Post Status</label>
    <input type="text" class="form-control" value="<?php echo $post_status; ?>" name="post_status">
  </div>
  <div class="form-group">
    <img width="100px" src="../images/<?php echo $post_image; ?>">
    <input type="file" class="form-control" name="image">
  </div>
  
  <div class="form-group">
    <label for"post_content">Post content</label>
    <textarea class="form-control" value="pos_content" name="post_content" id="" cols="30" rows="10">
      <?php echo $post_content; ?>
    </textarea>
  </div>
  <div class="form-group">
    <button class="btn btn-primary" name="update_post" >Edit Post</button>
  </div>
  
</form>
 

</div>
</div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include"includes/admin_footer.php"; ?>

