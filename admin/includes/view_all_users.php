<?php include "includes/admin_hearder.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                      
                       <table class="table table-bordered table-hover">
                          <thread>
                            <tr>
                                 <th>Id</th>
                                 <th>Username</th>
                                  <th>Firstname</th>
                                 <th>Lastname</th>
                                 <th>Email</th>
                                 <th>Role</th>
                                 
                                 
                                 
                            </tr>
                          </thread>
                            <tbody >
                              <?php 
                               if(isset($_GET['admin']))
                               {
                                $user_id=$_GET['admin'];
                                $query="update user set user_role= 'admin' where user_id=$user_id ";
                                $unapprove_query=mysqli_query($connection,$query);
                                header("Location:user.php");
                               }
                            ?>
                            <?php 
                               if(isset($_GET['subscriber']))
                               {
                                $user_id=$_GET['subscriber'];
                                $query="update user set user_role= 'subscriber' where user_id=$user_id";
                                $approve_query=mysqli_query($connection,$query);
                                header("Location:user.php");
                               }
                            ?>
                            <?php 
                               if(isset($_GET['delete']))
                               {
                                $user_id=$_GET['delete'];
                                $query="delete  from user where user_id={$user_id} ";
                                $delete_query=mysqli_query($connection,$query);
                                header("Location:user.php");
                               }
                            ?>
                          <?php 
                            $query="select * from user";
                            $select_user=mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($select_user))
                            {
                                $user_id=$row['user_id'];
                                $username=$row['username'];
                               $user_password=$row['user_password'];
                                $user_firstname=$row['user_firstname'];
                                $user_lastname=$row['user_lastname'];
                                $user_email=$row['user_email'];
                                $user_image=$row['user_image'];
                                $user_role=$row['user_role'];
                                $randSalt=$row['randSalt'];
                               
                                ?>

                            <?php  
                            echo "<tr>";
                            echo "<td> $user_id</td>";
                             echo " <td>$username</td>";
                              echo "<td> $user_firstname</td>";
                            /*
                             $query="select * from categories where cat_id={$post_category_id}";
                  $select_categories_id=mysqli_query($connection,$query);

                    while($row=mysqli_fetch_assoc($select_categories_id))
                    {
                       $cat_id=$row['cat_id'];
                        $cat_title=$row['cat_title'];


                              echo "<td>{$cat_title}</td>";}
                              */

                              echo "<td>$user_lastname</td>";
                              
                              echo "<td>$user_email</td>";
                               /* $query="select * from posts where post_id=$comment_post_id";
                                $select_post_id_query=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($select_post_id_query))
                                {
                                  $post_id=$row['post_id'];
                                  $post_title=$row['post_title'];
                                    echo "<td><a href='../post.php?p_id=$post_id' >$post_title</a></td>";
                                }
                              */

                             
                              echo "<td>$user_role</td>";
                              echo "<td><a href='user.php?admin=$user_id'>Admin</a></td>";
                               echo "<td><a href='user.php?subscriber=$user_id'>Subscriber</a></td>";
                              echo "<td><a href='user.php?delete=$user_id'>Delete</a></td>";
                               echo "<td><a href='user.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
                               
                            echo " </tr> ";
                          ?>

                          <?php  }
                          ?> 
                         
                      </tbody>

                      </table>
                     


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include"includes/admin_footer.php"; ?>

