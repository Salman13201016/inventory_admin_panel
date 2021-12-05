$( document ).ready(function() {
    showData();
});
function Datainsert(){
    var cat_type_name = document.getElementById("cat_type_name").value;
    var cat_type_code = document.getElementById("cat_type_code").value;
    // var error1 = "Please fill up both forms";
    var error2 = "Please Insert Category Type Name";
    var error3 = "Please Insert Category Type Code";
    if(cat_type_name=='' || cat_type_code==''){
        if(cat_type_name=='' && cat_type_code==''){
            var error1 = "Please fill up both forms";

            // document.getElementById("main_notification").innerHTML = error1;
            // document.getElementById("main_notification").style.display ="block";
            // document.getElementById("main_notification").style.color ="red";

            document.getElementById("sub_notification").innerHTML = error2;
            document.getElementById("sub_notification").style.display ="block";
            document.getElementById("sub_notification").style.color ="red";
            document.getElementById("sub_notification2").innerHTML = error3;
            document.getElementById("sub_notification2").style.display ="block";
            document.getElementById("sub_notification2").style.color ="red";
            // document.getElementById("sub_notification").style.display ="none";
            // document.getElementById("sub_notification2").style.display ="none";
        }
        else if (cat_type_name ==''){
            var error2 = "Please Insert Category Type Name";
            document.getElementById("sub_notification").innerHTML = error2;
            document.getElementById("sub_notification").style.display ="block";
            document.getElementById("sub_notification").style.color ="red";
            document.getElementById("sub_notification2").style.display ="none";
            document.getElementById("main_notification").style.display ="none";
        }
        else if (cat_type_code ==''){
            var error3 = "Please Insert Category Type Code";
            document.getElementById("sub_notification2").innerHTML = error3;
            document.getElementById("sub_notification2").style.display ="block";
            document.getElementById("sub_notification2").style.color ="red";
            document.getElementById("sub_notification").style.display ="none";
            document.getElementById("main_notification").style.display ="none";
        }
    }
    else{
        $.ajax({
            method: "POST",
            url:"insert.php",
            data: {
                name:cat_type_name,
                code:cat_type_code
            },
            success: function(data){
                // alert(data);
                if (data==1){
                    alert("error");
                }
                else{
                    var success = "Successfully Inserted";
                    document.getElementById("main_notification").innerHTML = success;
                    document.getElementById("main_notification").style.display ="block";
                    document.getElementById("main_notification").style.color ="green";
                    document.getElementById("sub_notification").style.display ="none";
                    document.getElementById("sub_notification2").style.display ="none";
                }
                showData();
            }
            
        });
        
    }
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

