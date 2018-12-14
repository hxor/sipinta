@extends('layouts.admin.app')

@push('styles')
    <style>
        .btn-custom.btn-white { color: #ffffff !important; }
    </style>
@endpush

@section('content')
<div class="container">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Setting</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Pages</a>
                </li>
                <li>
                    <a href="#">Admin</a>
                </li>
                <li class="active">
                    Setting Persentase
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($model, ['route' => 'admin.setting.cost.store', 'method' => 'POST']) !!}
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Settings
                        <button type="submit" class="btn btn-sm btn-white btn-custom pull-right waves-effect text-white" title="Submit">Save</button>
                    </h3>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group{{ $errors->has('cost_target') ? ' has-error' : '' }}">
                                    {!! Form::label('cost_target', 'Persentase Target') !!}
                                    {!! Form::text('cost_target', null, ['id' => 'cost_target', 'class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
                                    <small class="text-danger">{{ $errors->first('cost_target') }}</small>
                                </div>

                                <div class="form-group{{ $errors->has('cost_cash') ? ' has-error' : '' }}">
                                    {!! Form::label('cost_cash', 'Persentase Kas') !!}
                                    {!! Form::text('cost_cash', null, ['id' => 'cost_cash', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('cost_cash') }}</small>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-sm btn-primary btn-custom pull-right waves-effect" title="Submit">Save</button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>


</div> <!-- container -->
@endsection

@push('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.lfm').filemanager('image');
        });
    </script>
@endpush
