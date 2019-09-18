@extends('layouts.dashboard')

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h5 class="title">Tambah Karyawan</h5>
                </div>
                <div class="card-body">
                <form action="{{ route('karyawan.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Posisi</label>
                                <select class="form-control" name="posisi">
                                    <option disabled selected>Pilih Posisi</option>
                                    <option value="cashier">Cashier</option>
                                    <option value="kitchen">Kitchen</option>
                                    <option value="waiter">Waiter</option>
                                    <option value="finance">Finance</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="text" class="form-control" placeholder="ex 628***" name="telepon">
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Kehadiran</label>
                                <input type="number" class="form-control" placeholder="0 - 25" name="kehadiran">
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>Tanggungjawab</label>
                                <input type="number" class="form-control" placeholder="0 - 100" name="tanggungjawab">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label>Kedisiplinan</label>
                                <input type="number" class="form-control" placeholder="0 - 100" name="kedisiplinan">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
