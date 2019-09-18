@extends('layouts.dashboard')

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="col-md-12">
        <div class="row">

        <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if(session()->has('message'))
                        <div class="alert alert-secondary text-dark">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        <form class="form-inline pull-left" action="{{ route('hasil') }}" method="GET">
                                <div class="form-group">
                                    <select class="form-control mb-2" name="bulan" style="color:black">
                                        <option disabled selected>Filter Bulan</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control mx-sm-3 mb-2" name="tahun" style="color:black">
                                        <option disabled selected>Filter Tahun</option>
                                        <option value="2019">2019</option>
                                    </select>
                                </div>
                                <button class="btn btn-success mb-2">REFRESH</button>
                            </form>
                        <h5 class="pull-right">History Bonus Karyawan</h5>
                        <table class="table table-bordered" id="tabelhitung">
                            <thead>
                                <tr class="bg-primary" align="center">
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Nama</th>
                                    <th rowspan="2">KHD_kurang</th>
                                    <th rowspan="2">KHD_cukup</th>
                                    <th rowspan="2">KHD_baik</th>
                                    <th rowspan="2">TJB_rendah</th>
                                    <th rowspan="2">TJB_sedang</th>
                                    <th rowspan="2">TJB_tinggi</th>
                                    <th rowspan="2">KDS_kurang</th>
                                    <th rowspan="2">KDS_cukup</th>
                                    <th rowspan="2">KDS_baik</th>
                                    <th rowspan="2">Predikat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($list['show']) > 0)
                                @foreach($list['show'] as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->khdkurang }}</td>
                                        <td>{{ $item->khdcukup }}</td>
                                        <td>{{ $item->khdbaik }}</td>
                                        <td>{{ $item->tjbrendah }}</td>
                                        <td>{{ $item->tjbsedang }}</td>
                                        <td>{{ $item->tjbtinggi }}</td>
                                        <td>{{ $item->kdskurang }}</td>
                                        <td>{{ $item->kdscukup }}</td>
                                        <td>{{ $item->kdsbaik }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#predikat{{ $item->id }}">
                                                Tampil
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td>Tidak Ada Data</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($list['show'] as $item)
<div class="modal fade bd-example-modal-sm" id="predikat{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLongTitle">Hasil Predikat Untuk Karyawan : <br><b>{{ $item->nama }}</b></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <h5 class="modal-title">Nilai Max Untuk Komposisi Aturan :</h5>
                    <p>Max Buruk 1 : <b>{{ $item->maxrendah }}</b></p>
                    <p>Max Baik 1 : <b>{{ $item->maxtinggi }}</b></p>
                    <h5 class="modal-title">Penentuan Komposisi Aturan :</h5>
                    <p>Z1_1 : <b>{{ $item->z1 }}</b></p>
                    <p>Z2_1 : <b>{{ $item->z2 }}</b></p>
                    <h5 class="modal-title">Penentuan Momen Untuk Setiap Daerah :</h5>
                    <p>M1_1 : <b>{{ $item->m1 }}</b></p>
                    <p>M2_1 : <b>{{ $item->m2 }}</b></p>
                    <p>M3_1 : <b>{{ $item->m3 }}</b></p>
                    <h5 class="modal-title">Penentuan Area Untuk Setiap Daerah :</h5>
                    <p>A1_1 : <b>{{ $item->a1 }}</b></p>
                    <p>A2_1 : <b>{{ $item->a2 }}</b></p>
                    <p>A3_1 : <b>{{ $item->a3 }}</b></p>
                    <h5 class="modal-title">Penentuan Titik Pusat Dari Daerah Fuzzy :</h5>
                    <p>Z-Skenario 1 : <b>{{ $item->z }}</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
