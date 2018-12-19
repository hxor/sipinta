<table class="table table-hover">
    <tbody>
        <tr>
            <th>ID</th>
            <td>{{ $model->id }}</td>
        </tr>
        <tr>
            <th>Anggota</th>
            <td>{{ $model->member->name }} - {{ $model->member->idnumber }}</td>
        </tr>
        <tr>
            <th>Paket Pinjaman</th>
            <td>{{ $model->loan->title }}</td>
        </tr>
        <tr>
            <th>Pinjaman</th>
            <td>Rp{{ number_format($model->debt,2,',','.') }}</td>
        </tr>
        <tr>
            <th>Piutang</th>
            <td>Rp{{ number_format($model->credit,2,',','.') }}</td>
        </tr>
        <tr>
            <th>Storan</th>
            <td>Rp{{ number_format($model->payment,2,',','.') }}</td>
        </tr>
        <tr>
            <th>Sisa Hutang</th>
            <td>Rp{{ number_format($model->payment_left,2,',','.') }}</td>
        </tr>
        <tr>
            <th>Status Angsuran</th>
            <td>{{ $model->status == 1 ? 'Belum Lunas' : 'Lunas' }}</td>
        </tr>
    </tbody>
</table>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Jasa</th>
            <th>Kantor</th>
            <th>Sukarela</th>
            <th>Tabungan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Rp{{ number_format($model->cost_service,2,',','.') }}</td>
            <td>Rp{{ number_format($model->cost_office,2,',','.') }}</td>
            <td>Rp{{ number_format($model->cost_gift,2,',','.') }}</td>
            <td>Rp{{ number_format($model->cost_saving,2,',','.') }}</td>
        </tr>
    </tbody>
</table>
