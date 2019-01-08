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
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">
                    <h4>Invoice</h4>
                </div> -->
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h2 class="text-right"><img src="/assets/images/koperasi.png" alt="velonic" height="70"></h2>
                            
                        </div>
                        <div class="pull-right">
                            <h4>Tagihan Tanggal <br>
                                <strong>{{ $data['info_hari'] }}, {{ $data['info_tanggal'] }}</strong>
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <address>
                                  <strong>{{ $data['info_staff'] }}</strong><br>
                                  Target 100%   : Rp{{ number_format($data['target_total'],2,',','.') }}<br>
                                  Target 70%    : Rp{{ number_format($data['target_minim'],2,',','.') }}<br>
                                  </address>
                            </div>
                            <div class="pull-right">
                                <address>
                                  <strong>Jumlah Anggota: {{ count($data['member']) }}</strong><br>
                                  </address>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <td>Invoice</td>
                                        <td>Nama</td>
                                        <td>Alamat</td>
                                        <td>No</td>
                                        <td>Setoran</td>
                                        <td>Sisa</td>
                                        <td>Keterangan</td>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['member'] as $member)
                                            <tr>
                                                <td>{{ $member->invoice }}</td>
                                                <td>{{ $member->name }}</td>
                                                <td>{{ $member->village }}</td>
                                                <td>{{ $member->storan_ke }}</td>
                                                <td>Rp{{ number_format($member->tagihan,2,',','.') }}</td>
                                                <td>Rp{{ number_format($member->sisa_hutang,2,',','.') }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="hidden-print">
                        <div class="pull-right">
                            <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    


</div> <!-- container -->
@endsection

@push('scripts')
@endpush
