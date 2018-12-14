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
                    Setting General
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::model($model, ['route' => 'admin.setting.general.store', 'method' => 'POST']) !!}
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

                                <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
                                    {!! Form::label('unit', 'Unit Koperasi') !!}
                                    {!! Form::text('unit', null, ['id' => 'unit', 'class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
                                    <small class="text-danger">{{ $errors->first('unit') }}</small>
                                </div>

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    {!! Form::label('title', 'Nama Perusahaan') !!}
                                    {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('title') }}</small>
                                </div>

                                <div class="form-group{{ $errors->has('owner') ? ' has-error' : '' }}">
                                    {!! Form::label('owner', 'Nama Pemilik') !!}
                                    {!! Form::text('owner', null, ['id' => 'owner', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('owner') }}</small>
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
