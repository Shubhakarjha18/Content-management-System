<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-K56IKI3MsIp/XwAFR0LaZlAfoh7f1EpaJq5l5E6e9Xk+OFjPevymqVRSOj94mligbBV8pO3ywV5g3ENQpD+lhUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Custom CSS -->
    <style>
        /* Add your custom styles here */
        body {
            padding-top: 60px; /* Adjust based on your navbar height */
        }

        .admin-card {
            max-width: 400px;
            margin: auto;
            margin-top: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .admin-card img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }

        .admin-card .card-header {
            background-color: #ffc107; /* Yellow background color */
            color: #212529; /* Dark text color */
            padding: 10px;
        }

        .admin-card .card-body {
            padding: 20px;
        }
    </style>
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user"></i> Profile</a>
                        <ul class="dropdown-menu">
                            <!-- Dropdown content goes here -->
                            <li><a class="dropdown-item" href="{{ route('showprofile.admin',$admin->admin_id) }}">View Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('updateprofile.post',$admin->admin_id) }}">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.change.password.post', $admin->admin_id) }}">Change Password</a></li>
                            <!-- Add more items as needed -->
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-cog"></i>
                            @if(auth()->guard('admin')->check())
                            {{auth()->guard('admin')->user()->admin_name}}
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout.admin') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin/admin_dashboard">
                                <i class="fas fa-home"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/admin_charts">
                                <i class="fas fa-chart-bar"></i> Charts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/admin_posts">
                                <i class="fas fa-chart-bar"></i> Posts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/admin_categories">
                                <i class="fas fa-chart-bar"></i> Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/admin_comments">
                                <i class="fas fa-chart-bar"></i> Comments
                            </a>
                        </li>
                    
                     
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/admin_show_posts">
                                <i class="fas fa-table"></i>All Posts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/all_users">
                                <i class="fas fa-table"></i>All Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/admin_users">
                                <i class="fas fa-table"></i>All Admins
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/online_users">
                                <i class="fas fa-table"></i>online Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/admin_visitors">
                                <i class="fas fa-table"></i>Website hits
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Content -->
            @yield('dashboard')
    
<!-- Admin Card -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="container mt-3">
    <div class="row">
      Welcome Back!!!!
  {{-- <div class="col-lg-4 position-fixed top-50 start-46 translate-middle-y">
      
            <div class="admin-card">
                <!-- Admin Image -->
                <img src="{{ asset('storage/' . $admin->admin_image) }}" alt="Admin Image" style="width: 150px; height: 150px;">

                <!-- Admin Details -->
                <div class="card-header">
                    <h4>{{$admin->admin_name}}</h4>
                </div>

                <div class="card-body" style="background-color: #f0f8ff; padding: 10px;">
                    <p style="color: #000080;">Welcome Back!!</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
</main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
     <!-- Bootstrap JS and dependencies -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 
     <!-- Font Awesome Icons JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-+DStmd45Pzf0qEuOB+p7MIq+oZp2/V+fnMyRIdaRR2WZsAXUBX1IihTjk+I4vJ+t6MI9PAwRLkF2Ys/GaDwnCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script>
        // Manually initialize the Bootstrap dropdown
        $(document).ready(function () {
            $('.nav-item .nav-link').click(function () {
                $(this).next('.dropdown-menu').toggle();
            });

            // Hide dropdown when clicking outside
            $(document).click(function (e) {
                if (!$(e.target).closest('.nav-item').length) {
                    $('.dropdown-menu').hide();
                }
            });
        });
    </script>
    </body>
</html>
