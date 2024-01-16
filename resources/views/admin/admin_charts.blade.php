<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-4">
                <div class="card bg-primary text-light text-center font-weight-bold">
                    <div class="card-header"><h4>Users</h4></div>
                    <div class="card-body">
                        <h1 class="display-4">{{$totalUsers}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-primary text-light text-center font-weight-bold">
                    <div class="card-header"><h4>Posts</h4></div>
                    <div class="card-body">
                        <h1 class="display-4">{{$totalPosts}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-primary text-light text-center font-weight-bold">
                    <div class="card-header"><h4>Categories</h4></div>
                    <div class="card-body">
                        <h1 class="display-4">{{$totalCategories}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container mt-3">
        <div class="row">
            <div class="col-lg-4">
                <div class="card bg-warning text-light text-center font-weight-bold">
                    <div class="card-header"><h4>Comments</h4></div>
                    <div class="card-body">
                        <h1 class="display-4">{{$totalComments}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-warning text-light text-center font-weight-bold">
                    <div class="card-header"><h4>Admins</h4></div>
                    <div class="card-body">
                        <h1 class="display-4">{{$totalAdmins}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-warning text-light text-center font-weight-bold">
                    <div class="card-header"><h4>Website hits</h4></div>
                    <div class="card-body">
                        <h1 class="display-4">{{$totalHits}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
