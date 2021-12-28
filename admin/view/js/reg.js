function register(){
    var name = document.getElementById("nameValidation").value;
    // var pass =  document.getElementById("nameValidation").value;
    var pass = document.getElementById("password").value;
    var conpass = document.getElementById("conPassword").value;
    var email = document.getElementById("uEmail").value;
    var phoneNumber =document.getElementById("phone_number").value;
    var dob = document.getElementById("dob").value;

    $.ajax({
        method: "POST",
        url:"insert_reg.php",
        
        data: {
            name:name,
            pass:pass,
            email:email,
            phoneNumber:phoneNumber,
            dob:dob
            // conpass:conpass,
        },
        success: function(data){
            //alert(data);
            if (data==1){
                // alert("Both Values are already existed");
                alert("successfully Inserted");
            }
            else if (data==3){
                alert("email_problem");
            }
            else if (data==4){
                alert("email_success");
            }
            else{
                alert("Something has problem");
            }
            // else{
            //     var success = "Successfully Inserted";
            //     document.getElementById("main_notification").innerHTML = success;
            //     document.getElementById("main_notification").style.display ="block";
            //     document.getElementById("main_notification").style.color ="green";
            //     document.getElementById("sub_notification").style.display ="none";
            //     document.getElementById("sub_notification2").style.display ="none";
            // }
            // showData();
        }
        
    });
    // dob = dob.split("-").reverse().join("-");
    // alert(dob);
    // if(a=='' && pass==''){
    //     var $error = "Please insert your full name";
    //     var $error2 = "Please insert password";
    //     document.getElementById("error").innerHTML = $error;
    //     document.getElementById("error").style.display = "block";
    //     document.getElementById("error").style.color = "red";
    //     document.getElementById("error2").innerHTML = $error2;
    //     document.getElementById("error2").style.display = "block";
    //     document.getElementById("error2").style.color = "red";
    // }
    // else if (a.length<6){
    //     var $error = "You name length should be greater than 5";
    //     document.getElementById("error").innerHTML = $error;
    //     document.getElementById("error").style.display = "block";
    //     document.getElementById("error").style.color = "red";
    // }
    // else{
    //     var upper_a = a.charAt(0).toUpperCase() + a.slice(1);
    //     // a.chartAt(0) = upper_a;
    //     alert(upper_a);
        

    // }
}

function pass_match(){
    var pass = document.forms["FormName"]["password"].value;
    var conpass = document.forms["FormName"]["conPassword"].value;
    if(pass!=conpass){
        document.getElementById("main_notification").innerHTML="Password does not match";
        document.getElementById("main_notification").style.display = "block";
        document.getElementById("main_notification").style.color="red";
    }
    else{
        document.getElementById("main_notification").innerHTML="Password verified";
        document.getElementById("main_notification").style.display = "block";
        document.getElementById("main_notification").style.color="green";
    }
}
// 
// function image_upload(){
//     $("#but_upload").click(function(){

//         var fd = new FormData();
//         var files = $('#file')[0].files;
//         // alert(files[0]);
        
//         // Check file selected or not
//         if(files.length > 0 ){
//            fd.append('file',files[0]);

//            $.ajax({
//               url: 'upload.php',
//               type: 'post',
//               data: fd,
//               contentType: false,
//               processData: false,
//               success: function(response){
//                  if(response != 0){
//                     $("#img").attr("src",response); 
//                     $(".preview img").show(); // Display image element
//                  }else{
//                     alert('file not uploaded');
//                  }
//               },
//            });
//         }else{
//            alert("Please select a file.");
//         }
//     });
// }