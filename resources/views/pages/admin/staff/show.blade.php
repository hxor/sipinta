<table class="table table-hover">
    <tbody>
        <tr>
            <th>ID</th>
            <td>{{ $model->id }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ $model->idnumber }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $model->name }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $model->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $model->address }}</td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td>{{ $model->phone }}</td>
        </tr>
        <tr>
            <th>Group</th>
            <td>{{ $model->group->title }}</td>
        </tr>
        <tr>
            <th>Ketua Group ?</th>
            <td>{{ $model->is_leader ? 'Ya' : 'Tidak' }}</td>
        </tr>
    </tbody>
</table>
