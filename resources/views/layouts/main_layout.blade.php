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
    <div class="row justify-content-center wrapper" id="forgot-box" style="display: none;">
      <div class="col-lg-10 my-auto myShadow">
        <div class="row">
          <div class="col-lg-7 bg-white p-4">
            <h1 class="text-center font-weight-bold text-primary">Forgot Your Password?</h1>
            <hr class="my-3" />
            <p class="lead text-center text-secondary">To reset your password, enter the registered e-mail adddress and we will send you password reset instructions on your e-mail!</p>
            <form action="#" method="post" class="px-3" id="forgot-form">
              @csrf
              <div id="forgotAlert"></div>
              <div class="input-group input-group-lg form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg"></i></span>
                </div>
                <input type="email" id="femail" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
              </div>
              <div class="form-group">
                <input type="submit" id="forgot-btn" value="Reset Password" class="btn btn-primary btn-lg btn-block myBtn" />
              </div>
            </form>
          </div>
          <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
            <h1 class="text-center font-weight-bold text-white">Reset Password!</h1>
            <hr class="my-4 bg-light myHr" />
            <button class="btn btn-outline-light btn-lg font-weight-bolder myLinkBtn align-self-center" id="back-link">Back</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Forgot Password Form End -->
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
            console.log(response);
            $("#register-btn").val('Sign Up');
            $("#passError").text('Registered');
            // $("#register-box").hide();
            // $("#login-box").show();

        },
        error: function (e) {
            // $("#passError").text('Not Registered');
            $("#register-btn").val('Sign Up');

        }
    });
});



        $("#login-form").submit(function (e){
          e.preventDefault();
          $("#login-btn").val('Please Wait..');
          var form = $("#login-form")[0];
        data = new FormData(form);

          $.ajax({
              type : "POST",
              url : "{{ route('login.post') }}",
              data : data,
              processData: false,
              contentType: false,

              success: function(resposne){
                // console.log(response);
                $("#login-btn").val('Sign In');
              },
              error: function (e) {
            $("#loggError").text('Not logged In');
            $("#login-btn").val('Please Wait..');

        }
          });
        });

console.log("Signup route: {{ route('signup.post') }}");
  });
</script>

  </body>
</html>