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
    <x-sidebar/>
<!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
     
      <!--  Header End -->
      {{-- content start --}}
        <div style="margin-top: 100px"  class="container mt-5">
          
            <h2 class="text-center mb-4">New Task</h2>
              <div class="row justify-content-center">
                <div class="col-10">
                  <form action="{{ route('create_task') }}" method="POST">
                    @csrf
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
  <select class="form-select bg-secondary-subtle" name="project_name" id="project_name">
      <option value="">Select a Project</option>
      @foreach ($projects as $project)
          <option value="{{ $project->project_name }}">{{ $project->project_name }}</option>
      @endforeach
  </select>
</div>


<div id="project_details"></div>


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
                  {{-- php continues --}}
                  <div class="mb-3">
                    <label for="category" class="form-label fs-4">Priority</label>
                    <select class="form-select  bg-secondary-subtle" name="priority">
                        <option value="Critical">Critical</option>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                </div>


                    <div class="mb-3">
                      <label for="subject" class="form-label fs-4">Assign To Intern</label>
                      <select class="form-select  bg-secondary-subtle" >
                        <option value="">Select Intern</option>
                        @foreach ($intern as $interns)
                        <option value="{{ $interns->intern_name }}">{{ $interns->intern_name }}</option>
                        @endforeach
                        
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="subject" class="form-label fs-4">Supervisor In Charge</label>
                    <select class="form-select  bg-secondary-subtle" name="supervisor">
                      <option value="Null">Select Supervisor</option>
                      @foreach ($supervisor as $supervisor)
                           <option value="{{ $supervisor->supervisor_name }}">{{ $supervisor->supervisor_name}}</option>
                      @endforeach
                      
                  </select>
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
                      {{-- <label for="name" class="form-label fs-4">Status</label> --}}
                      <input type="text" class="form-control bg-body-tertiary bg-secondary-subtle" name="status" value="Not Started" hidden>
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













