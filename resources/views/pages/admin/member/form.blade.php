<div class="row">
    <div class="col-md-12">
        {!! Form::model($model, [
            'route' => $model->exists ? ['admin.member.update', $model->id] : 'admin.member.store',
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
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('village') ? ' has-error' : '' }}">
                    {!! Form::label('village', 'Desa/Kelurahan') !!}
                    {!! Form::text('village', null, ['id' => 'village', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('village') }}</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('subdistrict') ? ' has-error' : '' }}">
                    {!! Form::label('subdistrict', 'Kecamatan') !!}
                    {!! Form::text('subdistrict', null, ['id' => 'subdistrict', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('subdistrict') }}</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                    {!! Form::label('city', 'Kab/Kota') !!}
                    {!! Form::text('city', null, ['id' => 'city', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('city') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                    {!! Form::label('province', 'Provinsi') !!}
                    {!! Form::text('province', null, ['id' => 'province', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('province') }}</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                    {!! Form::label('zipcode', 'Kode Pos') !!}
                    {!! Form::text('zipcode', null, ['id' => 'zipcode', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('zipcode') }}</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    {!! Form::label('phone', 'Telepon') !!}
                    {!! Form::text('phone', null, ['id' => 'phone', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('staff_id') ? ' has-error' : '' }}">
                    {!! Form::label('staff_id', 'Anggota Dari ?') !!}
                    {!! Form::select('staff_id', $staff, null, ['id' => 'staff_id', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('staff_id') }}</small>
                </div>
            </div>
            <div class="col-md-6">
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
