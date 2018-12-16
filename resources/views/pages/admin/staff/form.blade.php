<div class="row">
    <div class="col-md-12">
        {!! Form::model($model, [
            'route' => $model->exists ? ['admin.staff.update', $model->id] : 'admin.staff.store',
            'method' => $model->exists ? 'PUT' : 'POST'
        ]) !!}

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('idnumber') ? ' has-error' : '' }}">
                    {!! Form::label('idnumber', 'NIK') !!}
                    {!! Form::text('idnumber', null, ['id' => 'idnumber', 'class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
                    <small class="text-danger">{{ $errors->first('idnumber') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'Nama') !!}
                    {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                    {!! Form::label('gender', 'Jenis Kelamin') !!}
                    {!! Form::select('gender', ['male' => 'Laki-laki', 'female' => 'Perempuan'], null, ['id' => 'gender', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('gender') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    {!! Form::label('address', 'Alamat') !!}
                    {!! Form::textarea('address', null, ['id' => 'address', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('address') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    {!! Form::label('phone', 'Telepon') !!}
                    {!! Form::text('phone', null, ['id' => 'phone', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
                    {!! Form::label('group_id', 'Group') !!}
                    {!! Form::select('group_id', $group, null, ['id' => 'group_id', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('group_id') }}</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('is_leader') ? ' has-error' : '' }}">
                    {!! Form::label('is_leader', 'Ketua Group ?') !!}
                    {!! Form::select('is_leader', [true => 'Ya', false => 'Tidak'], null, ['id' => 'is_leader', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('is_leader') }}</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    {!! Form::label('status', 'Aktif ?') !!}
                    {!! Form::select('status', [true => 'Ya', false => 'Tidak'], null, ['id' => 'status', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('status') }}</small>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
