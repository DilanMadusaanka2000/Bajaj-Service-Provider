<!-- resources/views/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <h5 class="card-title text-center">{{ isset($task) ? 'Edit User' : 'Register' }}</h5>
                <form method="POST" action="{{ route('user.register') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ isset($task) ? $task->id : '' }}"> <!-- Hidden input for ID -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ isset($task) ? $task->name : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ isset($task) ? $task->email : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <!-- Added Status Dropdown -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="admin" {{ isset($task) && $task->status == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="subadmin" {{ isset($task) && $task->status == 'subadmin' ? 'selected' : '' }}>Subadmin</option>
                            <option value="manager" {{ isset($task) && $task->status == 'manager' ? 'selected' : '' }}>Manager</option>
                            <option value="user" {{ isset($task) && $task->status == 'user' ? 'selected' : '' }}>User</option>
                            <option value="guest" {{ isset($task) && $task->status == 'guest' ? 'selected' : '' }}>Guest</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ isset($task) ? 'Update' : 'Register' }}</button>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}">Already have an account? Login here</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
