<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Comments</title>
    <!-- Include Bootstrap CSS (you can download it or use CDN) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Add your custom styles here */
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Comments</h2>

    @if(count($comments) > 0)
        <ul class="list-group">
            @foreach($comments as $comment)
                <li class="list-group-item">
                    <strong> {{ $comment->user->name }}</strong> said:
                   <p>{{ $comment->comment }}</p> 
                </li>
            @endforeach
        </ul>
    @else
        <p>No comments available.</p>
    @endif

</div>

<!-- Include Bootstrap JS (optional) and other scripts if needed -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
