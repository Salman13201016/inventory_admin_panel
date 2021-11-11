<?php include_once '../model/db_config.php'; ?>

<?php
    $error1=$error2=$error3=$success="";
    $cat_type_name=$cat_type_code="";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $cat_type_name =trim($_POST['cat_type_name']);
        $cat_type_code =trim($_POST['cat_type_code']);
        if(empty($cat_type_name) || empty($cat_type_code)){
            if(empty($cat_type_name) && empty($cat_type_code)){
                $error1 = "Please fill up both forms";
            }
            else if (empty($cat_type_name)){

                $error2 = "Please Insert Category Type Name";
                echo $error2;
            }
            else if (empty($cat_type_code)){
                $error3 = "Please Insert Category Type Code";
            }

            
        }
        else{
            // echo "1";
            $sql = "INSERT INTO category_types (cat_type_name, cat_type_code) VALUES (?, ?)";
            $sql_statment = mysqli_prepare($link,$sql);
            if ($sql_statment){
                // print_r('ssssss');
                mysqli_stmt_bind_param($sql_statment, "ss", $var1,$var2);
                $var1=$cat_type_name;
                $var2 = $cat_type_code;
                $execute = mysqli_stmt_execute($sql_statment);
                if($execute){
                    $success = "Successfully Inserted";
                    //header("location: index.php");

                }
                else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
        }
        
    }
        
?>
<!DOCTYPE html>
<html>

<?php include '../view/layout/header.php'; ?>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        
        <?php include '../view/layout/side_navbar.php'; ?>
        <!-- Page Content Holder -->
        <div id="content">
            <?php include '../view/layout/content_menu.php'; ?>
            <div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="mb-3">
                <h3>Add Category Types</h3>
                <?php 
                    if(!empty($success)){
                        echo '<span style="color:green;">'.$success.'</span>';
                    }
                    else{
                        echo '<span style="color:red;">'.$error1.'</span>';
                    }
                ?>
                
            </div>
            <form class="shadow p-4" method="POST" action="index.php">                  
                <div class="mb-3">
                    <label for="cat_type_name">Category Type Name</label>
                    <input value="<?php echo $cat_type_name;?>" type="text" class="form-control" name="cat_type_name"  id="cat_type_name" placeholder="Category Type Name">
                    <?php 
                        if(!empty($error2)){

                            echo '<span style="color:red;">'.$error2.'</span>';
                        }
                    ?>
                </div>

                <div class="mb-3">
                    <label for="cat_type_code">Category Type Code</label>
                    <input value="<?php echo $cat_type_code;?>" type="text" class="form-control" name="cat_type_code" id="cat_type_code" placeholder="Category Type Code">
                    <?php 
                        if(!empty($error3)){

                            echo '<span style="color:red;">'.$error3.'</span>';
                        }
                    ?>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Add Category Types</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
            
            
        </div>
    </div>

    <?php include '../view/layout/js_lib.php'; ?>
</body>

</html>