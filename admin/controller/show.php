<?php
    include_once '../model/db_config.php';

    $sql = "SELECT  * FROM category_types ORDER BY cat_type_id DESC";
    $execute = mysqli_query($link,$sql);
    if($execute->num_rows>0){
        while($row=$execute->fetch_assoc()){
            echo '<tr>';
                echo '<td id = "td_name">'.$row['cat_type_name'].'</td>';
                echo '<td id = "td_code">'.$row['cat_type_code'].'</td>';
                echo '<td> <a href ="#" id ="editBtn" class="btn btn-primary editBtn" role="button">'.'Edit'.'</a></td>';
                echo '<td> <a class="btn btn-primary" href="#">'.'Delete'.' </a> </td>';
            echo '</tr>';
            // $output[] = array ($row['cat_type_name'],$row['cat_type_code']);
        }
        // echo json_encode($output);
    }
?>
<?php include_once '../view/layout/js_lib.php'; ?>
<!-- <script type="text/javascript">

$( document ).ready(function() {
    // showData();
    var url = "../view/js/custom.js";
    $.getScript(url);
    
});
</script> -->
  
