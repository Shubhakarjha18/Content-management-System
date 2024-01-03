<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Post Details</h1>

        @if($post)
        <div class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>
                
               {{ $post->post_title }}
           
      </h1>

            <!-- Author -->
            <p class="lead">
                by <a href="/showprofile">{{auth()->user()->name}}</a>
            </p>
            <p><a href="{{url('update_post',$post->post_id)}}" class="link-underline-dark">Update the post</a></p>
            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at}}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive img-small" src="{{ asset('storage/' . $post->image) }}" alt="50px">

            <hr>

            <!-- Post Content -->
            <p class="lead">{{$post->post_content}}</p>
            @endif
    </div>
</body>
</html>