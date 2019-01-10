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
                            <table width="100%">
                                <tbody>
                                    <tr>
                                      <td align="center">KOPERASI SIMPAN PINJAM</td>
                                    </tr>
                                    <tr>
                                      <td align="center">ARRTA JAYA</td>
                                    </tr>
                                    <tr>
                                      <td align="center">Bukti Pencarian Pinjaman</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%">
                              <tbody>
                                <tr>
                                  <td>No. Kontrak </td>
                                  <td>: </td>
                                  <td>P-2013123-1 </td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>Nama Anggota </td>
                                  <td>: </td>
                                  <td>Abc </td>
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
                                  <td>Kamis </td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>Kontrak </td>
                                  <td>: </td>
                                  <td>Paket 6 Angsuran </td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>Setoran </td>
                                  <td>:</td>
                                  <td>Rp100000</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td>Pokok Pinjaman</td>
                                  <td>: </td>
                                  <td>Rp </td>
                                  <td>500000 </td>
                                </tr>
                                <tr>
                                  <td>Pokok + Jasa </td>
                                  <td>:</td>
                                  <td>Rp</td>
                                  <td>600000</td>
                                </tr>
                                <tr>
                                  <td>Adm Pinjaman</td>
                                  <td>:</td>
                                  <td>Rp</td>
                                  <td>12500</td>
                                </tr>
                                <tr>
                                  <td>Tabungan</td>
                                  <td>:</td>
                                  <td>Rp</td>
                                  <td>12500</td>
                                </tr>
                                
                                <tr>
                                  <td>Di Terima</td>
                                  <td>:</td>
                                  <td>Rp </td>
                                  <td>475000 </td>
                                </tr>
                              </tbody>
                            </table>
                            <table width="100%">
                              <tbody>
                                <tr>
                                  <td colspan="4">Mengetahui</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>Cirebon, Januari 2019</td>
                                </tr>
                                <tr>
                                  <td>Anggota</td>
                                  <td>Marketing</td>
                                  <td>Teller</td>
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
                                  <td>Abc</td>
                                  <td>Staff</td>
                                  <td>Neng</td>
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
