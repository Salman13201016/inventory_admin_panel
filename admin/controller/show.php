<?php 
    include_once '../model/db_config.php';

    $sql = "SELECT * FROM category_types";
    $execute = mysqli_query($link,$sql);
    if($execute->num_rows>0){
        while($row=$execute->fetch_assoc()){
            echo '<tr>';
                echo '<td>'.$row['cat_type_name'].'</td>';
                echo '<td>'.$row['cat_type_code'].'</td>';
                echo '<td>'.'Edit'.'</td>';
                echo '<td>'.'Delete'.'</td>';
            echo '</tr>';
        }
    }
?>