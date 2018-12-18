<div class="row">
    <div class="col-md-12">
        {!! Form::model($model, [
            'route' => $model->exists ? ['admin.transaction.loan.update', $model->id] : 'admin.transaction.loan.store',
            'method' => $model->exists ? 'PUT' : 'POST'
        ]) !!}

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('invoice') ? ' has-error' : '' }}">
                    {!! Form::label('invoice', 'Nomor Transaksi') !!}
                    {!! Form::text('invoice', null, ['id' => 'invoice', 'class' => 'form-control', 'required' => 'required', 'disabled']) !!}
                    <small class="text-danger">{{ $errors->first('invoice') }}</small>
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
                <div class="form-group{{ $errors->has('loan_id') ? ' has-error' : '' }}">
                    {!! Form::label('loan_id', 'Paket Pinjaman') !!}
                    {!! Form::select('loan_id', $loan, null, ['id' => 'loan_id', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('loan_id') }}</small>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('debt') ? ' has-error' : '' }}">
                    {!! Form::label('debt', 'Jumlah Pinjaman') !!}
                    {!! Form::number('debt', null, ['id' => 'debt', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Rp']) !!}
                    <small class="text-danger">{{ $errors->first('debt') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('day') ? ' has-error' : '' }}">
                    {!! Form::label('day', 'Hari') !!}
                    {!! Form::select('day', $day, null, ['id' => 'day', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('day') }}</small>
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
