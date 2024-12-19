<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Dashboard</title>
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
        .card {
            border: 1px solid #ccc;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            background: #f8f9fa;
            color: #333;
        }
        .status-form {
            width: 100%;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .status-form label {
            font-weight: bold;
        }
        .status-form select {
            height: 55px;
            font-size: 16px;
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
        }
        .status-form button {
            background: #6a11cb;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
        }
        .status-form button:hover {
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
        <nav class="navbar navbar-expand-lg mb-4">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1"><p>Welcome, {{ Auth::guard('intern')->user()->intern_name }} (Intern DashBoard)</p></span>
            </div>
        </nav>

        <!-- Dashboard Stats Section -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <h5>Total Tasks</h5>
                    <h2>{{ $task_count }}</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5>Completed Tasks</h5>
                    <h2>{{ $task_completed }}</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5>Pending Approval</h5>
                    <h2>{{ $pending_approval }}</h2>
                </div>
            </div>
        </div>

        <!-- Status Update Section -->
        <div class="status-form">
            <h4 class="mb-4">Update Task Status</h4>
            <form action="{{ route('update_task_status') }}" method="POST">
                @csrf
                
                
                 @foreach ($task as $task)
                    @if ($task->status !== 'Completed')
                    <div class="mb-3">
                        <input type="hidden" name="id" value="{{ $task->id }}"> <!-- Array notation to send multiple IDs -->
                        <label for="status">{{ $task->task_name }}</label>
                        <select class="form-select" name="status"> <!-- Array notation to send multiple statuses -->
                            <option value="Pending" {{ $task->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="In Progress" {{ $task->status === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="Completed" {{ $task->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn">Submit</button>
                    </div>
                        
                    @endif
                   
                 @endforeach 
                 
                 @if ($pendingTasks == 0)
                    <p>No Pending Tasks</P> 
                 @endif
                
                
              
              
            </form>
        </div>
        
        
    </div>

    <script>
        function checkInternStatus(selectElement) {
            if (selectElement.value === 'Completed') {
                alert('Only a supervisor or admin can mark this task as completed.');
                selectElement.value = 'Pending'; // Reset to previous value
            }
        }
    </script>
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
