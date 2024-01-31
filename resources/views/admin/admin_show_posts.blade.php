<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <!-- Bootstrap Core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

   <style>

/* Add this to your CSS file or in a <style> tag in your HTML */
    .img-small {
            width: 200px;
            height: auto;
        }
        
   </style>
    
</head>

<body>


    <!-- Page Content -->
    <div class="container">

        <div class="row">
            @foreach($posts as $post)
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>
                    
                   {{ $post->post_title }}
               
          </h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="{{route('show.profile',$post->user->id)}}">{{$post->user->name}}</a>
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

                <hr>

                <!-- Blog Comments -->
           

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action = "{{ route('comment.post', $post->post_id) }}" method="POST" id="comment-form">
                        @csrf
                        <div class="form-group">
                            <textarea name="comment" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <div id="commentAlert" class="text-danger font-weight-bolder"></div>
                          </div>
                        <div class="form-group">
                            <input type="submit" id="comment-btn" value="Comment" class="btn btn-primary btn-lg btn-block myBtn" />
                          </div>
                    </form>
                </div>

                <hr>

                {{-- <a href="{{url('update_post',$post->post_id)}}" class="btn btn-primary btn-lg " role="button"  aria-disabled="true">Update</a> --}}
                {{-- <a href="{{url('comment',$post->post_id)}}" id="comment-btn" class="btn btn-primary btn-lg " role="button" aria-disabled="true">Comment</a>
                <a href="{{url('view_comments',$post->post_id)}}" id="comment-btn" class="btn btn-primary btn-lg " role="button" aria-disabled="true">View Comment</a> --}}
                
                <hr>
                <hr>
                <h4>Comments:</h4>
                @foreach ($post->comments as $comment)
                
               
                    <div class="form-group">
                        <strong> {{ $comment->user->name }}</strong> said:
                        <p>{{ $comment->comment }}</p>
                        <!-- Add more fields as needed -->
                    </div>
                @endforeach
            </div>


            @endforeach
        </div>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  
    

</body>

</html>
