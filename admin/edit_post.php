 <?php include "includes/admin_hearder.php"; ?>
 <?php


    if(isset($_POST['create_post']))
    {
      
          $post_tags=$_POST['post_tags'];
           $post_comment_count=4; 
           $post_status=$_POST['post_status'];
            $post_category_id=$_POST['post_category_id'];
            $post_title=$_POST['title'];
         $post_author=$_POST['author']; 
          $post_date=date('d-m-y');
           $post_image=$_FILES['image']['name'];//files is a super global function use to get image to upload
         $post_image_tmp=$_FILES['image']['tmp_name'];//for temporory location tmp_name
        
         $post_content=$_POST['post_content'];
         move_uploaded_file($post_image_tmp,"../images/$post_image");//pre define function which move image file to another location

        $query="insert into posts values (0,'{$post_tags}',{$post_comment_count},'{$post_status}',{$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}')";//now() is a funtion for date
        //$query="insert into posts values ('cpp',4,'published',5,'cpp','ashish','2019-2-2','javascript','checking')";
       $insert_query_admin=mysqli_query($connection,$query);
        if(!$insert_query_admin)
        {
          
          die("failed ".mysqli_error($connection));
        }

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
    <input type="text" class="form-control" name="post_tags">
  </div>
  <div class="form-group">
    <label for"title">Post Title</label>
    <input type="text" class="form-control" name="title">
  </div>
  <div class="form-group">
    <label for"title">Post Category Id</label>
    <input type="text" class="form-control" name="post_category_id">
  </div>
  <div class="form-group">
    <label for"post_author">Post Author</label>
    <input type="text" class="form-control" name="author">
  </div>
  <div class="form-group">
    <label for"post_status">Post Status</label>
    <input type="text" class="form-control" name="post_status">
  </div>
  <div class="form-group">
    <label for"post_image">Post Image</label>
    <input type="file" class="form-control" name="image">
  </div>
  
  <div class="form-group">
    <label for"post_content">Post content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
      
    </textarea>
  </div>
  <div class="form-group">
    <button class="btn btn-primary" name="create_post" >Edit Post</button>
  </div>
  
</form>


</div>
</div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include"includes/admin_footer.php"; ?>

