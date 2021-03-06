<div class="row">
        <div class="col-md-12">
            {!! Form::model($model, [
                'route' => $model->exists ? ['admin.transaction.loan.payment.update', $loan->id, $model->id] : ['admin.transaction.loan.payment.store', $loan->id],
                'method' => $model->exists ? 'PUT' : 'POST'
            ]) !!}
   
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('payment') ? ' has-error' : '' }}">
                        {!! Form::label('payment', 'Storan') !!}
                        {!! Form::number('payment', $model->exists ? null : $loan->payment, ['id' => 'payment', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Rp']) !!}
                        <small class="text-danger">{{ $errors->first('payment') }}</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                        {!! Form::label('date', 'Tanggal') !!}
                        <div class="input-group">
                            {!! Form::text('date', null, ['class' => 'form-control date-picker', 'required' => 'required ', 'placeholder'=>"yyyy-mm-dd"]) !!}
                            <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                        </div>
                        <small class="text-danger">{{ $errors->first('date') }}</small>
                    </div>
                </div>
            </div>
    
            {!! Form::close() !!}
        </div>

        <script>
            jQuery(document).ready(function() {
                jQuery('.date-picker').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose: true,
                    todayHighlight: true
                });
            });
        </script>
    </div>
    