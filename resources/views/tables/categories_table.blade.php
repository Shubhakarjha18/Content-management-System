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
        <h1>Welcome to see the categories {{$categories->count()}} </h1>
<div class="row">
    <div class="col-md-12">


        <div class="table table-bordered table-hover">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category User</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    @if($categories->count() > 0)
                        @foreach ($categories as $categor)
                        <tr>
                            <th scope="row">{{$categor->cat_id}}</th>
                            <td>{{$categor->cat_name}}</td>
                            <td>{{$categor->cat_descp}}</td>
                            <td>{{$categor->user->name }}</td>
                            <td>{{$categor->created_at}}</td>
                            <td>{{$categor->updated_at}}</td>
                            {{-- <td>{{$post->image}}</td> --}}
                            <td><a href="{{url('edit_category',$categor->cat_id)}}" class="link-underline-dark">Edit</a></td>
                            <td><a href="{{url('delet',$categor->cat_id)}}" class="link-underline-dark">Delete</a></td>
                            <td><a href="{{url('show_categories',$categor->cat_id)}}" class="link-underline-dark">view</a></td>
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
