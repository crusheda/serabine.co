@extends('layouts.dashboard')

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if(session()->has('message'))
                        <div class="alert alert-secondary text-dark">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        <h5>Penghitungan Metode Mamdani</h5>
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
                            @if(count($data['list']) > 0)
                            @foreach($data['list'] as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['nama'] }}</td>
                                    @foreach($item['hasilkhd'] as $items)
                                        <td>{{ $items }}</td>
                                    @endforeach
                                    @foreach($item['hasiltjb'] as $items)
                                        <td>{{ $items }}</td>
                                    @endforeach
                                    @foreach($item['hasilkds'] as $items)
                                        <td>{{ $items }}</td>
                                    @endforeach
                                    <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#predikat{{ $item['id'] }}">
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
                    </div><br>
                    @if ($data['active_button'])
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between align-items-end flex-wrap">
                                <button style="position:relative" class="btn btn-primary mt-2 mt-xl-0 btn-lg" onclick="window.location.
                                    href='{{ url('/mamdani/simpan') }}'">
                                    <i class="mdi mdi-chart-areaspline mr-3 icon-sm"></i>Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($data['list'] as $item)
<div class="modal fade bd-example-modal-sm" id="predikat{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="exampleModalLongTitle">Hasil Predikat Untuk Karyawan : <br><b>{{ $item['nama'] }}</b></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th >Role ke-</th>
                            <th >Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1
                        @endphp
                        @foreach($item['predikat'] as $key => $items)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $items }}</td>
                        </tr>
                        @if ($i == count($item['predikat']) - 22)
                            @break
                        @endif
                        @php
                            $i++
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <h5 class="modal-title">Nilai Max Untuk Komposisi Aturan :</h5>
                <p>Max Buruk : <b>{{ $item['predikat']['maxrendah'] }}</b></p>
                <p>Max Baik : <b>{{ $item['predikat']['maxtinggi'] }}</b></p>
                <h5 class="modal-title">Penentuan Komposisi Aturan :</h5>
                <p>Z1 : <b>{{ $item['predikat']['z1'] }}</b></p>
                <p>Z2 : <b>{{ $item['predikat']['z2'] }}</b></p>
                <h5 class="modal-title">Penentuan Momen Untuk Setiap Daerah :</h5>
                <p>M1 : <b>{{ $item['predikat']['m1'] }}</b></p>
                <p>M2 : <b>{{ $item['predikat']['m2'] }}</b></p>
                <p>M3 : <b>{{ $item['predikat']['m3'] }}</b></p>
                <h5 class="modal-title">Penentuan Area Untuk Setiap Daerah :</h5>
                <p>A1 : <b>{{ $item['predikat']['a1'] }}</b></p>
                <p>A2 : <b>{{ $item['predikat']['a2'] }}</b></p>
                <p>A3 : <b>{{ $item['predikat']['a3'] }}</b></p>
                <h5 class="modal-title">Penentuan Titik Pusat Dari Daerah Fuzzy :</h5>
                <p>Z-Skenario 1 : <b>{{ $item['predikat']['z'] }}</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
