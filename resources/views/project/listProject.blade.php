<!-- resources/views/basic_project/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>List of Basic Projects</title>
</head>
<body>
    <div class="container mt-5">
        <h2>List of Basic Projects</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($basicProjects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->category }}</td>
                       <td>
                        <a href="{{ route('basic_project.edit', ['id' => $project->id]) }}" class="btn btn-primary">Edit</a>
                    <button type="button" onclick="deleteProject({{ $project->id }})" class="btn btn-danger">Delete</button>
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
    function deleteProject(projectId) {
        if (confirm('Are you sure you want to delete this user?')) {

            window.location.href = "{{ route('delete.project', ['id' => ':id']) }}".replace(':id', projectId);
        }
    }
</script>
</html>
