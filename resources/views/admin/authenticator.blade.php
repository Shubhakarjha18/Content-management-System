<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #000; /* Updated to black */
        }

        .card-container {
            max-width: 400px;
            margin: auto;
            margin-top: 50px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .card-header {
            background-color: #ff0000; /* Updated to red */
            color: white;
            text-align: center;
            padding: 20px;
        }
        .card-body {
            padding: 20px;
        }

        .btn-login,
        .btn-signup {
            color: #fff;
            background-color: #007bff;
            border: none;
            width: 100%;
            padding: 10px;
            cursor: pointer;
        }

        .btn-signup {
            background-color: #28a745;
        }
    </style>
</head>

<body>

    <div class="card-container">
        <!-- Admin Login Card -->
        <div class="card" id="login-box">
            <div class="card-header">
                <h4>Admin Login</h4>
                
            </div>
            <div class="card-body">
                <form action="{{ route('admin_auth.post') }}" method="post" id="admin_login">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="admin_email" placeholder="Enter your Email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="admin_password" placeholder="Enter Your password" required>
                    </div>
                    <div class="form-group clearfix">
                        <div class="custom-control custom-checkbox float-left">
                          <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" />
                          <label class="custom-control-label" for="customCheck">Remember me</label>
                        </div>
                        <div class="forgot float-right">
                          <a href="#" id="forgot-link">Forgot Password?</a>
                        </div>
                      </div>
                      <div class="form-group">
                        <div id="loggError" class="text-danger font-weight-bolder"></div>
                      </div>
                      <div class="form-group">
                        <input type="submit" id="login-btn" value="Sign In" class="btn btn-warning btn-lg btn-block myBtn" />
                      </div>
                </form>
            </div>
        </div>

        
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#admin_login").submit(function (e){
                e.preventDefault();
                $("#login-btn").val('Please Wait..');

                var form = $("#admin_login")[0];
            data = new FormData(form);

            $.ajax({
                type: "post",
                url : " {{ route('admin_auth.post') }} ",
                data : data,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                   
                        $("#loggError").text('Logged In');
                        $("#login-btn").val('Sign In');
                        window.location.href = "/admin/admin_home";
                    
                },
                error: function (error) {
                    console.error(error.responseText);
                    $("#loggError").text('Not Logged In');
                    $("#login-btn").val('Sign In');
                    // window.location.href = "/admin/authenticator";
                }
            });

            });
        });
    </script>
  
</body>

</html>
