<div class="sidebar d-flex flex-column">
        <h4 class="text-center py-3 border-bottom">Admin Panel</h4>
        <a href="{{ route('index') }}" class="active">Dashboard</a>
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" id="usersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Company Manager
            </a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="usersDropdown">
                <li><a class="dropdown-item text-white" href="{{ route("company_listing") }}">Company</a></li>
                <li><a class="dropdown-item text-white" href="{{ route('new_companay') }}">Create New Companies</a></li>
                {{-- <li><a class="dropdown-item text-white" href="#">User Reports</a></li> --}}
            </ul>
        </div>
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" id="tasksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Project Manager
            </a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="tasksDropdown">
                <li><a class="dropdown-item text-white" href="{{ route('project_listing') }}">Projects</a></li>
                <li><a class="dropdown-item text-white" href="{{ route('new_project') }}">Create_project</a></li>
                {{-- <li><a class="dropdown-item text-white" href="#">Task Reports</a></li> --}}
            </ul>
        </div>
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" id="tasksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Tasks Manager
            </a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="tasksDropdown">
                <li><a class="dropdown-item text-white" href="{{ route('task_listing') }}">Tasks</a></li>
                <li><a class="dropdown-item text-white" href="{{ route('new_task') }}">Create Task</a></li>
                {{-- <li><a class="dropdown-item text-white" href="#">Task Reports</a></li> --}}
            </ul>
        </div>
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" id="tasksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Intern Manger
            </a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="tasksDropdown">
                <li><a class="dropdown-item text-white" href="{{ route('intern_listing') }}">Intern</a></li>
                <li><a class="dropdown-item text-white" href="{{ route('new_intern') }}">Create New Intern</a></li>
                {{-- <li><a class="dropdown-item text-white" href="#">Task Reports</a></li> --}}
            </ul>
        </div>
        <div class="dropdown">
            <a class="dropdown-toggle" href="#" id="tasksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Supervisor Manger
            </a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="tasksDropdown">
                <li><a class="dropdown-item text-white" href="{{ route('supervisor_listing') }}">Supervisor</a></li>
                <li><a class="dropdown-item text-white" href="{{ route('new_supervisor') }}">Create New Supervisor</a></li>
                {{-- <li><a class="dropdown-item text-white" href="#">Task Reports</a></li> --}}
            </ul>
        </div>
        <a href="#">Reports</a>
        <a href="#">Settings</a>
        <a href="#" class="mt-auto border-top">Logout</a>
    </div>