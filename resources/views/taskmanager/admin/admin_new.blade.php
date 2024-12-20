<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Project Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            font-weight: 500;
        }
        .sidebar a:hover, .sidebar a:focus {
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
            color: #fff;
        }
        .form-container {
            width: 100%;
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .form-label {
            font-weight: 600;
        }
        .form-container button {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            border: none;
        }
        .form-container button:hover {
            background: linear-gradient(135deg, #2575fc 0%, #6a11cb 100%);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
   <x-sidebarr />

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg mb-4">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Admin Registeration Page</span>
            </div>
        </nav>

        <!-- Form Content -->
        <div class="form-container">
            <h4 class="mb-4">Create Admin Account</h4>
            <form action="{{ route('admin.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="projectName" class="form-label">Intern Name</label>
                    <input type="text" class="form-control" id="projectName" name="name" placeholder="Enter Intern name">
                </div>

                <div class="mb-4">
                    <label for="projectName" class="form-label">Intern Name</label>
                    <input type="email" class="form-control" id="projectName" name="email" placeholder="Enter Email">
                </div>

                <div class="mb-4">
                    <label for="projectName" class="form-label">Phone Number </label>
                    <input type="number" class="form-control" id="projectName" name="phone_number" placeholder="Enter Phine Number">
                </div>

                <div class="mb-4">
                    <label for="projectName" class="form-label">Home Address</label>
                    <input type="text" class="form-control" id="projectName"  name="address" placeholder="Enter Home Address">
                </div>

                <div class="mb-4">
                    <label for="projectName" class="form-label">Picture</label>
                    <input type="file" class="form-control" id="projectName"  name="image" placeholder="Select IMage">
                </div>

                <div class="mb-4">
                    <label for="projectName" class="form-label">Password</label>
                    <input type="text" class="form-control" id="projectName"  name="password" placeholder="Enter Home Address">
                </div>

                <div class="mb-4">
                    {{-- <label for="projectName" class="form-label">Role</label>  --}}
                    <input type="text" class="form-control" id="projectName"  value="admin" name="role" hidden> 
                </div> 

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
