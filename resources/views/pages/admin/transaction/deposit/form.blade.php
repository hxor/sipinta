<div class="row">
    <div class="col-md-12">
        {!! Form::model($model, [
            'route' => $model->exists ? ['admin.transaction.deposit.update', $model->id] : 'admin.transaction.deposit.store',
            'method' => $model->exists ? 'PUT' : 'POST'
        ]) !!}

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('account') ? ' has-error' : '' }}">
                    {!! Form::label('account', 'Rekening') !!}
                    {!! Form::text('account', null, ['id' => 'account', 'class' => 'form-control', 'required' => 'required', $model->exists ? 'readonly' : '']) !!}
                    <small class="text-danger">{{ $errors->first('account') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('member_id') ? ' has-error' : '' }}">
                    {!! Form::label('member_id', 'Anggota') !!}
                    <select name="member_id" id="member" required multiple{{$model->exists ? ' disabled' : ''}}>
                        @if (!empty($model->member))
                        <option value="{{ $model->member->id }}" selected>{{ $model->member->name }} - {{ $model->member->idnumber }}</option>
                        @endif
                    </select>
                    <small class="text-danger">{{ $errors->first('member_id') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('deposit_id') ? ' has-error' : '' }}">
                    {!! Form::label('deposit_id', 'Paket Tabungan') !!}
                    {!! Form::select('deposit_id', $deposit, null, ['id' => 'deposit_id', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('deposit_id') }}</small>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('cash') ? ' has-error' : '' }}">
                    {!! Form::label('cash', 'Jumlah Storan') !!}
                    {!! Form::number('cash', null, ['id' => 'cash', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Rp']) !!}
                    <small class="text-danger">{{ $errors->first('cash') }}</small>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>

    <script>
        $('#member').select2({
                placeholder: 'Select an item',
                ajax: {
                    url: '/service/auto/member',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results:  $.map(data, function (item) {
                                return {
                                    text: item.name + ' - ' + item.idnumber,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
    </script>
</div>
