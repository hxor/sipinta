<div class="row">
        <div class="col-md-12">
            {!! Form::model($model, [
                'route' => $model->exists ? ['admin.deposit.update', $member->id, $model->id] : ['admin.deposit.store', $member->id],
                'method' => $model->exists ? 'PUT' : 'POST'
            ]) !!}

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                        {!! Form::label('type', 'Jenis') !!}
                        {!! Form::select('type', ['in' => 'Simpan', 'out' => 'Tarik'], null, ['id' => 'type', 'class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('type') }}</small>
                    </div>
                </div>
            </div>
   
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('cash') ? ' has-error' : '' }}">
                        {!! Form::label('cash', 'Nominal') !!}
                        {!! Form::number('cash', null, ['id' => 'cash', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Rp']) !!}
                        <small class="text-danger">{{ $errors->first('cash') }}</small>
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
    