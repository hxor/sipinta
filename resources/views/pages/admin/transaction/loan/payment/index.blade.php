@extends('layouts.admin.app')

@push('styles')
    <!-- Datatables -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="container">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Storan Pinjaman</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Pages</a>
                </li>
                <li>
                    <a href="#">Pinjaman</a>
                </li>
                <li class="active">
                    Storan Pinjaman
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
                    @if ($memberloan->status == true)
                        <a href="{{ route('admin.transaction.loan.payment.create', $memberloan->id) }}" class="btn btn-sm btn-primary btn-custom pull-right waves-effect modal-show" title="Create Resource"><i class="fa fa-plus"></i> Create</a>
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
                                <th>Angsuran</th>
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
                                <td>{{ $memberloan->id }}</td>
                            </tr>
                            <tr>
                                <th>Anggota</th>
                                <td>{{ $memberloan->member->name }} - {{ $memberloan->member->idnumber }}</td>
                            </tr>
                            <tr>
                                <th>Paket Pinjaman</th>
                                <td>{{ $memberloan->loan->title }}</td>
                            </tr>
                            <tr>
                                <th>Pinjaman</th>
                                <td>Rp{{ number_format($memberloan->debt,2,',','.') }}</td>
                            </tr>
                            <tr>
                                <th>Piutang</th>
                                <td>Rp{{ number_format($memberloan->credit,2,',','.') }}</td>
                            </tr>
                            <tr>
                                <th>Storan</th>
                                <td>Rp{{ number_format($memberloan->payment,2,',','.') }}</td>
                            </tr>
                            <tr>
                                <th>Sisa Hutang</th>
                                <td>Rp{{ number_format($memberloan->payment_left,2,',','.') }}</td>
                            </tr>
                            <tr>
                                <th>Status Angsuran</th>
                                <td>{{ $memberloan->status == 1 ? 'Belum Lunas' : 'Lunas' }}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Jasa</th>
                                <th>Kantor</th>
                                <th>Sukarela</th>
                                <th>Tabungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Rp{{ number_format($memberloan->cost_service,2,',','.') }}</td>
                                <td>Rp{{ number_format($memberloan->cost_office,2,',','.') }}</td>
                                <td>Rp{{ number_format($memberloan->cost_gift,2,',','.') }}</td>
                                <td>Rp{{ number_format($memberloan->cost_saving,2,',','.') }}</td>
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
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/ajax-crud.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('table.transaction.loan.payment', $memberloan->id) }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'payment', name: 'payment'},
                    {data: 'created_at', name: 'created_at', "render": function (data) {
                        d = data.split(' ')[0];
                        return d;
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>

    <!-- Sweetalert2 -->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
@endpush
