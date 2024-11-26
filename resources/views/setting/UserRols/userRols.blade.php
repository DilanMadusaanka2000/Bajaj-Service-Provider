



<form action="{{ route('get.user.roles') }}" method="POST">
    @csrf <!-- This is necessary for form security in Laravel -->

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Enter user email" required>
    </div>

    <div>
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="" disabled selected>Select a role</option>
            <option value="admin">Admin</option>
            <option value="editor">Editor</option>
            <option value="viewer">Viewer</option>
            <!-- Add more roles as needed -->
        </select>
    </div>

    <div>
        <button type="submit">Get Roles</button>
    </div>
</form>
