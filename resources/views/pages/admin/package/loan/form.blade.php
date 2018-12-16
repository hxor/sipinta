<div class="row">
    <div class="col-md-12">
        {!! Form::model($model, [
            'route' => $model->exists ? ['admin.loan.update', $model->id] : 'admin.loan.store',
            'method' => $model->exists ? 'PUT' : 'POST'
        ]) !!}

        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Nama Paket') !!}
                    {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('installment') ? ' has-error' : '' }}">
                    {!! Form::label('installment', 'Kali Cicilan') !!}
                    {!! Form::number('installment', null, ['id' => 'installment', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('installment') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('cost_service') ? ' has-error' : '' }}">
                    {!! Form::label('cost_service', 'Upah Jasa') !!}
                    {!! Form::number('cost_service', null, ['id' => 'cost_service', 'class' => 'form-control', 'required' => 'required', 'placeholder' => '%']) !!}
                    <small class="text-danger">{{ $errors->first('cost_service') }}</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('cost_office') ? ' has-error' : '' }}">
                    {!! Form::label('cost_office', 'Potongan Kantor') !!}
                    {!! Form::number('cost_office', null, ['id' => 'cost_office', 'class' => 'form-control', 'required' => 'required', 'placeholder' => '%']) !!}
                    <small class="text-danger">{{ $errors->first('cost_office') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('cost_gift') ? ' has-error' : '' }}">
                    {!! Form::label('cost_gift', 'Potongan Sukarela') !!}
                    {!! Form::number('cost_gift', null, ['id' => 'cost_gift', 'class' => 'form-control', 'required' => 'required', 'placeholder' => '%']) !!}
                    <small class="text-danger">{{ $errors->first('cost_gift') }}</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('cost_saving') ? ' has-error' : '' }}">
                    {!! Form::label('cost_saving', 'Potongan Tabungan') !!}
                    {!! Form::number('cost_saving', null, ['id' => 'cost_saving', 'class' => 'form-control', 'required' => 'required', 'placeholder' => '%']) !!}
                    <small class="text-danger">{{ $errors->first('cost_saving') }}</small>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
