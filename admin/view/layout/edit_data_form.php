<div class="form-group">
    <label>Category Type Name</label>
    <input type="text" name="name" id="name" class="form-control" />
</div>
<div class="form-group">
    <label>Category Type Code</label>
    <input type="text" name="code" id="code" class="form-control" />
</div>

<script>
$(document).ready(function() {

    var name = localStorage.getItem('name');
    var code = localStorage.getItem('code');
    //var id = localStorage.getItem('id');
    $('#name').val(name);
    $('#code').val(code);
    //   $('#gender').val(gender);
    //   $('#designation').val(designation);
    //   $('#age').val(age);

    //   if(images != '')
    //   {
    //    $('#uploaded_image').html('<img src="images/'+images+'" class="img-thumbnail" width="100" />');
    //    $('#hidden_images').val(images);
    //   }

});
</script>