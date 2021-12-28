<?php include_once '../model/db_config.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

?>

<?php
    $error1=$error2=$error3=$success="";
    $cat_type_name=$cat_type_code="";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        // $cat_type_name =trim($_POST['cat_type_name']);
        // $cat_type_code =trim($_POST['cat_type_code']);
        $name =trim($_POST['name']);
        $pass =trim($_POST['pass']);
        $email =trim($_POST['email']);
        $phoneNumber =trim($_POST['phoneNumber']);
        $pass =trim($_POST['pass']);
        $dob =trim($_POST['dob']);
        // echo $cat_type_name;
        //$obj = json_encode($_POST["name"]);
        //header('Content-Type: application/json');
        //echo($obj->name);
        // if(empty($cat_type_name) || empty($cat_type_code)){
        //     if(empty($cat_type_name) && empty($cat_type_code)){
        //         echo "sadsad";
        //         $error1 = "Please fill up both forms";
        //     }
        //     else if (empty($cat_type_name)){

        //         $error2 = "Please Insert Category Type Name";
        //         echo $error2;
        //     }
        //     else if (empty($cat_type_code)){
        //         $error3 = "Please Insert Category Type Code";
        //     }

            
        // }
        // else{
        //     $existed_sql_name = "SELECT * FROM category_types WHERE cat_type_name='$cat_type_name'";
        //     $existed_sql_code = "SELECT * FROM category_types WHERE cat_type_code='$cat_type_code'";
        //     $existed_sql_name = mysqli_query($link,$existed_sql_name);
        //     $existed_sql_code = mysqli_query($link,$existed_sql_code);
        //     if($existed_sql_name->num_rows>0 && $existed_sql_code->num_rows>0){
        //         echo (1);
        //     }
            // else{
        $sql = "INSERT INTO admins (admin_name, admin_email,admin_password,admin_dob,admin_phone_number,v_key,v_status) VALUES (?, ?,?, ?,?, ?,?)";
        $sql_statment = mysqli_prepare($link,$sql);
        if ($sql_statment){
            $v_key = md5(time().$email);
            
            // print_r('ssssss');
            mysqli_stmt_bind_param($sql_statment, "ssssssi", $var1,$var2,$var3,$var4,$var5,$var6,$var7);
            $var1=$name;
            $var2 = $email;
            $var3=md5($pass);
            $var4 = $dob;
            $var5=$phoneNumber;
            $var6 = $v_key;
            $var7=0;
            // echo $var1;
            $execute = mysqli_stmt_execute($sql_statment);
            if($execute){
                $mail = new PHPMailer;
                $mail->isSMTP();
                /* smtp host */
				$mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                /* Provide User Name and Password as your email address(FromEmail) */
				$mail->Username = "smmujahid385@gmail.com";
                $mail->Password = "sm@sm12#";

                $mail->SMTPSecure ="tls";

				$mail->Port= 587;

                // $mail->Port= 587;

				$mail->From = "smmujahid385@gmail.com";

				$mail->FromName = "Salman";

				$mail->addAddress($email,"Salman");

				$mail->isHTML(true);
				/* Set Subject and messages of body */
				$mail->Subject = "Email Verification From Admin Panel";
                $mail->Body = "<a href='http://localhost/eshikhon/inventory_admin_panel/admin/controller/verify.php?vkey=$v_key'>Click This Activation Link</a>";

                $success = "Successfully Inserted";

                if(!$mail->send()){
					echo (3);
				}
				else{
                    echo (4);
					// echo "<script>alert('Verification Has been Sent Successfully')</script>";
				}
                // echo (1);
                //header("location: index.php");

            }
            else{
                echo (2);
            }
            // else{
            //     echo "Oops! Something went wrong. Please try again later.";
            // }
        }   
            // }
            // echo "1";
            
        // }
        
    }
        
?>