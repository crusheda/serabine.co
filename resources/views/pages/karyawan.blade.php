@extends('layouts.dashboard')

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title pull-left">Tabel Karyawan</h4>
                <a class="btn btn-info pull-right text-white" onclick="window.location.
                href='{{ route('karyawan.create') }}'">Tambah Karyawan</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                @if(session()->has('message'))
                    <div class="alert alert-secondary text-dark">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <table class="table table-striped table-bordered" id="tabelkaryawan">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Telepon</th>
                            <th>Kehadiran</th>
                            <th>Tanggungjawab</th>
                            <th>Kedisiplinan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($list) > 0)
                            @foreach($list['show'] as $list)
                                <tr>
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->nama }}</td>
                                    <td>{{ $list->posisi }}</td>
                                    <td>{{ $list->telepon }}</td>
                                    <td>{{ $list->kehadiran }}</td>
                                    <td>{{ $list->tanggungjawab }}</td>
                                    <td>{{ $list->kedisiplinan }}</td>
                                    <td>
                                        <center>
                                            <button class="btn btn-warning" onclick="window.location.
                                                href='{{ route('karyawan.edit', $list->id) }}'">Ubah
                                            </button>
                                        </center>
                                        <hr>
                                        <center>
                                            <form action="{{ route('karyawan.destroy', $list->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-primary">Hapus</button>
                                            </form>
                                        </center>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan=3>Tidak Ada Karyawan</td>
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
@endsection
