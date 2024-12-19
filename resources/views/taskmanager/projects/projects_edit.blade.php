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
                <span class="navbar-brand mb-0 h1">Project Form</span>
            </div>
        </nav>

        <!-- Form Content -->
        <div class="form-container">
            <h4 class="mb-4">Add New Project</h4>
            <form action="/projects/{{ $projects->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="projectName" class="form-label">Project Name</label>
                    <input type="text" class="form-control" id="projectName" name="project_name" value="{{ $projects->project_name }}" placeholder="{{ $projects->project_name }}">
                </div>

                <div class="mb-4">
                    <label for="projectDescription" class="form-label">Project Description</label>
                    <input class="form-control" id="projectDescription" name="project_description" value="{{ $projects->project_description }}" rows="4" placeholder="{{ $projects->project_description }}"></input>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-select" id="priority" name="priority">
                            <option value="{{ $projects->priority }}">{{ $projects->priority }}</option>
                            <option value="Critical">Critical</option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="company" class="form-label">Company</label>
                        <select class="form-select" id="company" name="company">
                            @foreach ($company as $company)
                                <option value="{{ $company->company_name }}">{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="{{ $projects->start_date }}" value="{{ $projects->start_date }}">
                    </div>
                    <div class="col-md-6">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="endDate" name="{{ $projects->end_date }}" value="{{ $projects->end_date }}">
                    </div>
                </div>

                {{-- <div class="mb-4">
                    <label for="additionalNotes" class="form-label">Additional Notes</label>
                    <textarea class="form-control" id="additionalNotes" name="message" rows="4" value="{{ $projects->message }}" placeholder="{{ $projects->message }}" ></textarea>
                </div> --}}

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
