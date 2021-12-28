<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
.register {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}

.register-left {
    text-align: center;
    color: #fff;
    margin-top: 4%;
}

.register-left input {
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}

.register-right {
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}

.register-left img {
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite alternate;
    animation: mover 1s infinite alternate;
}

@-webkit-keyframes mover {
    0% {
        transform: translateY(0);
    }

    100% {
        transform: translateY(-20px);
    }
}

@keyframes mover {
    0% {
        transform: translateY(0);
    }

    100% {
        transform: translateY(-20px);
    }
}

.register-left p {
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}

.register .register-form {
    padding: 10%;
    margin-top: 10%;
}

.btnRegister {
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}

.register .nav-tabs {
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}

.register .nav-tabs .nav-link {
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}

.register .nav-tabs .nav-link:hover {
    border: none;
}

.register .nav-tabs .nav-link.active {
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}

.register-heading {
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}

.preview {
    width: 100px;
    height: 100px;
    border: 1px solid black;
    margin: 0 auto;
    background: white;
}

.preview img {
    display: none;
}

/* Button */
.button{
   border: 0px;
   background-color: deepskyblue;
   color: white;
   padding: 5px 15px;
   margin-left: 10px;
}
</style>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <input type="submit" name="" value="Login" /><br />
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Registration</h3>
                    <form name="FormName">
                        <div class="row register-form">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <span id="error" style="display:none;"></span>
                                    <input type="text" id="nameValidation" class="form-control"
                                        placeholder="Full Name *" value="" />
                                </div>

                                <div class="form-group">
                                    <span id="error2" style="display:none;"></span>
                                    <span id="main_notification" style="display:none;"></span>
                                    <input type="password" id="password" class="form-control" placeholder="Password*"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" id="conPassword" onchange="pass_match()" class="form-control"
                                        placeholder="Confirm Password *" value="" />
                                </div>
                                <!-- <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> Male </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="female">
                                            <span>Female </span>
                                        </label>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">

                                    <label for="exampleFormControlFile1">Upload Your Profile Image</label>
                                    <input type="file" id="file" name="file"/>
                                    <input type="button" class="button" value="Upload" id="but_upload" onclick="image_upload()">
                                    <div class='preview'>
                                        <img src="" id="img" width="100" height="100">
                                    </div>
                                </div> -->
                                <div class="form-group">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" id="uEmail" class="form-control" placeholder="Your Email *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="10" id="phone_number" maxlength="10" name="txtEmpPhone"
                                        class="form-control" placeholder="Your Phone *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control" placeholder="Enter Your Answer *"
                                        value="" id="dob"/>
                                </div>
                                <button type="button" class="btnRegister" onclick="register()">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include '../view/layout/js_lib.php'; ?>