<div class="sidebar d-flex flex-column">
    <h4 class="text-center py-3 border-bottom">Intern Dashboard</h4>
    <a href="{{ route('intern.dashboard') }}" class="active">Dashboard</a>
    <a href="{{ route('intern.datapage') }}" class="active">Profile</a>
   
   
    <a href="#">Reports</a>
    <a href="#">Settings</a>
    <form action="{{ route('intern.logout') }}" method="POST" class="mt-auto border-top">
        @csrf
        <button type="submit" class="btn btn-danger w-100 mt-3">Logout</button>
    </form>
</div>