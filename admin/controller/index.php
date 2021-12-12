<?php include_once '../model/db_config.php'; ?>

<?php
    $error1=$error2=$error3=$success="";
    $cat_type_name=$cat_type_code="";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        // $cat_type_name =trim($_POST['cat_type_name']);
        // $cat_type_code =trim($_POST['cat_type_code']);
        $cat_type_name =trim($_POST['name']);
        $cat_type_code =trim($_POST['code']);
        echo $cat_type_name;
        //$obj = json_encode($_POST["name"]);
        //header('Content-Type: application/json');
        //echo($obj->name);
        if(empty($cat_type_name) || empty($cat_type_code)){
            if(empty($cat_type_name) && empty($cat_type_code)){
                echo "sadsad";
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
            
            $sql = "INSERT INTO category_types (cat_type_name, cat_type_code) VALUES (?, ?)";
            $sql_statment = mysqli_prepare($link,$sql);
            if ($sql_statment){
                // print_r('ssssss');
                mysqli_stmt_bind_param($sql_statment, "ss", $var1,$var2);
                $var1=$cat_type_name;
                $var2 = $cat_type_code;
                echo $var1;
                $execute = mysqli_stmt_execute($sql_statment);
                if($execute){
                    $success = "Successfully Inserted";
                    echo $success;
                    //header("location: index.php");

                }
                else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            // echo "1";
            
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
    <div class="row ">
        <div class="col-md-6">
            <div class="mb-3">
                <h3>Add Category Types</h3>
                <span id="main_notification" style="display:none;"></span>
                <?php 
                    if(!empty($success)){
                        echo '<span style="color:green;">'.$success.'</span>';
                    }
                    else{
                        echo '<span style="color:red;">'.$error1.'</span>';
                    }
                ?>
                
            </div>
            <form class="shadow p-4" method="POST">                  
                <div class="mb-3">
                    <label for="cat_type_name">Category Type Name</label>
                    
                    <input value="<?php echo $cat_type_name;?>" type="text" class="form-control" name="cat_type_name"  id="cat_type_name" placeholder="Category Type Name">
                    <span id="sub_notification" style="display:none;"></span>
                    <?php 
                        if(!empty($error2)){

                            echo '<span style="color:red;">'.$error2.'</span>';
                        }
                        
                    ?>
                    <span id="error2" style="display:none;"></span>
                </div>

                <div class="mb-3">
                    <label for="cat_type_code">Category Type Code</label>
                    <input value="<?php echo $cat_type_code;?>" type="text" class="form-control" name="cat_type_code" id="cat_type_code" placeholder="Category Type Code">
                    <span id="sub_notification2" style="display:none;"></span>
                    <?php 
                        if(!empty($error3)){

                            echo '<span style="color:red;">'.$error3.'</span>';
                        }
                    ?>
                </div>

                <div class="mb-3">
                    <button type="button" class="btn btn-primary" onclick="Datainsert();">Add Category Types</button>
                </div>
                
            </form>
        </div>
        <div class="col-md-6" id="show_table_div">
            <div class="mb-3">
                <h3>Show Data</h3>
                
            </div>
            <span id="form_response"></span>
            <div class="table-responsive" id="pagination_data">  
            </div>  
            <!-- <table class="table" id="tableData" class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">Cat_type_name</th>
                    <th scope="col">Cat_type_code</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <tbody id="show_data" >
                    
                </tbody>
            </table> -->
        </div>
    </div>
</div>
            
            
        </div>
    </div>

    <?php include '../view/layout/js_lib.php'; ?>
</body>

</html>