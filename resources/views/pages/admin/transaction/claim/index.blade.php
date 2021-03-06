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
            <h4 class="page-title">Kasbon</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Pages</a>
                </li>
                <li>
                    <a href="#">Transaksi</a>
                </li>
                <li class="active">
                    Kasbon
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
                    <a href="{{ route('admin.transaction.claim.create') }}" class="btn btn-sm btn-primary btn-custom pull-right waves-effect modal-show" title="Create Resource"><i class="fa fa-plus"></i> Create</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <table id="datatable"
                        class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Staff</th>
                                <th>Jenis</th>
                                <th>Nominal</th>
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
                ajax: "{{ route('table.transaction.claim') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'staff.name', name: 'staff.name'},
                    {data: 'type', name: 'type'},
                    {data: 'cash', name: 'cash'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>

    <!-- Sweetalert2 -->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
@endpush
