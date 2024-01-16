<!-- resources/views/all_users.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h3>All Registered Users</h3>

    
    <table class="table table-striped table-bordered table-dark">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
              
                <th>Gender</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Qualification</th>
                <th>skills</th>
                <th>Description</th>
                <th>Date Of Birth</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->admin_id }}</td>
                    <td>{{ $admin->admin_name }}</td>
                    <td>{{ $admin->admin_email }}</td>
                    <td>{{ $admin->password }}</td>
                   
                    <td>{{ $admin->admin_gender }}</td>
                    <td>{{ $admin->admin_phone }}</td>
                    <td>{{ $admin->admin_image }}</td>
                    <td>{{ $admin->admin_qualifiation }}</td>
                    <td>{{ $admin->admin_skills }}</td>
                    <td>{{ $admin->admin_description }}</td>
                    <td>{{ $admin->admin_date_of_birth}}</td>
                    <!-- Add more columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
