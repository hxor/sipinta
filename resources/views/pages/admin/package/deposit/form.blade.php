<div class="row">
    <div class="col-md-12">
        {!! Form::model($model, [
            'route' => $model->exists ? ['admin.deposit.update', $model->id] : 'admin.deposit.store',
            'method' => $model->exists ? 'PUT' : 'POST'
        ]) !!}

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Nama Paket') !!}
                    {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('plan') ? ' has-error' : '' }}">
                    {!! Form::label('plan', 'Setiap % Kali ?') !!}
                    {!! Form::number('plan', null, ['id' => 'plan', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'setiap 7 hari dst']) !!}
                    <small class="text-danger">{{ $errors->first('plan') }}</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('period') ? ' has-error' : '' }}">
                    {!! Form::label('period', 'Setiap % Tahun ?') !!}
                    {!! Form::number('period', null, ['id' => 'period', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'setiap 1 tahun dst']) !!}
                    <small class="text-danger">{{ $errors->first('period') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('interest') ? ' has-error' : '' }}">
                    {!! Form::label('interest', 'Suku Bunga') !!}
                    {!! Form::number('interest', null, ['id' => 'interest', 'class' => 'form-control', 'required' => 'required', 'placeholder' => '%']) !!}
                    <small class="text-danger">{{ $errors->first('interest') }}</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('minimum') ? ' has-error' : '' }}">
                    {!! Form::label('minimum', 'Minimal Tabungan') !!}
                    {!! Form::number('minimum', null, ['id' => 'minimum', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Rp']) !!}
                    <small class="text-danger">{{ $errors->first('minimum') }}</small>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
