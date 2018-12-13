@extends('layouts.admin.app')

@push('styles')
@endpush

@section('content')
<div class="wraper container">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Profile</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Admin</a>
                </li>
                <li>
                    <a href="#">Pages</a>
                </li>
                <li class="active">
                    Profile
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-lg-3">
            <div class="profile-detail card-box">
                <div>
                    <img src="{{ asset('assets/images/users/avatar-1.png') }}" class="img-circle" alt="profile-image">

                    <hr>

                    <div class="text-left">
                        <table>
                            <tr class="text-muted font-13">
                                <td><strong>Name</strong></td>
                                <td><strong>:</strong></td>
                                <td>{{ $model->name }}</td>
                            </tr>
                            <tr class="text-muted font-13">
                                <td><strong>Email</strong></td>
                                <td><strong>:</strong></td>
                                <td>{{ $model->email }}</td>
                            </tr>
                            <tr class="text-muted font-13">
                                <td><strong>Role</strong></td>
                                <td><strong>:</strong></td>
                                <td>{{ $model->roles->title }}</td>
                            </tr>
                            <tr class="text-muted font-13">
                                <td><strong>Username</strong></td>
                                <td><strong>:</strong></td>
                                <td>{{ $model->username }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>


        <div class="col-lg-9 col-md-8">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Change Profile</h3>
                </div>
                <div class="panel-body">
                    {!! Form::model($model, ['route' => 'admin.profile.update', 'method' => 'PUT']) !!}
                    <div class="col-md-12">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Full Name') !!}
                            {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Email address') !!}
                            {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            {!! Form::label('username', 'Username') !!}
                            {!! Form::text('username', null, ['id' => 'username', 'class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('username') }}</small>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control']) !!}
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        </div>

                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-white waves-effect waves-light">
                                Cancel
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>



</div> <!-- container -->
@endsection

@push('scripts')
@endpush
