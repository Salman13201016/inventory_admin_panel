function myFunction(){
    var pass = document.forms["FormName"]["password"].value;
    var conpass = document.forms["FormName"]["conPassword"].value;
    if(pass!=conpass){
        document.getElementById("main_notification").innerHTML="Password does not match";
        document.getElementById("main_notification").style.display = "block";
        document.getElementById("main_notification").style.color="red";
    }
    else{
        document.getElementById("main_notification").innerHTML="Password is matched";
        document.getElementById("main_notification").style.display = "block";
        document.getElementById("main_notification").style.color="green";
    }
}

function register(){

}

function image_upload(){
    $("#but_upload").click(function(){

        var fd = new FormData();
        var files = $('#file')[0].files;
        
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);

           $.ajax({
              url: 'upload.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
                    $("#img").attr("src",response); 
                    $(".preview img").show(); // Display image element
                 }else{
                    alert('file not uploaded');
                 }
              },
           });
        }else{
           alert("Please select a file.");
        }
    });
}