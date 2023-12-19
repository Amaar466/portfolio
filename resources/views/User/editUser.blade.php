
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User Form</title>
</head>
<body>
    <div class="container mt-5">
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        <h2>Edit User List</h2>
        {{ $errors }}
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                {{-- <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}" required>
                </div> --}}

                <div class="col-md-6 mb-3">
                    <label for="skills" class="form-label">Skills</label>
                    <input type="text" class="form-control" id="skills" name="skills" value="{{ $user->skills }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="role" class="form-label">Role</label>
                    <input type="text" class="form-control" id="role" name="role" value="{{ $user->role }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="is_staff" class="form-label">Is Staff</label>
                    <input type="checkbox" class="form-check-input" id="is_staff" name="is_staff" value="{{ $user->is_staff }}" value="1">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="is_active" class="form-label">Is Active</label>
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="{{ $user->is_active }}" value="1">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="date_joined" class="form-label">Date Joined</label>
                    <input type="text" class="form-control" id="date_joined" name="date_joined" value="{{ $user->date_joined }}" required>
                    <!-- You may use a date picker library for date input -->
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phoneNo" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNo" name="phoneNo" value="{{ $user->phoneNo }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="{{ $user->gender }}" required >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="dateOfBirth" class="form-label">Date of Birth</label>
                    <input type="text" class="form-control" id="dateOfBirth" value="{{ $user->dateOfBirth }}" name="dateOfBirth">
                    <!-- You may use a date picker library for date input -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="profilePhoto" class="form-label">Profile Photo</label>
                    <input type="file" class="form-control" id="profilePhoto" name="profilePhoto" value="{{ $user->profilePhoto }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $user->facebook }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="is_superuser" class="form-label">Is Superuser</label>
                    <input type="checkbox" class="form-check-input" id="is_superuser" name="is_superuser" value="{{ $user->is_superuser }}" value="1">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="github" class="form-label">GitHub</label>
                    <input type="text" class="form-control" id="github" name="github" value="{{ $user->github }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $user->instagram }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="linkedin" class="form-label">LinkedIn</label>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ $user->linkedin }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="twitter" class="form-label">Twitter</label>
                    <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $user->twitter }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea class="form-control" id="bio" name="bio" rows="3" value="{{ $user->bio }}"></textarea>
                </div>
            </div>

            <div class="row">

                {{-- <div class="col-md-6 mb-3">
                    <label for="skills" class="form-label">Skills</label>
                    <input type="text" class="form-control" id="skills" name="skills">
                </div> --}}
            </div>

            <!-- Add more rows with col-6 for other fields -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>



