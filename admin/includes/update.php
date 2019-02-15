                     <form action="" method="post">
                            
                            <div class="form-group">
                                <label for="cat_title">
                                Edit Category Title</label>
                                <?php
                                if(isset($_GET['edit']))
                                {
                                    $cat_id=$_GET['edit'];
                                     $query="select * from categories where cat_id= {$cat_id}";
                                
                             $select_categories_id=mysqli_query($connection,$query);

                                     while($row=mysqli_fetch_assoc($select_categories_id))
                                          {   
                                             $cat_id=$row['cat_id'];
                                            $cat_title=$row['cat_title'];
                                         ?>
                                             <input value="<?php if(isset($cat_title)){echo $cat_title; }   ?>" class="
                                form-control" type="
                                text" name="cat_title">

                            <?php  }}
                                  ?>
                                  <?php //update query
                                if(isset($_POST['update']))
                                  {
                                    $cat_title=$_POST['cat_title'];
                                    $query="update categories set cat_title='{$cat_title}' where cat_id={$cat_id}";
                                    $update_query=mysqli_query($connection,$query);
                                    header("Location:categories.php"); 
                                  }

                                  ?>
                               
                            </div>
                             <div class="form-group">
                                <button class="btn btn-primary"
                                name="update">Update</button>
                            </div>
  
                        </form>