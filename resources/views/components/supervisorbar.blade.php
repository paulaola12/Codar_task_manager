<div class="sidebar">
    <h4 class="text-center py-3 border-bottom">Supervisor Dashboard</h4>
    <a href="{{ route('supervisor_dashbaord') }}" class="active">Dashboard</a>
    <div class="dropdown">
        <a class="dropdown-toggle" href="{{ route('show_all_task') }}" >
            Tasks
        </a>
        {{-- <ul class="dropdown-menu bg-dark"> --}}
            {{-- <li><a class="dropdown-item text-white" href="">All Tasks</a></li>
            <li><a class="dropdown-item text-white" href="#">Awaiting Approval</a></li> --}}
            {{-- <li><a class="dropdown-item text-white" href="#">User Reports</a></li> --}}
        {{-- </ul> 
    </div>
    <div class="dropdown">
        <a class="dropdown-toggle" href="#" id="tasksDropdown" role="button" data-bs-toggle="dropdown">
            Interns
        </a>
        {{-- <ul class="dropdown-menu bg-dark">
            <li><a class="dropdown-item text-white" href="#">View Tasks</a></li>
            <li><a class="dropdown-item text-white" href="#">Add Task</a></li>
            <li><a class="dropdown-item text-white" href="#">Task Reports</a></li>
        </ul> --}}
    </div>
    <a href="#">Reports</a>
    <a href="#">Settings</a>
    <form action="{{ route('approve-task') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger w-100">Logout</button>
    </form>
</div>