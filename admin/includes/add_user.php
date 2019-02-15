 <?php include "includes/admin_hearder.php"; ?>
 <?php


    if(isset($_POST['create_user']))
    {
    	
          //$user_id=$_POST['user_id'];
          $username=$_POST['username'];
           
           $user_firstname=$_POST['user_firstname'];
           $user_lastname=$_POST['user_lastname'];
           $user_email=$_POST['user_email'];
           $user_password=$_POST['user_password'];
           //$user_image=$_POST['user_image'];
           $user_role=$_POST['user_role'];
          // $randSalt=$_POST['randSalt'];
        
         //move_uploaded_file($post_image_tmp,"../images/$post_image");//pre define function which move image file to another location

        $query="insert into user values (0,'{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','','{$user_role}','')";//now() is a funtion for date
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
		<label for"post_tags">Username</label>
		<input type="text" class="form-control" name="username">
	</div>
	<div class="form-group">
		<label for"title">FirstName</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>
	<div class="form-group">
    <label for"title">LasttName</label>
    <input type="text" class="form-control" name="user_lastname">
  </div>
  <div class="form-group">
    <label for"title">Email</label>
    <input type="email" class="form-control" name="user_email">
  </div>
   <div class="form-group">
    <label for"title">Password</label>
    <input type="Password" class="form-control" name="user_password">
  </div>
  
      
     
 
	<div class="form-group">
	<select name="user_role" id="">
    <option value="subscriber">Select Options</option>
  <option value="admin">Admin</option>
  <option value="subscriber">Subscriber</option>
</select>
	</div>
  <div class="form-group">
    <button class="btn btn-primary" name="create_user" >Add User</button>
  </div>
  
</form>

  <!--
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
	</div>-->
	

</div>
</div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include"includes/admin_footer.php"; ?>

