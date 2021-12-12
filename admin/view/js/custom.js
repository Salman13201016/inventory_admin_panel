$( document ).ready(function() {
    // event.preventDefault();
    showData();
    editData();
    pagination();
    deleteData();
    
    
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
                //alert(data);
                if (data==1){
                    alert("Both Values are already existed");
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
function DataEdit(){
    alert("edit");
}
function showData(){
    // event.preventDefault();
    $.ajax({
        async: true,
        cache: false,
        processData: false,
        method: "POST",
        url:"show.php",
        success: function(data){
            // alert(data);
            $('#pagination_data').html(data);
           
            // document.getElementById("show_table_div").style.display="block";
        }
        
    });  
}

function editData(){
    $(document).on('click', '.editBtn', function(){
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
                                showData();
                            }
                        });
                    }
                    }
                ]).showModal();
            }
        
        });    
   }); 
}

function pagination(page){
    $.ajax({  
        url:"show.php",  
        method:"POST",  
        data:{page:page},  
        success:function(data){  
             $('#pagination_data').html(data);  
        }  
   });


}

function deleteData(){
    $(document).on('click', '.deleteBtn', function(){  
        var id = $(this).attr("id");
        $.ajax({  
            url:"delete.php",  
            method:"POST",  
            data:{id:id},  
            cache:false,
            success:function(data){  
                 showData();  
            }  
       }); 
    });

}

$(document).on('click', '.pagination_link', function(){  
    var page = $(this).attr("id");  
    pagination(page);  
});  



