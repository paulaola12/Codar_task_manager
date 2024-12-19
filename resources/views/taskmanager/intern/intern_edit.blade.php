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
                <span class="navbar-brand mb-0 h1">Intern Form</span>
            </div>
        </nav>

        <!-- Form Content -->
        <div class="form-container">
            <h4 class="mb-4"> Update Intern Details </h4>
            <form action="/intern/{{ $intern->id }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="projectName" class="form-label">Intern Name</label>
                    <input type="text" class="form-control" id="projectName"  name="intern_name" value="{{ $intern->intern_name }}" placeholder="{{ $intern->intern_name }}">
                </div>

                <div class="mb-4">
                    <label for="projectName" class="form-label">Intern Email</label>
                    <input type="email" class="form-control" id="projectName" name="email" value="{{ $intern->email }}" placeholder="{{ $intern->email }}">
                </div>

                <div class="mb-4">
                    <label for="projectName" class="form-label">Phone Number </label>
                    <input type="number" class="form-control" id="projectName"  name="phone_number" value="{{ $intern->phone_number }}" placeholder="{{ $intern->phone_number }}">
                </div>

                <div class="mb-4">
                    <label for="projectName" class="form-label">Home Address</label>
                    <input type="text" class="form-control" id="projectName" name="home_address" value="{{ $intern->home_address }}" placeholder="{{ $intern->home_address }}" >
                </div>

                <div class="mb-4">
                    <label for="projectName" class="form-label">Class</label>
                    <input type="text" class="form-control" id="projectName"  name="class" value="{{ $intern->class }}" placeholder="{{ $intern->class}}">
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="priority" class="form-label">Studio</label>
                        <select class="form-select"  name="studio">
                            <option value="{{ $intern->studio}}">{{ $intern->studio}}</option>
                            <option value="Gbagada">Gbagada</option>
                            <option value="Yaba">Yaba</option>
                            <option value="Lekki">Lekki</option>
                            <option value="Ikeja">Ikeja</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        {{-- <label for="name" class="form-label" >Password</label> --}}
                        <input type="text" class="form-control bg-body-tertiary bg-secondary-subtle" name="password" value="{{ $intern->password }}" placeholder="Enter New Password" hidden>
                    </div>

                    <div class="mb-4">
                        {{-- <label for="projectName" class="form-label">Role</label> --}}
                        <input type="text" class="form-control" id="projectName"  value="intern" name="role" hidden>
                    </div>
    
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
