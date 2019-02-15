 <?php include "includes/admin_hearder.php"; ?>
 <?php
                          
                  if(isset($_GET['edit_user']))
                  {
                              $the_user_id=$_GET['edit_user'];
                          $query="select * from user where user_id=$the_user_id";
                            $select_user=mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($select_user))
                            {
                               $user_id=$row['user_id'];
                                 $username=$row['username'];
                               $user_password=$row['user_password'];
                                $user_firstname=$row['user_firstname'];
                                $user_lastname=$row['user_lastname'];//
                                $user_email=$row['user_email'];
                                //$user_image=$row['user_image'];
                                $user_role=$row['user_role'];
                                //$randSalt=$row['randSalt'];
                               
                              }
                            }

          if(isset($_POST['update_user']))
          {
                    
              $username=$_POST['username'];
            $user_password=$_POST['user_password'];
           $user_firstname=$_POST['user_firstname'];
           $user_lastname=$_POST['user_lastname'];
           $user_email=$_POST['user_email'];
           $user_role=$_POST['user_role'];
            $query="update user set username='{$username}', ";
            $query .="user_password = '{$user_password}', ";
            $query .="user_firstname = '{$user_firstname}', ";
            $query .="user_lastname = '{$user_lastname}', ";
            $query .="user_email = '{$user_email}', ";
            $query .="user_role = '{$user_role}' where user_id = {$the_user_id} ";
            $updating_query=mysqli_query($connection,$query);
            
            if(!$updating_query)
            {
              die("faild".mysqli_error($connection));
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
    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
  </div>
   <div class="form-group">
    <label for"title">Password</label>
    <input type="Password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
  </div>
  <div class="form-group">
    <label for"title">FirstName</label>
    <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
  </div>
  <div class="form-group">
    <label for"title">LasttName</label>
    <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
  </div>
  <div class="form-group">
    <label for"title">Email</label>
    <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
  </div>
  
  <div class="form-group">
  <select name="user_role" id="">
    <option value="subscriber"><?php echo $user_role; ?></option>
    <?php 
      if($user_role=='admin')
      {
          echo " <option value='subscriber'>subscriber</option>";
      }
      else
      {
        echo "<option value='admin'>admin</option>";
      }
      ?>
  
 
</select>
  </div>
   <div class="form-group">
    <button class="btn btn-primary" name="update_user" >Edit User</button>
  </div>
  
</form>
  
<!--
  <div class="form-group">
      <select name="post_category" id="">
        <?php
   /*
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
    <label for"title">Role</label>
    <select name="user_role" id="7970354410">
  
  
         <?php
         
            $query="select * from user ";
          $select_user=mysqli_query($connection,$query);

           while($row=mysqli_fetch_assoc($select_user))
              {
                 $user_role=$row['user_role'];
                $user_id=$row['user_id'];
               echo "<option value='$user_id'>{$user_role}</option>";

               }*/
           
         ?>
         </select>
     </div>-->
 
 

</div>
</div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include"includes/admin_footer.php"; ?>

