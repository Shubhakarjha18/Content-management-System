<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Post</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Add a New Post</h2>
     
    <form action="{{route('addpost.post') }}" method="POST" id="postForm">
        @csrf
        <div class="form-group">
            <label for="postTitle">Post Title</label>
            <input type="text" name="post_title" class="form-control" id="postTitle" placeholder="Enter the title" required>
        </div>
        <div class="form-group">
            <label for="post_category">Post Category</label>
            <select class="form-control" id="post_category" name="post_category_id" required>
                <option value="" disabled selected>Select a category</option>
               
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
            @endforeach
      
            </select>
        </div>
        

        <div class="form-group">
            <label for="postContent">Post Content</label>
            <textarea  name="post_content" class="form-control" id="postContent" rows="4" placeholder="Enter the content" required></textarea>
        </div>

        <div class="form-group">
            <div id="postAlert" class="text-danger font-weight-bolder"></div>
          </div>
        <div class="form-group">
            <input type="submit" id="addpost-btn" value="Post" class="btn btn-primary btn-lg btn-block myBtn" />
          </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function (){
 $("#postForm").submit(function (e){
    e.preventDefault();
    $("#addpost-btn").val('Please Wait..');

    var form = $("#postForm")[0];
    var data = new FormData(form);

    $.ajax({
        type : "POST",
        url: " {{route('addpost.post') }}",
        data : data,
        processData: false,
        contentType: false,

        success: function(response){
            console.log(response);
            $("#postAlert").text("Post  Added");
            $("#addpost-btn").val('Post');
        },
        error: function (error) {
                    $("#postAlert").text("Post Not Added");
                    $("#addpost-btn").val('Post');
                }
    });

 });
});

</script>
</body>
</html>
