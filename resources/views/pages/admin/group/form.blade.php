<div class="row">
    <div class="col-md-12">
        {!! Form::model($model, [
            'route' => $model->exists ? ['admin.group.update', $model->id] : 'admin.group.store',
            'method' => $model->exists ? 'PUT' : 'POST'
        ]) !!}

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
