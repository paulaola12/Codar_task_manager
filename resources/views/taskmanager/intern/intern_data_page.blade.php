<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #fff;
            padding-top: 20px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 15px 20px;
            display: block;
            font-weight: 500;
        }
        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }
        .content {
            flex-grow: 1;
            background: #f8f9fa;
            padding: 20px;
        }
        .navbar {
            background-color: #6a11cb;
            color: white;
        }
        .card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            text-align: center;
        }
        .card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 20px 0;
        }
        .change-password {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .change-password button {
            background: #6a11cb;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
        }
        .change-password button:hover {
            background: #2575fc;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
  <x-internsidebar />

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Welcome, {{ Auth::guard('intern')->user()->intern_name }}</a>
            </div>
        </nav>

        <!-- User Details -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-3 d-flex justify-content-center align-items-center">
                        {{-- <img src="https://via.placeholder.com/100" alt="User Picture"> --}}
                        <img src="{{ $logged_in_intern->image ? asset('storage/' . $logged_in_intern->image) : asset('assets/images/backgrounds/rocket.png') }}" alt="No Image here" >
                        <h5 class="mt-2">{{ $logged_in_intern->intern_name }}</h5>
                        <p>{{ $logged_in_intern->email }}</p>
                        <p>{{ $logged_in_intern->phone_number }}</p>
                        <p>{{ $logged_in_intern->home_address }}</p>
                        <p>{{ $logged_in_intern->studio }}(Studio)</p>
                    </div>
                </div>

                <!-- Change Password Form -->
                <div class="col-md-8">
                    <div class="change-password">
                        <h4>Change Password</h4>
                        <form action="{{ route('intern.change_passwordd') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="currentPassword" class="form-label">Current Password</label>
                                <input type="password" class="form-control" name="current_password" placeholder="Enter current password">
                            </div>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">New Password</label>
                                <input type="password" class="form-control" name="new_password" placeholder="Enter new password">
                            </div>
                        
                            <button type="submit" class="btn">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
