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
        <div class="card p-4 mt-5 bg-light shadow" style="width:350px">
            <form id="loginUser">
                <h4>Login</h4>
                <div class="form-group mt-3">
                  <input type="email" class="form-control" placeholder="Email" id="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="**********" id="password">
                </div>
                <div class="text-center">
                    <p class="text-center" id="msg"></p>
                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                    <hr>
                    <a href="<?php echo base_url('Register'); ?>" class="btn-block">Don't have an account?</a>
                </div>
            </form>
        </div>
    </div>
    


    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            
            $("form#loginUser").submit(function(e){
                e.preventDefault();
                var $this = $(this);

                var email = $("#email").val();
                var password = $("#password").val();

                if(email != "" && password != ""){

                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url("Login/checkLogin"); ?>",
                        data:"email="+email+"&password="+password,
                        cache:false,
                        success:function(res){
                            if(res != 0){
                                console.log(res);
                                $this.closest("#loginUser").find("#msg").text("Login successfully.").css("color", "green");
                                setTimeout(function(){window.location.href="<?php echo base_url("User");?>"; $("#msg").text(""); $('form#loginUser').each(function(){this.reset();  }); }, 2000);
                            }else{
                                $this.closest("#loginUser").find("#msg").text("You enter wrong email or password.").css("color", "red");
                                setTimeout(function(){ $('form#loginUser').each(function(){this.reset(); }); }, 2000);
                            }
                        }
                    });
                }else{
                    $this.closest("#loginUser").find("#msg").text("Please fill both fields.").css("color", "red");
                }

            });
        });
    </script>
</body>
</html>