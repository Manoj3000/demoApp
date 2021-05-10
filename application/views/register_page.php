<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="card card-lg p-4 mt-5 bg-light shadow" style="width:400px;">
            <form id="registerUser">
                <h4 class="text-center">Create New Account</h4>
                <div class="form-group mt-3">
                    <label for="name">Enter Name</label>
                    <input type="text" class="form-control" placeholder="Name" id="name">
                    <p id="nameErrorMsg"></p>
                </div>
                <div class="form-group">
                    <label for="email">Enter Email</label>
                    <input type="email" class="form-control" placeholder="Email" id="email">
                    <p id="emailErrorMsg"></p>
                </div>
                <div class="form-group">
                    <label for="password">Enter Password</label>
                    <input type="password" class="form-control" placeholder="**********" id="password">
                    <p id="passErrorMsg"></p>
                </div>
                <div class="text-center">
                    <p class="text-center" id="msg"></p>
                    <button type="submit" class="btn btn-block btn-primary">Register</button>
                    <hr>
                    <a href="<?php echo base_url('Login'); ?>" class="btn-block">Login</a>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            
            $("#email").on("change", function(){
              var email =  $(this).val();
              $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('Login/checkEmail'); ?>",
                  data: 'email='+email,
                  cache: false,
                  success: function(result){
                    if(result == 1)
                    {
                        $("#emailErrorMsg").text("Email is already exit.").css("color","red");
                        $('#email').val('');
                    }      
                    else{
                        $("#emailErrorMsg").text("");
                    }         
                  }
              });
            });

            validation = function(){
                var name = $("#name").val();
                var email = $("#email").val();
                var password = $("#password").val();

                if(name === ""){
                    $("#nameErrorMsg").text("Name is required").css("color","red");
                    return false;
                }else{
                    $("#nameErrorMsg").text("");
                }

                if(email === ""){
                    $("#emailErrorMsg").text("Email is required").css("color","red");
                    return false;
                }else{
                    $("#emailErrorMsg").text("");
                }

                if(password === ""){
                    $("#passErrorMsg").text("Password is required").css("color","red");
                    return false;
                }else{
                    $("#passErrorMsg").text("");
                }                
            }

            $("form#registerUser").submit(function(e){
                e.preventDefault();
                var $this = $(this);
                var status = validation();

                if(status == true || status == undefined){

                    var name = $("#name").val();
                    var email = $("#email").val();
                    var password = $("#password").val();

                    var formData = new FormData(this);

                    formData.append("name",name);
                    formData.append("email",email);
                    formData.append("password",password);

                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url("Login/registerUser"); ?>",
                        data:formData,
                        processData:false,
                        contentType:false,
                        cache:false,
                        success:function(res){
                            if(res){
                                $this.closest("#registerUser").find("#msg").text("Registered successfully.").css("color", "green");
          		    		    setTimeout(function(){window.location.href="<?php echo base_url("Login");?>"; $("#msg").text(""); $('form#registerUser').each(function(){this.reset();  }); }, 2000);
                            }else{
                                $this.closest("#registerUser").find("#msg").text("Registration Failed.").css("color", "red");
          		    		    setTimeout(function(){ $("#msg").text(""); $('form#registerUser').each(function(){this.reset(); }); }, 2000);
                            }
                        },
                        error:function(error){
                            console.log(error);
                            $this.closest("#registerUser").find("#msg").text(error.statusText).css("color", "red");
          		    	    setTimeout(function(){ $("#msg").text(""); $('form#registerUser').each(function(){this.reset(); }); }, 2000);
                        }
                    });
                }else{
                    $this.closest("#registerUser").find("#msg").text("Please fill all fields.").css("color", "red");
                }

            });
        });
    </script>
</body>
</html>