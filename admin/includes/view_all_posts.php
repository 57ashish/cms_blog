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
                                 <th>Author</th>
                                  <th>Title</th>
                                 <th>Category</th>
                                 <th>status</th>
                                 <th>Image</th>
                                 <th>Tags</th>
                                 <th>Comments</th>
                                 <th>Date</th>
                            </tr>
                          </thread>
                            <tbody >
                            <?php 
                               if(isset($_GET['delete']))
                               {
                                $post_id=$_GET['delete'];
                                $query="delete  from posts where post_id={$post_id} ";
                                $delete_admin=mysqli_query($connection,$query);
                                header("Location:posts.php");
                               }
                            ?>
                          <?php 
                            $query="select * from posts";
                            $select_posts=mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($select_posts))
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
                                $post_content=$row['post_content']; ?>

                            <?php  
                            echo "<tr>";
                            echo "<td>$post_id</td>";
                              echo "<td>$post_author</td>";
                             echo " <td>$post_title</td>";
                             $query="select * from categories where cat_id={$post_category_id}";
                  $select_categories_id=mysqli_query($connection,$query);

                    while($row=mysqli_fetch_assoc($select_categories_id))
                  {
                       $cat_id=$row['cat_id'];
                        $cat_title=$row['cat_title'];


                              echo "<td>{$cat_title}</td>";}
                              echo "<td>$post_status</td>";
                              echo "<td><img width='70px'src='../images/$post_image' ></td>";
                              echo "<td>$post_tags</td>";
                              echo "<td>$post_comment_count</td>";
                              echo "<td>$post_date</td>";
                              echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                               echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";//here we r direct linking the edit_post directly
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

