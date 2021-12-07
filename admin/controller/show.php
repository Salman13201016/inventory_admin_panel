<?php
    include_once '../model/db_config.php';

    $sql = "SELECT  * FROM category_types ORDER BY cat_type_id DESC";
    $execute = mysqli_query($link,$sql);
    if($execute->num_rows>0){
        while($row=$execute->fetch_assoc()){
            $id = $row['cat_type_id'];
            $id = (string)$id;
            echo ($id);  
            $ciphering = "AES-128-CTR";
            // Use OpenSSl Encryption method
            $iv_length = openssl_cipher_iv_length($ciphering);
            $options = 0;
            // Non-NULL Initialization Vector for encryption
            $encryption_iv = '1234567891011121';
            // Store the encryption key
            $encryption_key = "1234";
            // Use openssl_encrypt() function to encrypt the data
            $encryption = openssl_encrypt($id, $ciphering,
            $encryption_key, $options, $encryption_iv);
            echo ($encryption);
            $decryption_iv = '1234567891011121';
            // Store the decryption key
            $decryption_key = "1234";
            // Use openssl_decrypt() function to decrypt the data
            $decryption=openssl_decrypt ($encryption, $ciphering, 
            $decryption_key, $options, $decryption_iv);
            echo ($decryption);
            echo '<tr>';
                echo '<td class = "edit_td">'.$row['cat_type_name'].'</td>';
                echo '<td class = "edit_td">'.$row['cat_type_code'].'</td>';
                echo '<td> <a href ="#" id ="'.$encryption.'" class="btn btn-primary editBtn" role="button">'.'Edit'.'</a></td>';
                echo '<td> <a class="btn btn-primary " id ="'.$encryption.'" href="#">'.'Delete'.' </a> </td>';
            echo '</tr>';
            // $output[] = array ($row['cat_type_name'],$row['cat_type_code']);
        }
        // echo json_encode($output);
    }
?>
<!-- <!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    </body>
</html> -->

<!-- Creating a popup modal -->

<script type="text/javascript">

$( document ).ready(function() {
    $('.editBtn').on('click', function () {
        var id = $(this).attr('id');
        $.ajax({
            method: "POST",
            url:"fetch_single_data.php",
            data:{id:id},
            dataType:'json',
            success: function(data){
                // alert(JSON.stringify(data[0].cat_type_id));
                localStorage.setItem('name', data[0].cat_type_name);
                localStorage.setItem('code', data[0].cat_type_code);
                var options = {
                    ajaxPrefix:''
                };
                new Dialogify('../view/layout/edit_data_form.php', options)
                .title('Edit Category Types Data')
                .buttons([
                {
                    text:'Cancle',
                    click:function(e){
                        this.close();
                }
                },

                {
                    text:'Edit',
                    type:Dialogify.BUTTON_PRIMARY,
                    click:function(e)
                    {
                        var form_data = new FormData();
                        form_data.append('name', $('#name').val());
                        form_data.append('code', $('#code').val());
                        form_data.append('id',data[0].cat_type_id);
                        // alert(JSON.stringify(form_data));
                        $.ajax({
                            method:"POST",
                            url:'edit_data.php',
                            data:form_data,
                            // dataType:'json',
                            contentType:false,
                            cache:false,
                            processData:false,
                            success:function(data){
                                // alert(data);
                                // event.preventDefault();
                                $.ajax({
                                    async: true,
                                    cache: false,
                                    processData: false,
                                    method: "POST",
                                    url:"show.php",
                                    success: function(data){
                                        // alert(data);
                                        $('#show_data').html(data);
                                    
                                        // document.getElementById("show_table_div").style.display="block";
                                    }
                                });  
                                // if(data.error != '')
                                // {
                                //     $('#form_response').html('<div class="alert alert-danger">'+data.error+'</div>');
                                // }
                                // else
                                // {
                                //     $('#form_response').html('<div class="alert alert-success">'+data.success+'</div>');
                                //     // dataTable.ajax.reload();
                                // }
                            }
                        });
                    }
                    }
                ]).showModal();
                // $('#show_data').html(data);
            
                // document.getElementById("show_table_div").style.display="block";
            }
        
        });  
    });
    
});
</script>
  
