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
            <h4 class="page-title">Pinjam</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Pages</a>
                </li>
                <li>
                    <a href="#">Transaksi</a>
                </li>
                <li class="active">
                    Pinjam
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-border panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    Datatable
                    <a href="{{ route('admin.transaction.loan.create') }}" class="btn btn-sm btn-primary btn-custom pull-right waves-effect modal-show" title="Create Resource"><i class="fa fa-plus"></i> Create</a>
                    <a href="{{ route('admin.bill.loan.index') }}" class="btn btn-sm btn-primary btn-custom pull-right waves-effect" title="Cetak Tagihan"><i class="fa fa-plus"></i> Tagihan</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <table id="datatable"
                        class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Anggota</th>
                                <th>Paket</th>
                                <th>Pinjaman</th>
                                <th>Sisa</th>
                                <th>Lunas ?</th>
                                <th>Stor</th>
                                <th>Cetak</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
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
                ajax: "{{ route('table.transaction.loan') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'invoice', name: 'invoice'},
                    {data: 'member.name', name: 'member.name'},
                    {data: 'loan.title', name: 'loan.title'},
                    {data: 'debt', name: 'debt'},
                    {data: 'payment_left', name: 'payment_left'},
                    {data: 'status', name:'status', "render": function (data) {
                        if(data == 1) {return 'Belum';} else {return 'Lunas';}
                    }},
                    {data: 'stor', name: 'stor'},
                    {data: 'print', name: 'print', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>

    <!-- Sweetalert2 -->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
@endpush
