<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles3.css') }}">
</head>

<body>
    <div class="dashboard-container">
        <header class="header">
            <h1>Student Dashboard</h1>
            <div class="auth-buttons">
                {{-- <button class="login-btn">Login</button> --}}
                
                <form action="{{ route('intern.logout') }}" method="POST">
                    @csrf
                    <button class="logout-btn" type="submit">Logout</button>
                </form>
               
            </div>
        </header>

        <section class="profile-section">
            <div class="profile-picture">
                <img src="profile-pic.jpg" alt="Profile Picture" />
            </div>
            <div class="profile-info">
                <h4>
                    @if(Auth::guard('intern')->check())
                 <p>Welcome, {{ Auth::guard('intern')->user()->intern_name }} (Intern Dash Board)</p>
                 <p><strong>Phone Number: {{ Auth::guard('intern')->user()->phone_number }}</strong></p>
                 <p><strong>Studio:</strong>  {{ Auth::guard('intern')->user()->studio }}</p>
                 <p><strong>email:</strong>  {{ Auth::guard('intern')->user()->email }}</p>
                 <p><strong>Batch:</strong>  {{ Auth::guard('intern')->user()->class }}</p>
                 @else
                 <p>Log in To your dashboard</p>
                @endif
                </h4>
               
            </div>
        </section>

        <section class="task-section">
            <h2>Assigned Tasks</h2>
            @foreach ($tasks as $tasks )
            <div class="task-list">
                <div class="task-item">
                    <p><strong>Task: </strong>{{$tasks->task_name}}</p>
                    <p><strong>Due Date: </strong>{{ $tasks->end_date }}</p>
                    <div class="task-status">
                        <label for="status">Update Task Status:</label>
                        <select class="status" data-task-id="{{ $tasks->id }}">
                            <option value="incomplete" {{ $tasks->status == 'incomplete' }}>Incomplete</option>
                            <option value="in-progress" {{ $tasks->status == 'in-progress' }}>In Progress</option>
                            <option value="completed" {{ $tasks->status == 'completed' }}>Completed</option>
                        </select>
                       
                    </div>
                </div>
            </div>
            @endforeach
           
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    
    $('.status').on('change', function () {
        var taskId = $(this).data('task-id');
        var status = $(this).val();
        //   console.log('Selected the right Id', task-id);
        $.ajax({
            url: '{{ route('update_task_status') }}',
            method: 'POST',
            data: {
                 id: taskId,
                status: status,
                _token: '{{ csrf_token() }}'  
            },
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);  
                } else {
                    alert('An error occurred.');
                }
            },
            error: function () {
                alert('An error occurred.');
            }
        });
    });
});
</script>

</body>

