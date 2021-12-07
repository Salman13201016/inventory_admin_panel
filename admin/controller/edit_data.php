<?php include_once '../model/db_config.php'; ?>
<?php
    #$edit_id = trim($_POST['id']);
    $edit_id = trim($_POST['id']);
    // echo (1);
    // echo ($edit_id);
    // $show_sql = "SELECT * FROM category_types WHERE cat_type_id = '$edit_id'";
    // $show_sql = mysqli_query($link,$show_sql);
    // $show_sql = mysqli_fetch_array($show_sql);
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
                //echo "sadsad";
                $error1 = "Please fill up both forms";
            }
            else if (empty($cat_type_name)){

                $error2 = "Please Insert Category Type Name";
                //echo $error2;
            }
            else if (empty($cat_type_code)){
                $error3 = "Please Insert Category Type Code";
            }

            
        }
        else{
            
            $sql = "UPDATE category_types SET cat_type_name='$cat_type_name', cat_type_code='$cat_type_code' WHERE cat_type_id='$edit_id' ";
            $sql = mysqli_query($link,$sql);
            if ($sql){
                $success = "Successfully Edited";
                // header("location: ../view/layout/js_lib.php");

            }
            else{
                "Oops! Something went wrong. Please try again later.";
            }
        }
        // $output = array(
        //     'success'  => $success,
        //     'error'   => $error
        // );
            // echo "1";
            
    }
        
        
?>