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
            <th>Kali Cicilan</th>
            <td>{{ $model->installment }}</td>
        </tr>
        <tr>
            <th>Upah Jasa</th>
            <td>{{ $model->cost_service }}%</td>
        </tr>
        <tr>
            <th>Potongan Kantor</th>
            <td>{{ $model->cost_office }}%</td>
        </tr>
        <tr>
            <th>Potongan Sukarela</th>
            <td>{{ $model->cost_gift }}%</td>
        </tr>
        <tr>
            <th>Potongan Tabungan</th>
            <td>{{ $model->cost_saving }}%</td>
        </tr>
    </tbody>
</table>
