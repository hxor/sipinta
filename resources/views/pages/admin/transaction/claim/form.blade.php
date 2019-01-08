<div class="row">
    <div class="col-md-12">
        {!! Form::model($model, [
            'route' => $model->exists ? ['admin.transaction.claim.update', $model->id] : 'admin.transaction.claim.store',
            'method' => $model->exists ? 'PUT' : 'POST'
        ]) !!}

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    {!! Form::label('type', 'Jenis Kasbon') !!}
                    {!! Form::select('type', ['transport' => 'Transport', 'other' => 'Lain-lain'] ,null, ['id' => 'type', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('type') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('staff_id') ? ' has-error' : '' }}">
                    {!! Form::label('staff_id', 'Staff') !!}
                    {!! Form::select('staff_id', $staff, null, ['id' => 'staff_id', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('staff_id') }}</small>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('cash') ? ' has-error' : '' }}">
                    {!! Form::label('cash', 'Jumlah Pinjaman') !!}
                    {!! Form::number('cash', null, ['id' => 'cash', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Rp']) !!}
                    <small class="text-danger">{{ $errors->first('cash') }}</small>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
