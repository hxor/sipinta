<table class="table table-hover">
    <tbody>
        <tr>
            <th>ID</th>
            <td>{{ $model->id }}</td>
        </tr>
        <tr>
            <th>Nama Paket</th>
            <td>{{ $model->title }}</td>
        </tr>
        <tr>
            <th>Setiap % Kali Tagihan ?</th>
            <td>{{ $model->plan }}</td>
        </tr>
        <tr>
            <th>Setiap % Tahun ?</th>
            <td>{{ $model->period }}%</td>
        </tr>
        <tr>
            <th>Suku Bunga</th>
            <td>{{ $model->interest }}%</td>
        </tr>
        <tr>
            <th>Minimal Tabungan</th>
            <td>Rp{{ number_format($model->minimum,2,',','.') }}</td>
        </tr>
    </tbody>
</table>
