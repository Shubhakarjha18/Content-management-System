<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Signup</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      background-color: #000;
      color: #fff;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background-color: #1a1a1a;
      border-radius: 10px;
      padding: 20px;
      width: 400px;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
    }

    h2 {
      text-align: center;
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
      border: 1px solid #333;
      border-radius: 4px;
      background-color: #333;
      color: #fff;
    }

    button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #4CAF50;
      color: #fff;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="form-container">
      <h2>Admin Signup</h2>
      <form action="{{ route('admin_signup.post') }}" method="post" id="admin-signup-form">
        @csrf
        <label for="username">Username:</label>
        <input type="text" id="username" name="admin_name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="admin_email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="admin_password" required>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="admin_cpassword" required>

        <div class="form-group">
            <div id="signupError" class="text-danger font-weight-bolder"></div>
          </div>

        <div class="form-group">
            <input type="submit" id="signup-btn" value="Sign Up" class="btn btn-danger btn-lg btn-block myBtn" />
          </div>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function(){
          $("#admin-signup-form").submit(function (e){
            var password = $('#password').val();
        var confirmPassword = $('#confirmPassword').val();

        if (password !== confirmPassword) {
          alert('Password and Confirm Password must match.');
              e.preventDefault();
        }
              $("#signup-btn").val('Please Wait..');

              var form = $("#admin-signup-form")[0];
          data = new FormData(form);

          $.ajax({
              type: "post",
              url : " {{ route('admin_signup.post') }} ",
              data : data,
              processData: false,
              contentType: false,
              success: function (response) {
                  console.log(response);
                 
                      $("#signupError").text('Admins Registered');
                      $("#signup-btn").val('Sign Up');
                      window.location.href = "/admin/authenticator";
                  
              },
              error: function (error) {
                  console.error(error);
                  $("#signupError").text('Admins Not Registered');
                  $("#signup-btn").val('Sign Up');
                  // window.location.href = "/admin/authenticator";
              }
          });

          });
      });
  </script>
</body>
</html>
