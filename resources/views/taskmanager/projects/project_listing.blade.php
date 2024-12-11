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
    <x-sidebar />
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      {{-- <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          
        </nav>
      </header> --}}
      <!--  Header End -->
      {{-- content start --}}
      <div class="container mt-5">
        <h2 class="text-center mb-4" style="font-weight: bold; font-family: 'Arial', sans-serif;">Project Listing</h2>

            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Project</th>
                        <th scope="col">Project_description</th>
                        <th scope="col">Company</th>
                        <th scope="col">priority</th>
                        {{-- <th scope="col">Start Date</th>
                        <th scope="col">End Date</th> --}}
                        <th scope="col">Update</th>
                    </tr>
                </thead>

                <tbody>
                  @foreach ($projects as $projects)
                  <tr>
                    <th>{{ $projects->id }}</th>
                    <td>{{ $projects->project_name }}</td>
                    <td>{{ $projects->project_description }}</td>
                    <td>{{ $projects->company }}</td>
                    <td>{{ $projects->priority }}</td>
                    
                    {{-- <td>{{ $projects->start_date }}</td>
                    <td>{{ $projects->end_date }}</td> --}}
                    <td>Update</td>
                </tr>
                  @endforeach
                    
                  
                    
                </tbody>
            </table>
         </div>
      {{-- content end  --}}
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
</body>

</html>
