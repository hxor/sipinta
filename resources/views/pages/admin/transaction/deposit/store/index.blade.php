@extends('layouts.admin.app')

@push('styles')
    <!-- Datatables -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Storan Tabungan</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Pages</a>
                </li>
                <li>
                    <a href="#">Tabungan</a>
                </li>
                <li class="active">
                    Storan Tabungan
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-border panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    Datatable
                    @if ($memberdeposit->status == true)
                        <a href="{{ route('admin.transaction.deposit.store.create', $memberdeposit->id) }}" class="btn btn-sm btn-primary btn-custom pull-right waves-effect modal-show" title="Create Resource"><i class="fa fa-plus"></i> Create</a>
                    @endif
                    </h3>
                </div>
                <div class="panel-body">
                    <table id="datatable"
                        class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Storan</th>
                                <th>Tanggal</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-border panel-primary">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td><h5></h5></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $memberdeposit->id }}</td>
                            </tr>
                            <tr>
                                <th>Anggota</th>
                                <td>{{ $memberdeposit->member->name }} - {{ $memberdeposit->member->idnumber }}</td>
                            </tr>
                            <tr>
                                <th>Paket Tabungan</th>
                                <td>{{ $memberdeposit->deposit->title }}</td>
                            </tr>
                            <tr>
                                <th>Storan</th>
                                <td>Rp{{ number_format($memberdeposit->cash,2,',','.') }}</td>
                            </tr>
                            <tr>
                                <th>Total Storan</th>
                                <td>Rp{{ number_format($memberdeposit->store->sum('store'),2,',','.') }}</td>
                            </tr>
                            <tr>
                                <th>Suku Bunga</th>
                                <td>Rp{{ number_format($bunga = $memberdeposit->profit,2,',','.') }}</td>
                            </tr>
                            <tr>
                                <th>Total Tabungan</th>
                                <td>Rp{{ number_format($totaltab = $memberdeposit->cash*$memberdeposit->deposit->period,2,',','.') }}</td>
                            </tr>
                            <tr>
                                <th>Total Tabungan + Bunga</th>
                                <td>Rp{{ number_format($totaltab + $bunga,2,',','.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div> <!-- container -->
@endsection

@section('modal')
    @include('layouts.admin.partials._modal')
@endsection

@push('scripts')
    <!-- Datatables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/ajax-crud.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('table.transaction.deposit.store', $memberdeposit->id) }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'store', name: 'store'},
                    {data: 'date', name: 'date'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>

    <!-- Sweetalert2 -->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
@endpush
