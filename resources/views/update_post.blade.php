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
    <h2 class="mb-4">Update the Post</h2>
     
    <form action="{{url('update_post.post',$post->id)}}" method="POST" id="updatepostForm">
        @csrf
        
        <div class="form-group">
            <label for="postTitle">Post Title</label>
            <input type="text" name="post_title" class="form-control" id="postTitle" value="{{ $post->post_title }}" placeholder="Enter the title" required>
        </div>
        <div class="form-group">
            <label for="post_category">Post Category</label>
            <select class="form-control" id="post_category" name="post_category_id" required>
                <option value="" disabled selected>Select a category</option>
       
                      
                @foreach($categories as $category)
                <option value="{{ $category->cat_id }}">{{ $category->cat_name }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Old image" class="form-label">Old Image</label>
           <img src="{{ asset('storage/' . $post->image) }}" height="100px" width="150px" alt="" srcset="">
        </div>
        <div class="form-group">
            <label for="image" class="form-label">Post Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="postContent">Post Content</label>
            <textarea  name="post_content" class="form-control" id="postContent" rows="4" placeholder="Enter the content" required>{{ $post->post_content }}</textarea>
        </div>

        <div class="form-group">
            <div id="updatepostAlert" class="text-danger font-weight-bolder"></div>
          </div>
        <div class="form-group">
            <input type="submit" id="updatepost-btn" value="Update Post" class="btn btn-primary btn-lg btn-block myBtn" />
          </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function (){
 $("#updatepostForm").submit(function (e){
    e.preventDefault();
    $("#updatepost-btn").val('Please Wait..');

    var form = $("#updatepostForm")[0];
    var data = new FormData(form);

    data.set('post_category_id', $('#post_category').val());

    $.ajax({
        type : "POST",
        url: " {{route('update_post.post',['post_id' => $post->post_id])}}",
        data : data,
        processData: false,
        contentType: false,

        success: function(response){
            // console.log(response);
            $("#updatepostAlert").text("Post  Updated");
            $("#updatepost-btn").val('Update Post');
            window.location.href = "/show_posts";
        },
        error: function (error) {
            console.error(error.responseText);
                    $("#updatepostAlert").text("Post Not Updated");
                    $("#updatepost-btn").val('Update Post');
                }
    });

 });
});

</script>
</body>
</html>
