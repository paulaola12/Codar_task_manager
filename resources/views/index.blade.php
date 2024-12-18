<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        .dropdown-toggle::after {
            display: inline-block;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid;
            border-right: .3em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent;
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
                <span class="navbar-brand mb-0 h1">Welcome, Admin</span>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="container">
            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-md-3">
                    <div class="card text-center shadow-sm border-0" style="background: #ff9a9e; color: #fff;">
                        <div class="card-body">
                            <h5 class="card-title">Total Supervisors</h5>
                            <p class="fs-4">{{ $supervisor_count }}</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-3">
                    <div class="card text-center shadow-sm border-0" style="background: #fbc2eb; color: #fff;">
                        <div class="card-body">
                            <h5 class="card-title">Total Interns</h5>
                            <p class="fs-4">{{ $intern_count }}</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-3">
                    <div class="card text-center shadow-sm border-0" style="background: #a1c4fd; color: #fff;">
                        <div class="card-body">
                            <h5 class="card-title">Total Assigned Tasks</h5>
                            <p class="fs-4">{{ $total_tasks }}</p>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-md-3">
                    <div class="card text-center shadow-sm border-0" style="background: #c2e9fb; color: #fff;">
                        <div class="card-body">
                            <h5 class="card-title">Total Appproved</h5>
                            <p class="fs-4">{{ $total_approved }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="mt-5">
                <h4>Pending Approval</h4>
                <table class="table table-striped shadow-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task Name</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Intern</th>
                            <th scope="col">Supervisor</th>
                            <th scope="col">Has Intern Completed</th>
                            <th scope="col">Approval Status</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ( $display_unapproved as $display_unapproved)
                            <tr>
                                <th scope="row">{{ $display_unapproved->id }}</th>
                                <td>{{ $display_unapproved->task_name }}</td>
                                <td>{{ $display_unapproved->priority }}</td>
                                <td>{{ $display_unapproved->end_date }}</td>
                                <td>{{ $display_unapproved->intern }}</td>
                                <td>{{ $display_unapproved->supervisor }}</td>
                                <td>{{ $display_unapproved->status }}</td>
                                <td>{{ $display_unapproved->is_approved ? 'Approved' : 'Not Approved' }}</td>
                                {{-- @if ($display_unapproved->status === false)
    <td>Not Approved</td>
@elseif ($display_unapproved->status === true)
    <td>Approved</td>
@else
    <td>Unknown Status</td>
@endif --}}


                            </tr>
                            @endforeach
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
