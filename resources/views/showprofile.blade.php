<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .profile-image {
            width: 80px; /* Adjust the size as needed for a passport-size photo */
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>User Details</h2>
    
    {{-- <div class="card">
        <img src="{{ asset($user->image) }}" alt="User Image" class="card-img-top profile-image">
        <div class="card-body">
            <h5 class="card-title">{{ $users->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Age:</strong> {{ $user->age }}</p>
            <p class="card-text"><strong>Gender:</strong> {{ $user->gender }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $user->phone }}</p>
            
            <!-- Add more details as needed -->
        </div>
    </div> --}}
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
