<table class="table table-hover">
    <tbody>
        <tr>
            <th>ID</th>
            <td>{{ $model->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $model->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $model->email }}</td>
        </tr>
        <tr>
            <th>Username</th>
            <td>{{ $model->username }}</td>
        </tr>
        <tr>
            <th>Role</th>
            <td>{{ $model->roles->title }}</td>
        </tr>
    </tbody>
</table>

