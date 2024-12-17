<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Form</title>
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
            padding: 30px;
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
                <span class="navbar-brand mb-0 h1">Task Form</span>
            </div>
        </nav>

        <!-- Form Content -->
        <div class="form-container">
            <h4 class="mb-4">Add New Task</h4>
            <form action="{{ route('create_task') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="taskName" class="form-label">Task</label>
                    <input type="text" class="form-control" id="taskName" name="task_name" placeholder="Enter New Task">
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="project" class="form-label">Project Name</label>
                        <select class="form-select" id="project" name="project_name" id="project_name" >
                            <option value="">Select a Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->project_name }}">{{ $project->project_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-select" id="priority" name="priority">
                            <option selected disabled>Select priority</option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>
                    <div class="col-md-12"  id="project_details"></div>
                </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function () {
      $('#project_name').on('change', function () {
          var projectName = $(this).val();  

        //   console.log('Selected project_id:', projectName);

        var url = '/task_manager/' + projectName;
            //   console.log('AJAX URL:', url);

          if (projectName) {
            // console.log('AJAX Request Triggered');
              
              $.ajax({
             
                  url: '/task_manager/' + projectName,
                  
                  type: 'GET',
                  success: function (data) {
                    // console.log('Response Data:', data);
                      if (data.error) {
                          $('#project_details').html('<p>' + data.error + '</p>');
                      } else {
                          $('#project_details').html(`
                              <div class="card">
                                  <div class="card-body">
                                        <p class="card-title"><strong>Company Name:</strong> ${data.company}</p> 
                                      <p class="card-title"><strong>Description:</strong> ${data.project_description}</p>  
                                  </div>
                              </div>
                          `);
                      }
                  },
                  error: function () {
                      // errors picked 
                      $('#project_details').html('<p>Error fetching project details. Please try again.</p>');
                  }
              });
          } else {
             
              $('#project_details').html('');
          }
      });
  });
</script>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="assignToIntern" class="form-label">Assign to Intern</label>
                        <select class="form-select" id="assignToIntern" name="intern">
                            <option value="Critical">Select Intern</option>
                               @foreach ($intern as $interns)
                            <option value="{{ $interns->intern_name }}">{{ $interns->intern_name }}</option>
                               @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="supervisor" class="form-label">Supervisor in Charge</label>
                        <select class="form-select" id="supervisor" name="supervisor">
                            <option value="Nil">Select Supervisor</option>
                            @foreach ($supervisor as $supervisor)
                                 <option value="{{ $supervisor->supervisor_name }}">{{ $supervisor->supervisor_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="start_date">
                    </div>
                    <div class="col-md-6">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" name="end_date">
                    </div>
                </div>

                <div class="mb-3">
                    {{-- <label for="taskName" class="form-label">Status</label> --}}
                    <input type="text" class="form-control" id="taskName" name="status" placeholder="Enter New Task" value="Not Started" hidden>
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
