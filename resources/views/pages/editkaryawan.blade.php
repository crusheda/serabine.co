@extends('layouts.dashboard')

@section('content')
<div class="panel-header panel-header-sm"></div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h5 class="title">Edit Karyawan</h5>
                </div>
                <div class="card-body">
                <form action="{{url('karyawan', [$list->id])}}" method="POST">
                    {{method_field('PUT')}}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $list->nama }}" placeholder="{{ $list->nama }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Posisi</label>
                                <select class="form-control" name="posisi">
                                    <option disabled selected>Pilih Posisi</option>
                                    <option value="cashier" <?php if ($list->posisi == 'cashier' ) echo 'selected' ; ?>>Cashier</option>
                                    <option value="kitchen" <?php if ($list->posisi == 'kitchen' ) echo 'selected' ; ?>>Kitchen</option>
                                    <option value="waiter"  <?php if ($list->posisi == 'waiter' ) echo 'selected' ; ?>>Waiter</option>
                                    <option value="finance" <?php if ($list->posisi == 'finance' ) echo 'selected' ; ?>>Finance</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" class="form-control" placeholder="ex 628***" name="telepon" value="{{ $list->telepon }}" placeholder="{{ $list->telepon }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Kehadiran</label>
                                <input type="number" class="form-control" placeholder="0 - 25" name="kehadiran" value="{{ $list->kehadiran }}" maxlength="3" max="25" min="0" data-min_max data-min="0" data-max="25" placeholder="{{ $list->kehadiran }}">
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>Tanggungjawab</label>
                                <input type="number" class="form-control" placeholder="0 - 100" name="tanggungjawab" value="{{ $list->tanggungjawab }}" maxlength="3" max="100" min="0" data-min_max data-min="0" data-max="100" placeholder="{{ $list->disiplin }}">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label>Kedisiplinan</label>
                                <input type="number" class="form-control" placeholder="0 - 100" name="kedisiplinan" value="{{ $list->kedisiplinan }}" maxlength="3" max="100" min="0" data-min_max data-min="0" data-max="100" placeholder="{{ $list->disiplin }}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script>
$(document).on('keyup', '[data-min_max]', function(e){
    var min = parseInt($(this).data('min'));
    var max = parseInt($(this).data('max'));
    var val = parseInt($(this).val());
    if(val > max)
    {
        $(this).val(max);
        return false;
    }
    else if(val < min)
    {
        $(this).val(min);
        return false;
    }
});

$(document).on('keydown', '[data-toggle=just_number]', function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
         // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) ||
         // Allow: Ctrl+C
        (e.keyCode == 67 && e.ctrlKey === true) ||
         // Allow: Ctrl+X
        (e.keyCode == 88 && e.ctrlKey === true) ||
         // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
             // let it happen, don't do anything
             return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});
</script>
@endsection
