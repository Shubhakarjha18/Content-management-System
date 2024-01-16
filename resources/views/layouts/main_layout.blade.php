<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>
  <!-- Bootstrap 4 CSS CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
  <!-- Fontawesome CSS CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
  <link rel="stylesheet" href="css/style.css">
  <!-- jQuery 3.6.0 CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



</head>
<body class="bg-info">
  <div class="container">
    <!-- Login Form Start -->
    @yield('login')
    <!-- Login Form End -->
    <!-- Registration Form Start -->
    @yield('signup')
    <!-- Registration Form End -->
    <!-- Forgot Password Form Start -->
   @yield('forgot')
    <!-- Forgot Password Form End -->
    @yield('reset')

  </div>
    
  <script>
    $(document).ready(function () {
        $("#register-link").on("click", function () {
            console.log("Register link clicked");
            $("#login-box").hide();
            $("#register-box").show();
        });
    
        $("#login-link").on("click", function () {
            console.log("Login link clicked");
            $("#login-box").show();
            $("#register-box").hide();
        });
    
        $("#forgot-link").on("click", function () {
            console.log("Forgot link clicked");
            $("#login-box").hide();
            $("#forgot-box").show();
        });
    
        $("#back-link").on("click", function () {
            console.log("Back link clicked");
            $("#login-box").show();
            $("#forgot-box").hide();
        });
    
        var data;
    
        $("#register-form").submit(function (e) {
            e.preventDefault();
            $("#register-btn").val('Please Wait..');
    
            var form = $("#register-form")[0];
            data = new FormData(form);
    
            $.ajax({
                type: "POST",
                url: "{{ route('signup.post') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function (response) {
                            // console.log('Response:', response);
                            // $("#passError").text('Registered');
                            //     window.location.href = "/login";
                            var userRole = response.role.trim();
                            console.log('User Role:', userRole);

                            if (userRole === 'admin') {
                                // console.log('Redirecting to /admin/authenticator');
                                $("#passError").text('Registered');
                                window.location.href = "/admin/authenticator";
                            } else {
                                // console.log('Redirecting to /login');
                                $("#passError").text('Registered');
                                window.location.href = "/login";
                            }
                        },
                error: function (error) {
                    console.error(error);
                    $("#passError").text('Not Registered');
                    $("#register-btn").val('Sign Up');
                    // window.location.href = "/signup";
                }
            });
        });
    
        $("#login-form").submit(function (e) {
            e.preventDefault();
            $("#login-btn").val('Please Wait..');
            var form = $("#login-form")[0];
            data = new FormData(form);
    
            $.ajax({
                type: "POST",
                url: "{{ route('login.post') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    $("#login-btn").val('Sign In');
                 
                },
                error: function (e) {
                    console.error(e);
                    $("#loggError").text('Not logged In');
                    $("#login-btn").val('Please Wait..');
                    window.location.href = "/home";
                }
            });
        });
    
       
        $("#forgot-form").submit(function (e) {
            e.preventDefault();
            $("#forgot-btn").val('Please Wait..');
            var form = $("#forgot-form")[0];
            data = new FormData(form);
    
            $.ajax({
                type: "POST",
                url: "{{ route('forget.password.post') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    $("#forgotAlert").text('Email Sent');
                    $("#forgot-btn").val('Reset Password');
                 
                },
                error: function (e) {
                    console.error(e.responseJSON);
                    $("#forgotAlert").text('Not Sent');
                    $("#forgot-btn").val('Please Wait..');
                   
                }
            });
        });
    });
    </script>
    

  </body>
</html>