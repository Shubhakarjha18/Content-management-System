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
        <h1>Welcome to see the posts  </h1>
<div class="row">
    <div class="col-md-12">


        <div class="table table-bordered table-hover">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Post Title</th>
                        <th scope="col">Post Content</th>
                        <th scope="col">Post category id</th>
                        <th scope="col">Post User</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Post Image</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        <th scope="col">View</th>
                        <th scope="col">Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @if($posts->count() > 0)
                        @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{$post->post_id}}</th>
                            <td>{{$post->post_title}}</td>
                            <td>{{$post->post_content}}</td>
                            <td>{{$post->category_name}}</td>
                            <td>{{$post->user_name}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>{{$post->image}}</td>
                            <td><a href="{{url('update_post',$post->post_id)}}" class="link-underline-dark">Edit</a></td>
                            <td><a href="{{url('deleted', $post->post_id) }}" class="link-underline-dark">Delete</a></td>
                            <td><a href="{{url('posts',$post->post_id)}}" class="link-underline-dark">view</a></td>
                            <td>{{$post->Approval}}</td>
                        </tr>  
                         @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</body>
</html>
