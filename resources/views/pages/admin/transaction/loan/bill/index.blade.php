@extends('layouts.admin.app')

@push('styles')
@endpush

@section('content')
<div class="container">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Tagihan</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Transaksi</a>
                </li>
                <li>
                    <a href="#">Pinjaman</a>
                </li>
                <li class="active">
                    Tagihan
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open(['route' => 'admin.bill.loan.result', 'method' => 'GET']) !!}
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Cari Tagihan Staff
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="">
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <div class="form-group{{ $errors->has('staff_id') ? ' has-error' : '' }}">
                                    {!! Form::label('staff_id', 'Anggota') !!}
                                    {!! Form::select('staff_id', $staff, null, ['id' => 'staff_id', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('staff_id') }}</small>
                                </div>

                                <div class="form-group{{ $errors->has('day') ? ' has-error' : '' }}">
                                    {!! Form::label('day', 'Hari') !!}
                                    {!! Form::select('day', $day, null, ['id' => 'day', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('day') }}</small>
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
@endpush
