@extends('layouts.admin.app')

@push('styles')
@endpush

@section('content')
<div class="container">

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Cetak</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Transaksi</a>
                </li>
                <li>
                    <a href="#">Pinjaman</a>
                </li>
                <li class="active">
                    Cetak
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
                    <div class="row">
                        <div class="col-md-12">
                          <table width="100%" border="0">
                            <tbody>
                              <tr>
                                <td width="100" rowspan="3">
                                 <img src="/assets/images/koperasi.png" width="180" height="50" alt=""/></td>
                                <td align="center"><strong>KOPERASI SIMPAN PINJAM</strong></td>
                              </tr>
                              <tr>
                                <td align="center"><strong>ARRTA JAYA</strong></td>
                              </tr>
                              <tr>
                                <td align="center"><strong>Bukti Pencarian Pinjaman</strong></td>
                              </tr>
                            </tbody>
                          </table>
                          <hr>
                          <table width="100%" border="0">
                            <tbody>
                              <tr>
                                <td width="168">No. Kontrak </td>
                                <td width="31">: </td>
                                <td width="512">{{ $model->invoice }}</td>
                                <td width="233">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Nama Anggota </td>
                                <td>: </td>
                                <td>{{ $model->member->name }} </td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Keterangan </td>
                                <td>: </td>
                                <td>Pencairan Pinjaman </td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Tempo </td>
                                <td>: </td>
                                <td>{{ $model->hari }} </td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Kontrak </td>
                                <td>: </td>
                                <td>{{ $model->loan->title }} </td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Setoran </td>
                                <td>:</td>
                                <td>Rp{{ number_format($model->payment,2,',','.') }}</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Pokok Pinjaman</td>
                                <td>: </td>
                                <td>Rp </td>
                                <td align="right">{{ number_format($model->debt,2,',','.') }}</td>
                              </tr>
                              <tr>
                                <td>Pokok + Jasa </td>
                                <td>:</td>
                                <td>Rp</td>
                                <td align="right">{{ number_format(($model->debt+$model->cost_service),2,',','.') }}</td>
                              </tr>
                              <tr>
                                <td>Adm Pinjaman</td>
                                <td>:</td>
                                <td>Rp</td>
                                <td align="right">{{ number_format($model->cost_office,2,',','.') }}</td>
                              </tr>
                              <tr>
                                <td>Adm Sukarela</td>
                                <td>:</td>
                                <td>Rp</td>
                                <td align="right">{{ number_format($model->cost_gift,2,',','.') }}</td>
                              </tr>
                              <tr>
                                <td>Tabungan</td>
                                <td>:</td>
                                <td>Rp</td>
                                <td align="right">{{ number_format($model->cost_saving,2,',','.') }}</td>
                              </tr>
                              
                              <tr>
                                <td><strong>Diterima</strong></td>
                                <td><strong>:</strong></td>
                                <td><strong>Rp </strong></td>
                                <td align="right"><strong>{{ number_format($model->drop,2,',','.') }}</strong></td>
                              </tr>
                            </tbody>
                          </table>

                          <table width="100%" border="0">
                            <tbody>
                              <tr>
                                <td colspan="3" align="center"><strong>Mengetahui</strong></td>
                              </tr>
                              <tr>
                                <td width="330">&nbsp;</td>
                                <td width="330">&nbsp;</td>
                                <td width="330" align="center"><strong>Cirebon, {{ $model->created_at->format('d/m/Y') }}</strong></td>
                              </tr>
                              <tr>
                                <td align="center"><strong>Anggota</strong></td>
                                <td align="center"><strong>Marketing</strong></td>
                                <td align="center"><strong>Teller</strong></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="center"><strong>{{ $model->member->name }}</strong></td>
                                <td align="center"><strong>{{ $model->member->staff->name }}</strong></td>
                                <td align="center"><strong>{{ Auth::user()->name }}</strong></td>
                              </tr>
                            </tbody>
                          </table>
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
