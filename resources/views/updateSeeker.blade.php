<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Seeker Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            overflow-x: hidden;
            background-color: #f8f9fa;
        }

        .container-fluid {
            display: flex;
            justify-content: left;
            align-items: left;
            height: 100%;
            width: 100%;
            margin: 0;
        }

        .update-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%; /* Make it full-width */
           
        }

        .update-form h2 {
            text-align: center;
            color: #007bff;
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-group {
            text-align: center;
        }

        #updateMessage {
            margin-bottom: 10px;
        }

        .btn-myBtn {
            background-color: #007bff;
            color: #fff;
        }

        .form-check-input {
            margin-top: 5px;
        }
        
        .image-container {
            flex: 1; /* Take remaining space */
            padding: 20px;
        }

        .profile-image {
    width: 80%; /* Adjust the width as per your preference */
   
    border-radius: 10px;
    padding: 10px; /* Adjust the padding as per your preference */
}

    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Update Form -->
            <div class="col-md-16">
                <div class="update-form">
                    <h2 class="form-group">Update Seeker Details</h2>

                    <form action="{{ route('updateSeeker.post') }}" method="POST" id="updateSeeker" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Enter your password" @if(isset($_COOKIE['password'])) value="{{ $_COOKIE['password'] }}" @endif>
                        </div>

                        <div class="form-group">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                        </div>

                        <div class="form-group">
                            <label for="image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <div id="updateMessage" class="text-danger font-weight-bolder"></div>
                            <input type="submit" id="update-btn" value="Update"
                                class="btn btn-primary btn-lg btn-block btn-myBtn" />
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="image-container" >
            <img id="previewImage" src="{{ asset('storage/' . $user->image) }}" alt="Profile Image" class="profile-image">
        </div>
        
    </div>

{{--  --}}

<!-- Bootstrap core JS for Bootstrap 5-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $("#updateSeeker").submit(function (e) {
            e.preventDefault();
            $("#update-btn").val('Please Wait...');

            var form = $("#updateSeeker")[0];
            var data = new FormData(form);

            $.ajax({
                type: "POST",
                url: "{{ route('updateSeeker.post') }}",
                data: data,
                processData: false,
                contentType: false,

                success: function (response) {
                    $("#updateMessage").text('Updated Successfully');
                    $("#update-btn").val('Update Details');

                    // Assuming the response contains the image URL
                    var imageUrl = response.image_url;

                    // Display the image or update the source
                    $("#previewImage").attr("src", imageUrl);
                    $("#image-container").show(); // Show the container if it was hidden
                },
                error: function (error) {
                    $("#updateMessage").text('Not Updated');
                    $("#update-btn").val('Update Details');
                }
            });
        });
    });
</script>



</body>
</html>
