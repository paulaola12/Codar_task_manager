<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles3.css') }}">
</head>

<body>
    <div class="dashboard-container">
        <header class="header">
            <h1>Supervisor Dashboard</h1>
            <div class="auth-buttons">
                {{-- <button class="login-btn">Login</button> --}}
                
                <form action="{{ route('supervisor.logout') }}" method="POST">
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
                    @if(Auth::guard('supervisor')->check())
                 <p>Welcome, {{ Auth::guard('supervisor')->user()->supervisor_name }} (Supervisor DashBoard)</p>
                 <p><strong>Phone Number: {{ Auth::guard('supervisor')->user()->phone_number }}</strong></p>
                 <p><strong>Studio:</strong>  {{ Auth::guard('supervisor')->user()->studio }}</p>
                 <p><strong>email:</strong>  {{ Auth::guard('supervisor')->user()->email }}</p>
                 <p><strong>Batch:</strong>  {{ Auth::guard('supervisor')->user()->class }}</p>
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
                    <p><strong>Task Priority: </strong>{{ $tasks->priority }}</p>
                    <p><strong>Due Date: </strong>{{ $tasks->end_date }}</p>
                    <p><strong>Intern Name: </strong>{{ $tasks->intern }}</p>
                    <p><strong>Intern Work Status: </strong>{{ $tasks->status }}</p>
                </div>
            </div>
            @endforeach
           
        </section>
    </div>

</body>
