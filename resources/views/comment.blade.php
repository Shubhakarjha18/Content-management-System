<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Comment Form</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <h2 class="mt-5 mb-3">Comment Form</h2>
        <form action = "{{ route('comment.post', $post->post_id) }}" method="POST" id="comment-form">
            @csrf
           

            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <div id="commentAlert" class="text-danger font-weight-bolder"></div>
              </div>

              <div class="form-group">
            <input type="submit" id="comment-btn" value="Comment" class="btn btn-primary btn-lg btn-block myBtn" />
          </div>
        </form>
    </div>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#comment-form").submit(function (e){
                e.preventDefault();
                $("#comment-btn").val('Please Wait');

                var form = $("#comment-form")[0];
                var data = new FormData(form);

                $.ajax({
                    type : "POST",
                    url : "{{route('comment.post',['post_id' => $post->post_id])}}",
                    data : data,
                    processData: false,
                    contentType: false,

                    success : function(response){
                        // console.log(response);
                        $("#commentAlert").text('YeaH commented!!');
                        $("#comment-btn").val('Comment');
                        window.location.href = "/show_posts";

                    },
                    error: function(error){
                       
                        // console.log(error);
                        $("#commentAlert").text('Not commented!!');
                        $("#comment-btn").val('Comment');
                    }
                });
            });
        });
            
        
    </script>
</body>
</html>
