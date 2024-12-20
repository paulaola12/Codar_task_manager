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
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">Download Free</a>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header> --}}
      <!--  Header End -->
      {{-- content start --}}
        <div style="margin-top: 100px"  class="container mt-5">
          
          <h2 class="text-center mb-4" style="font-weight: bold; font-family: 'Arial', sans-serif;">New Intern</h2>

              <div class="row justify-content-center">
                <div class="col-10">

                  <form action="{{ route('create_intern') }}" method="POST">

                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fs-4">Intern Name</label>
                        <input type="text" class="form-control bg-body-tertiary bg-secondary-subtle" name="intern_name" placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                      <label for="name" class="form-label fs-4">Email</label>
                      <input type="text" class="form-control bg-body-tertiary bg-secondary-subtle" name="email" placeholder="Enter your name">
                  </div>

                  <div class="mb-3">
                    <label for="name" class="form-label fs-4">Phone Number</label>
                    <input type="text" class="form-control bg-body-tertiary bg-secondary-subtle" name="phone_number" placeholder="Enter your name">
                </div>

                <div class="mb-3">
                  <label for="name" class="form-label fs-4">Home Address</label>
                  <input type="text" class="form-control bg-body-tertiary bg-secondary-subtle" name="home_address" placeholder="Enter your name">
              </div>

              <div class="mb-3">
                <label for="name" class="form-label fs-4">Class</label>
                <input type="text" class="form-control bg-body-tertiary bg-secondary-subtle" name="class" placeholder="Enter your name">
            </div>


                  <div class="mb-3">
                    <label for="category" class="form-label fs-4">Studio</label>
                    <select class="form-select  bg-secondary-subtle" name="studio">
                        <option value="Gbagada">Gbagada</option>
                        <option value="Yaba">Yaba</option>
                        <option value="Lekki">Lekki</option>
                        <option value="Ikeja">Ikeja</option>
                    </select>
                </div>

                <div class="mb-3">
                  <label for="name" class="form-label fs-4">Password</label>
                  <input type="text" class="form-control bg-body-tertiary bg-secondary-subtle" name="password" placeholder="Enter your name">
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













