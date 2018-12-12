@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Home</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Admin</a>
                </li>
                <li>
                    <a href="#">Pages</a>
                </li>
                <li class="active">
                    Home
                </li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Dashboard</h3>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>
                        Selamat Datang di Halaman Dashboard.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div> <!-- container -->

@endsection
