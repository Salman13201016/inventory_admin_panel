<?php include_once '../model/db_config.php'; ?>

<?php
    $error1=$error2=$error3=$success="";
    $cat_type_name=$cat_type_code="";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        // $cat_type_name =trim($_POST['cat_type_name']);
        // $cat_type_code =trim($_POST['cat_type_code']);
        $cat_type_name =trim($_POST['name']);
        $cat_type_code =trim($_POST['code']);
        // echo $cat_type_name;
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
            $existed_sql_name = "SELECT * FROM category_types WHERE cat_type_name='$cat_type_name'";
            $existed_sql_code = "SELECT * FROM category_types WHERE cat_type_code='$cat_type_code'";
            $existed_sql_name = mysqli_query($link,$existed_sql_name);
            $existed_sql_code = mysqli_query($link,$existed_sql_code);
            if($existed_sql_name->num_rows>0 && $existed_sql_code->num_rows>0){
                echo (1);
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
            }
            // echo "1";
            
        }
        
    }
        
?>