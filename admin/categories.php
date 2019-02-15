<?php include "includes/admin_hearder.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin pannel
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                       <?php 
                          insert_categorys();
                        ?>

                        <form action="" method="post">
                            
                            <div class="form-group">
                                <label for="cat_title">

                                Category Title</label>
                                <input class="
                                form-control" type="
                                text" name="cat_title">
                            </div>
                             <div class="form-group">
                                <button class="btn btn-primary"
                                name="submit">Add category</button>
                            </div>
  
                        </form>
                        


                    <?php //updating from view when click on edit
                        if(isset($_GET['edit']))
                        {
                            $cat_id=$_GET['edit'];
                            include "includes/update.php";
                        }


                         ?>

                    </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thread>
                                    <tr>
                                        <th>Id
                                        </th>
                                        <th>Category</th>
                                    </tr>
                                </thread>
                                <tbody>
                                 <tr>
                                <?php //find all category
                                  display_category();
                                ?>
                                <?php //delete query
                                 delete_category();
                                ?>
                                </tr>
                                </tbody>
                            </table>
                        </div>               
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include"includes/admin_footer.php"; ?>