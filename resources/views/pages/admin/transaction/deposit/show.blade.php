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
            <th>Paket Tabungan</th>
            <td>{{ $model->deposit->title }}</td>
        </tr>
        <tr>
            <th>Storan</th>
            <td>Rp{{ number_format($model->cash,2,',','.') }}</td>
        </tr>
        <tr>
            <th>Total Storan</th>
            <td>Rp{{ number_format($model->store->sum('store'),2,',','.') }}</td>
        </tr>
        <tr>
            <th>Suku Bunga</th>
            <td>Rp{{ number_format($bunga = $model->profit,2,',','.') }}</td>
        </tr>
        <tr>
            <th>Total Tabungan</th>
            <td>Rp{{ number_format($totaltab = $model->cash*$model->deposit->period,2,',','.') }}</td>
        </tr>
        <tr>
            <th>Total Tabungan + Bunga</th>
            <td>Rp{{ number_format($totaltab + $bunga,2,',','.') }}</td>
        </tr>
        <tr>
            <th>Status Tabungan</th>
            <td>{{ $model->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
        </tr>
    </tbody>
</table>
