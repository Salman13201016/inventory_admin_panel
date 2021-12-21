<?php

//fetch_single_data.php

    include_once '../model/db_config.php';

    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $ciphering = "AES-128-CTR";
        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $decryption_iv = '1234567891011121';
        // Store the decryption key
        $decryption_key = "1234";
        // Use openssl_decrypt() function to decrypt the data
        $id=openssl_decrypt ($id, $ciphering, 
        $decryption_key, $options, $decryption_iv);
        $sql = "SELECT * FROM category_types WHERE cat_type_id = '".$id."'";
        $execute = mysqli_query($link,$sql);
        // $row = mysqli_fetch_array($execute);
        // var_dump($row);
        //$statement->execute();
        while($row=$execute->fetch_assoc())
        {
            $data[]=$row;
        }
        echo json_encode($data);
    
    }

?>
