<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Dashboard</title>
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
            display: flex;
            flex-direction: column;
        }
        .sidebar a, .sidebar button {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            font-weight: 500;
        }
        .sidebar a:hover, .sidebar a:focus, .sidebar button:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }
        .sidebar form {
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            padding-top: 10px;
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
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            background: #fff;
            color: #333;
        }
        .status-form {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .status-form h4 {
            margin-bottom: 20px;
        }
        .status-form label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }
        .status-form button {
            margin-top: 20px;
            background: #6a11cb;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
        }
        .status-form button:hover {
            background: #2575fc;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <x-supervisorbar />

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg mb-4">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Welcome, {{ Auth::guard('supervisor')->user()->supervisor_name }} (Supervisor Dashboard)</span>
            </div>
        </nav>

        <!-- Dashboard Stats -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card">
                    <h5>Total Tasks</h5>
                    <h2>{{ $total_task }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <h5>Completed Tasks</h5>
                    <h2>{{ $total_completed }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <h5>Pending Tasks</h5>
                    <h2>{{ $total_pending }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <h5>Pending Approval</h5>
                    <h2>{{ $pending_approval }}</h2>
                </div>
            </div>
        </div>

        <!-- Status Form -->
        <!-- Status Form -->
<div class="status-form">
    <div class="mt-5">
        <h4>Pending Approval</h4>
        
        @if ($taskCount == 0)

        <p>No Pending Task</p>
        @else

        <table class="table table-striped shadow-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task</th>
                    <th scope="col">Intern Name</th>
                    <th scope="col">Status(Student Dashboard)</th>
                    <th scope="col">Approved?</th>
                    <th scope="col">Submission Deadline</th>
                    <th scope="col">Approval </th>
                </tr>
            </thead>
            <tbody>
            
                @foreach ($tasks as $index => $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td> {{ $task->task_name }}</td>
                    <td>{{ $task->intern}}</td>
                    <td>{{ $task->status}}</td>
                    <td>{{ $task->is_approved? 'Yes' : 'No' }}</td>
                    <td>{{ $task->end_date}}</td>
                    <td>  
                        @if (Auth::guard('supervisor')->user()->role === 'supervisor' && $task->is_approved == 0 && strtolower(trim($task->status)) !== "pending")   
                            <form action="{{ route('approve-task') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $task->id }}">
                                    <button type="submit" class="btn btn-light">Approve</button>
                            </form>
                        @endif
                            {{-- <p> Intern should submit</p> --}}
                        {{-- @endif --}}
                    </td>    
                </tr>
                @endforeach
                
        </tbody>
           
        </table>

        @endif
       



</div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
