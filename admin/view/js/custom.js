function Datainsert(){
    var cat_type_name = document.getElementById("cat_type_name").value;
    var cat_type_code = document.getElementById("cat_type_code").value;
    
    // validation code
    //alert(cat_type_name);

    $.ajax({
        method: "POST",
        url:"index.php",
        data: {
            name:cat_type_name,
            code:cat_type_code
        },
        success: function(data){
            showData();
        }
        
    });


    
    //alert("show");
}
function showData(){
    $.ajax({
        method: "POST",
        url:"show.php",
        success: function(data){
            $('#show_data').html(data);
            // document.getElementById("show_table_div").style.display="block";
        }
        
    });  
}