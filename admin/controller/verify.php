<?php include_once '../model/db_config.php'; ?>

<?php 

    if (isset($_GET['vkey'])){
        $key = $_GET['vkey'];
        $sql = "SELECT v_key,v_status FROM admins WHERE v_status = 0 AND v_key='$key' LIMIT 1";
        $query = mysqli_query($link,$sql);
        if(mysqli_num_rows($query)>0){
            $sql = "UPDATE admins SET v_status = 1 WHERE v_key='$key' LIMIT 1";
            $query = mysqli_query($link,$sql);

            if($query){
                echo '<div class="bs-example"> 
                        <div class="alert alert-warning alert-dismissible fade show">
                            <strong>Success</strong>
                        </div>
                    </div>';
            }
        }

    }
?>