function Datainsert(){
    var cat_type_name = document.getElementById("cat_type_name").value;
    var cat_type_code = document.getElementById("cat_type_code").value;
    //alert(cat_type_name);
    $.ajax({
        type: "POST",
        url:"index.php",
        data: {
            name:cat_type_name,
            code:cat_type_code
        },
        success: function(data){
            alert("Successfully Inserted");
        }
    });
}