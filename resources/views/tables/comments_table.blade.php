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
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">comment_post_id</th>

            <th scope="col">comment</th>
            <th scope="col">created at</th>
            <th scope="col">updated at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            @if($comments->count() > 0)
            @foreach ($comments as $comment)
            <tr>
                <th scope="row">{{$comment->comment_id}}</th>
                <td>{{$comment->comment_post_id}}</td>
              
                <td>{{$comment->comment}}</td>
                <td>{{$comment->created_at}}</td>
                <td>{{$comment->updated_at}}</td>
             
                
                <td><a href="{{url('delete', $comment->comment_id) }}" class="link-underline-dark">Delete</a></td>
                
            </tr> 
            @endforeach
        @endif
          
          </tr>
        </tbody>
      </table>
</body>
</html>