<!-- resources/views/user/listAllUsers.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>List All Users</title>
</head>
<body>
    <div class="container mt-5">
        <h2>List of Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }} </td>
                        <td>{{ $user->email }}</td>
                       <td>
                        <a href="{{ route('edit.user', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" onclick="deleteUser({{ $user->id }})">Delete</button>
                       </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Add other scripts if needed -->
</body>
<script>
    function deleteUser(userId) {
        if (confirm('Are you sure you want to delete this user?')) {

            window.location.href = "{{ route('delete.user', ['id' => ':id']) }}".replace(':id', userId);
        }
    }
</script>
</html>
