@extends('admin.admin_home')
@section('sidebar')
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
                        <a class="nav-link" href="#">
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
                    <!-- Add more menu items as needed -->
                </ul>
            </div>
        </nav>
@endsection