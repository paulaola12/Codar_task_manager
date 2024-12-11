
{{-- @props(['projects']) --}}
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('index') }}" class="text-nowrap logo-img">
          {{-- <img src="{{ asset('../assets/images/logos/dark-logo.svg') }}" width="180" alt="" /> --}}
          <p style="font-size: 24px;"><b>Task Manager</b></p>
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Admin Menu</span>
          </li>

          <div class="accordion" id="sidebarAccordion">
            <!-- First Dropdown -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false" data-bs-toggle="collapse" data-bs-target="#dropdownButtons" aria-controls="dropdownButtons">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Project Manager</span>
              </a>
              <ul class="collapse list-unstyled bg-primary-subtle" id="dropdownButtons" data-bs-parent="#sidebarAccordion">
                <li>
                  <a class="sidebar-link" href="{{ route('project_listing') }}">Projects</a>
                </li>
                <li>
                  <a class="sidebar-link" href="{{ route('new_project') }}">Create_project</a>
                </li>
              </ul>
            </li>
          
            <!-- Second Dropdown -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false" data-bs-toggle="collapse" data-bs-target="#dropdownForms" aria-controls="dropdownForms">
                <span>
                  <i class="ti ti-forms"></i>
                </span>
                <span class="hide-menu">Task Manager</span>
              </a>
              <ul class="collapse list-unstyled bg-primary-subtle" id="dropdownForms" data-bs-parent="#sidebarAccordion">
                <li>
                  <a class="sidebar-link" href="{{ route('task_listing') }}">Tasks</a>
                </li>
                <li>
                     
                   <a class="sidebar-link" href="{{ route('new_task') }}">Create Task</a>  
                 

                </li>
              </ul>
            </li>
          
            <!-- Third Dropdown -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false" data-bs-toggle="collapse" data-bs-target="#dropdownTables" aria-controls="dropdownTables">
                <span>
                  <i class="ti ti-table"></i>
                </span>
                <span class="hide-menu">Company Manager</span>
              </a>
              <ul class="collapse list-unstyled bg-primary-subtle" id="dropdownTables" data-bs-parent="#sidebarAccordion">
                <li>
                  <a class="sidebar-link" href="{{ route("company_listing") }}">Company</a>
                </li>
                <li>
                  <a class="sidebar-link" href="{{ route('new_companay') }}">Create New Companies</a>
                </li>
              </ul>
            </li>

            <div class="accordion" id="sidebarAccordion">
              <!-- First Dropdown -->
              <li class="sidebar-item">
                <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false" data-bs-toggle="collapse" data-bs-target="#dropdownButtons" aria-controls="dropdownButtons">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Project Manager</span>
                </a>
                <ul class="collapse list-unstyled bg-primary-subtle" id="dropdownButtons" data-bs-parent="#sidebarAccordion">
                  <li>
                    <a class="sidebar-link" href="{{ route('project_listing') }}">Projects</a>
                  </li>
                  <li>
                    <a class="sidebar-link" href="{{ route('new_project') }}">Create_project</a>
                  </li>
                </ul>
              </li>
            
              <!-- Second Dropdown -->
              <li class="sidebar-item">
                <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false" data-bs-toggle="collapse" data-bs-target="#dropdownForms" aria-controls="dropdownForms">
                  <span>
                    <i class="ti ti-forms"></i>
                  </span>
                  <span class="hide-menu">Intern Manager</span>
                </a>
                <ul class="collapse list-unstyled bg-primary-subtle" id="dropdownForms" data-bs-parent="#sidebarAccordion">
                  <li>
                    <a class="sidebar-link" href="{{ route('intern_listing') }}">Intern</a>
                  </li>
                  <li>
                       
                     <a class="sidebar-link" href="{{ route('new_intern') }}">Create New Intern</a>  
                   
  
                  </li>
                </ul>
              </li>
       

              <!-- Fifth Dropdown -->
              <li class="sidebar-item">
                <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false" data-bs-toggle="collapse" data-bs-target="#dropdownsupervisor" aria-controls="dropdownsupervisor">
                  <span>
                    <i class="ti ti-chart"></i>
                  </span>
                  <span class="hide-menu">Supervisor Manager</span>
                </a>
                <ul class="collapse list-unstyled bg-primary-subtle" id="dropdownsupervisor" data-bs-parent="#sidebarAccordion">
                  <li>
                    <a class="sidebar-link" href="{{ route('Supervisor_listing') }}">Supervisor</a>
                  </li>
                  <li>
                    <a class="sidebar-link" href="{{ route('new_supervisor') }}">Create New Supervisor
                  </li>
                </ul>
              </li>
          </div>
          



          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">AUTH</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('login') }}" aria-expanded="false">
              <span>
                <i class="ti ti-login"></i>
              </span>
              <span class="hide-menu">Login</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('register') }}" aria-expanded="false">
              <span>
                <i class="ti ti-user-plus"></i>
              </span>
              <span class="hide-menu">Register</span>
            </a>
          </li>
          {{-- <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">EXTRA</span>
          </li> --}}
          {{-- <li class="sidebar-item">
            <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
              <span>
                <i class="ti ti-mood-happy"></i>
              </span>
              <span class="hide-menu">Icons</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
              <span>
                <i class="ti ti-aperture"></i>
              </span>
              <span class="hide-menu">Sample Page</span>
            </a>
          </li>
        </ul>
        <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
          <div class="d-flex">
            <div class="unlimited-access-title me-3">
              <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
              <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
            </div>
            <div class="unlimited-access-img">
              <img src="../assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
            </div>
          </div>
        </div> --}}
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->
