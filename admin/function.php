<?php


function insert_categorys()
{
	global $connection;
	 if(isset($_POST['submit']))
                       {
                           $cat_title= $_POST['cat_title'];
                           if($cat_title=="" || empty($cat_title))
                           {
                            echo "This field shound not be empty";
                           }else
                           {
                            $query="insert into categories(cat_title) value ('{$cat_title}')";
                            $create_category_query=mysqli_query($connection,$query);
                            if(!$create_category_query)
                            {
                                die("faild".mysqli_error($connection));
                            }
                           }
                       }
}

function delete_category()
{    global $connection;
	 if(isset($_GET['delete']))
                                  {
                                    $cat_id=$_GET['delete'];
                                    $query="delete from categories where cat_id={$cat_id}";
                                    $delete_query=mysqli_query($connection,$query);
                                    header("Location:categories.php");// for avoiding refresh make smooth and delete instantly when delete click
                                  }
}


function display_category()
{
	global $connection;
	 $query="select * from categories";
                             $select_categories=mysqli_query($connection,$query);

                                     while($row=mysqli_fetch_assoc($select_categories))
                                          {
                                             $cat_id=$row['cat_id'];
                                            $cat_title=$row['cat_title'];
                                           echo "<tr>";
                                            echo "<td>{$cat_id}</td>";
                                            echo "<td>{$cat_title}</td>";
                                            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                              echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                            echo "</tr>";
                                          }
}


?>