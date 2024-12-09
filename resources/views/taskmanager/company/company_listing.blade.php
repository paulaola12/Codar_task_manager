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
        <h2 class="text-center mb-4" style="font-weight: bold; font-family: 'Arial', sans-serif;">Company Listing</h2>

            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Compnay Description</th>
                        <th scope="col">Studio</th>
                        <th scope="col">Date Created</th>
                        {{-- <th scope="col">Status</th> --}}
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($company as $company)
                  <tr>
                    <th scope="row">{{ $company->id }}</th>
                    <td>{{ $company->company_name }}</td>
                    <td>{{ $company->company_description }}</td>
                    <td>{{ $company->studio}}</td>
                    <td>{{ $company->created_at }}</td>
                    <td>
                      <a href="#" class="btn btn-primary px-3" role="button">
                          Edit
                      </a>
                    </td>
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
