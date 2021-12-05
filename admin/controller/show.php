<?php 
    include_once '../model/db_config.php';

    $sql = "SELECT DISTINCT * FROM category_types ORDER BY cat_type_id DESC";
    $execute = mysqli_query($link,$sql);
    if($execute->num_rows>0){
        while($row=$execute->fetch_assoc()){
            echo '<tr>';
                echo '<td>'.$row['cat_type_name'].'</td>';
                echo '<td>'.$row['cat_type_code'].'</td>';
                echo '<td> <a target="__blank" href="edit.php?id='.$row['cat_type_id'].'"> '.'Edit'.'</a> </td>';
                echo '<td> <a href="#">'.'Delete'.' </a> </td>';
            echo '</tr>';
            // $output[] = array ($row['cat_type_name'],$row['cat_type_code']);
        }
        // echo json_encode($output);
    }
?>
