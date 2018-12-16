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
            <th>Desa</th>
            <td>{{ $model->village }}</td>
        </tr>
        <tr>
            <th>Kecamatan</th>
            <td>{{ $model->subdistrict }}</td>
        </tr>
        <tr>
            <th>Provinsi</th>
            <td>{{ $model->province }}</td>
        </tr>
        <tr>
            <th>Kode Pos</th>
            <td>{{ $model->zipcode }}</td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td>{{ $model->phone }}</td>
        </tr>
        <tr>
            <th>Anggota Dari</th>
            <td>{{ $model->staff->name }}</td>
        </tr>
        <tr>
            <th>Aktif ?</th>
            <td>{{ $model->status ? 'Ya' : 'Tidak' }}</td>
        </tr>
    </tbody>
</table>
