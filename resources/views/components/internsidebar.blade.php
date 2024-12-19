<div class="sidebar d-flex flex-column">
    <h4 class="text-center py-3 border-bottom">Intern Dashboard</h4>
    <a href="" class="active">Dashboard</a>
    <a href="{{ route('intern.datapage') }}" class="active">Profile</a>
    <div class="dropdown">
        <a class="dropdown-toggle" href="#" id="usersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Users
        </a>
        <ul class="dropdown-menu bg-dark" aria-labelledby="usersDropdown">
            <li><a class="dropdown-item text-white" href="#">View All Users</a></li>
            <li><a class="dropdown-item text-white" href="#">Add User</a></li>
            <li><a class="dropdown-item text-white" href="#">User Reports</a></li>
        </ul>
    </div>
    <div class="dropdown">
        <a class="dropdown-toggle" href="#" id="tasksDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tasks
        </a>
        <ul class="dropdown-menu bg-dark" aria-labelledby="tasksDropdown">
            <li><a class="dropdown-item text-white" href="#">View Tasks</a></li>
            <li><a class="dropdown-item text-white" href="#">Add Task</a></li>
            <li><a class="dropdown-item text-white" href="#">Task Reports</a></li>
        </ul>
    </div>
    <a href="#">Reports</a>
    <a href="#">Settings</a>
    <form action="{{ route('intern.logout') }}" method="POST" class="mt-auto border-top">
        @csrf
        <button type="submit" class="btn btn-danger w-100 mt-3">Logout</button>
    </form>
</div>