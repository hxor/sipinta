<div class="row">
        <div class="col-md-12">
            {!! Form::model($model, [
                'route' => $model->exists ? ['admin.transaction.loan.payment.update', $loan->id, $model->id] : ['admin.transaction.loan.payment.store', $loan->id],
                'method' => $model->exists ? 'PUT' : 'POST'
            ]) !!}
   
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('payment') ? ' has-error' : '' }}">
                        {!! Form::label('payment', 'angsuran') !!}
                        {!! Form::number('payment', $model->exists ? null : $loan->payment, ['id' => 'payment', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Rp']) !!}
                        <small class="text-danger">{{ $errors->first('payment') }}</small>
                    </div>
                </div>
            </div>
    
            {!! Form::close() !!}
        </div>
    </div>
    