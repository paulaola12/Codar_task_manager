<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Table Page</title>
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
        .table-container {
            width: 100%;
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .table thead {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #fff;
        }
        .table tbody tr:hover {
            background-color: #f0f8ff;
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
                <span class="navbar-brand mb-0 h1">Supervisor Table</span>
            </div>
        </nav>

        <div class="text-center" style="margin-top: 20px;">
            @if(session('supervisor'))
                <div class="alert alert-success" id="supervisor_alert">
                    {{ session('supervisor') }}
                </div>
            @endif
        </div>

        <!-- Table Content -->
        <div class="table-container">
            <h4 class="mb-4">Supervisor Records</h4>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Supervisor</th>
                        <th scope="col">Home Address</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Studio</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">View</th>
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supervisor as $supervisor)
                    <tr>
                      <th scope="row">{{ $supervisor->id }}</th>
                      <td>{{ $supervisor->supervisor_name}}</td>
                      <td>{{ $supervisor->home_address }}</td>
                      <td>{{ $supervisor->phone_number }}</td>
                      <td>{{ $supervisor->studio }}</td>
                      <td>{{ $supervisor->created_at }}</td>
                      <td>
                        <a href="/supervisor/{{ $supervisor->id }}" class="btn btn-primary px-3" role="button">
                            Edit
                        </a>
                    </td>
                    <td >
                            
                      <form action="/supervisor/{{ $supervisor->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-primary px-3" type="submit">Delete</button>
                      </form> 
                      
                    </td> 



                  </tr>
                    @endforeach  
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var alert = document.getElementById('supervisor_alert');
            if (alert) {
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 2000);  
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
