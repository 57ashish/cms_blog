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
                                  <th>Comment</th>
                                 <th>Email</th>
                                 <th>status</th>
                                 <th>In Response to</th>
                                 <th>Date</th>
                                 <th>Aprrove</th>
                                 <th>Unapprove</th>
                                 <th>Delete</th>
                                 <th>Edit</th>
                            </tr>
                          </thread>
                            <tbody >
                              <?php 
                               if(isset($_GET['unapprove']))
                               {
                                $comment_id=$_GET['unapprove'];
                                $query="update comment set comment_status= 'unapprove' where comment_id=$comment_id ";
                                $unapprove_query=mysqli_query($connection,$query);
                                header("Location:comments.php");
                               }
                            ?>
                            <?php 
                               if(isset($_GET['approve']))
                               {
                                $comment_id=$_GET['approve'];
                                $query="update comment set comment_status= 'approve' where comment_id=$comment_id";
                                $approve_query=mysqli_query($connection,$query);
                                header("Location:comments.php");
                               }
                            ?>
                            <?php 
                               if(isset($_GET['delete']))
                               {
                                $comment_id=$_GET['delete'];
                                $query="delete  from comment where comment_id={$comment_id} ";
                                $delete_query=mysqli_query($connection,$query);
                                header("Location:comments.php");
                               }
                            ?>
                          <?php 
                            $query="select * from comment";
                            $select_comment=mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($select_comment))
                            {
                                $comment_id=$row['comment_id'];
                                $comment_post_id=$row['comment_post_id'];
                                $comment_author=$row['comment_author'];
                                 $comment_content=$row['comment_content'];
                                $comment_email=$row['comment_email'];
                                
                                $comment_status=$row['comment_status'];
                                $comment_date=$row['comment_date'];
                                ?>

                            <?php  
                            echo "<tr>";
                            echo "<td> $comment_id</td>";
                             echo " <td>$comment_author</td>";
                              echo "<td> $comment_content</td>";
                            /*
                             $query="select * from categories where cat_id={$post_category_id}";
                  $select_categories_id=mysqli_query($connection,$query);

                    while($row=mysqli_fetch_assoc($select_categories_id))
                    {
                       $cat_id=$row['cat_id'];
                        $cat_title=$row['cat_title'];


                              echo "<td>{$cat_title}</td>";}
                              */

                              echo "<td>$comment_email</td>";
                              
                              echo "<td>$comment_status</td>";
                                $query="select * from posts where post_id=$comment_post_id";
                                $select_post_id_query=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($select_post_id_query))
                                {
                                  $post_id=$row['post_id'];
                                  $post_title=$row['post_title'];
                                    echo "<td><a href='../post.php?p_id=$post_id' >$post_title</a></td>";
                                }


                             
                              echo "<td>$comment_date</td>";
                              echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                               echo "<td><a href='comments.php?unapprove=$comment_id'>Un Approve</a></td>";
                              echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                               echo "<td><a href='comments.php?source=edit_post&p_id='>Edit</a></td>";//here we r direct linking the edit_post directly
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

