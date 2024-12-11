<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('../assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('../assets/css/styles.min.css') }}" />
</head>

<body style="background-color: rgb(173, 216, 230);">
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">


    <!-- Sidebar Start -->
    <x-sidebar :projects="$projects"/>
<!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
     
      <!--  Header End -->
      {{-- content start --}}
        <div style="margin-top: 100px"  class="container mt-5">
          
            <h2 class="text-center mb-4">New Project</h2>
              <div class="row justify-content-center">
                <div class="col-10">
                  <form >
                    <div class="mb-3">
                        <label for="name" class="form-label fs-4">Task Name</label>
                        <input type="text" class="form-control bg-body-tertiary bg-secondary-subtle" name="task_name" placeholder="Enter your name">
                    </div>

                    {{-- <div class="mb-3">
                      <label for="category" class="form-label fs-4">project</label>
                      <select class="form-select  bg-secondary-subtle" id="category">
                          <option value="general">Intern</option>
                          <option value="support">Supervisor</option>
                          <option value="feedback">Others</option>
                      </select>
                  </div> --}}

                  <!-- Project Select Dropdown -->
<div class="mb-3">
  <label for="project_name" class="form-label fs-4">Project</label>
  <select class="form-select bg-secondary-subtle" id="project_name">
      <option value="">Select a Project</option>
      @foreach ($projects as $project)
          <option value="{{ $project->project_name }}">{{ $project->project_name }}</option>
      @endforeach
  </select>
</div>

<!-- Div to display project details -->
<div id="project_details"></div>

<!-- Include jQuery (you can also use vanilla JavaScript if preferred) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function () {
      $('#project_name').on('change', function () {
          var projectName = $(this).val();  // Get the selected project name

          if (projectName) {
              // Make an AJAX request to get project details
              $.ajax({
                  url: '/project-form/' + projectName,  // URL of the controller method
                  type: 'GET',
                  success: function (data) {
                      if (data.error) {
                          // Show an error message if project not found
                          $('#project_details').html('<p>' + data.error + '</p>');
                      } else {
                          // Display project details dynamically
                          $('#project_details').html(`
                              <div class="card">
                                  <div class="card-body">
                                      <h5 class="card-title">${data.project_name}</h5>
                                      <p class="card-text"><strong>Description:</strong> ${data.project_description}</p>
                                      <p class="card-text"><strong>Company:</strong> ${data.company}</p>
                                      <p class="card-text"><strong>Start Date:</strong> ${data.start_date}</p>
                                      <p class="card-text"><strong>End Date:</strong> ${data.end_date}</p>
                                  </div>
                              </div>
                          `);
                      }
                  },
                  error: function () {
                      // Handle any errors from the AJAX request
                      $('#project_details').html('<p>Error fetching project details. Please try again.</p>');
                  }
              });
          } else {
              // Clear project details if no project is selected
              $('#project_details').html('');
          }
      });
  });
</script>

                
                 
             
                  <div class="mb-3">
                    <label for="category" class="form-label fs-4">project</label>
                    <select class="form-select  bg-secondary-subtle" id="category">
                        <option value="general">made</option>
                        <option value="support">Super</option>
                        <option value="feedback">Other</option>
                    </select>
                </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label fs-4">Project_description</label>
                        <input type="text" class="form-control  bg-secondary-subtle" name="project_description" placeholder="Subject of the message">
                    </div>

                    <div class="mb-3">
                      <label for="subject" class="form-label fs-4">priority</label>
                      <input type="text" class="form-control  bg-secondary-subtle" id="subject" placeholder="Subject of the message">
                  </div>


                    <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="startDate" class="form-label fs-4">Start Date</label>
                                    <input type="date" class="form-control  bg-secondary-subtle" name="start_date">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="endDate" class="form-label fs-4">End Date</label>
                                    <input type="date" class="form-control  bg-secondary-subtle" name="end_date">
                                </div>
                            </div>  
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label fs-4">Intern Name</label>
                        <select class="form-select  bg-secondary-subtle" id="category">
                            <option value="general">Intern</option>
                            <option value="support">Supervisor</option>
                            <option value="feedback">Others</option>
                        </select>
                    </div>

                    <div class="mb-3">
                      <label for="category" class="form-label fs-4">Supervisor Name</label>
                      <select class="form-select  bg-secondary-subtle" id="category">
                          <option value="general">Intern</option>
                          <option value="support">Supervisor</option>
                          <option value="feedback">Others</option>
                      </select>
                  </div>
    
                    <button type="submit" class="btn btn-primary btn-lg fs-4">Submit</button>
                </form>
                </div>
              </div>
            

        </div>
      {{-- content end  --}}
    </div>
  </div>
  <script src="{{ asset('../assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('../assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('../assets/js/app.min.js') }}"></script>
  <script src="{{ asset('../assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('../assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('../assets/js/dashboard.js') }}"></script>
</body>

</html>













