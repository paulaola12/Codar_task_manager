<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <h1>Supervisor Registert</h1>

    <form action="{{ route('create_supervisor') }}" method="POST">
      @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="supervisor_name" id="name" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
          <label for="name">Phone Number:</label>
          <input type="text" name="phone_number" id="name" required>
      </div>

      <div>
        <label for="name">Address:</label>
        <input type="text" name="home_address" id="name" required>
    </div>

    <div>
        <label for="name">Studio:</label>
        <input type="text" name="studio" id="name" required>
    </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>

</body>
</html>
